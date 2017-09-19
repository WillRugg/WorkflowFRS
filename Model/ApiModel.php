<?php

Class ApiModel  {
	// proteced : accessible classe et enfants si extends
	
	var $serveur;
	var $port;
	var $debug;
	var $socket;
	var $buffer;
	var $bufferIdx;
	var $fields;
	var $cacheInLayout;
	var $cacheOutLayout;
	var $transaction;
	var $curtrans;
	var $lastmsg;

	 
	// constructeur appelé automatiquement lors de la création de l instance
	public function __construct( ) {
	 		$this->serveur = '10.20.21.105';
	 		//$this->port =26800;	// TEST 
	 		$this->port =6800;   // PROD
	}




	function close() {
		socket_shutdown($this->socket,2);
		socket_close($this->socket);
	}



	function open( $login, $passw, $fonction ) {

		// connexion au socket

		$this->socket = socket_create( AF_INET , SOCK_STREAM , getprotobyname('tcp') );
		if ( ! socket_connect($this->socket , $this->serveur ,$this->port ))
		{
			$this->msg('erreur de connexion');
			return false;
		}

		$this->lastmsg = "";

		// construction de la chaine de login
		$s = $this->ensureSize("PWLOG",37);
		$s .= $this->ensureSize($login,16);
		$s .= $this->encryptePassword($this->ensureSize($passw,16));
		$s .= $this->ensureSize($fonction,32);								// fonction
		$s .= $this->ensureSize(" ",32);									// application ??


		if (class_exists( 'SibAppli')) {

			$appli = SibAppli::getInstance();
			if ($appli->isWeb()) {
				$server = $_SERVER['SERVER_ADDR'];				// adresse locale
			} else 			{
				$server=gethostbyname(gethostname());
			}
		}
		else {

			if (php_sapi_name() == 'apache2handler') {
				$server = $_SERVER['SERVER_ADDR'];				// adresse locale
			}
			else {
				$server=gethostbyname(gethostname());
			}
		}

		$s .= $this->ensureSize( $server, 16);				// adresse locale
		$i = strlen($s);
		$this->msg($s);


		// initialisation

		$this->buffer = '';
		$this->bufferIdx = 1;
		$this->fields = array();
		$this->cacheInLayout = array();
		$this->cacheOutLayout = array();
		$this->transaction = '';
		$this->curtrans = '';


		$this->writeInt($i);
		usleep(10000);
		socket_write($this->socket, $s, $i) ;
		usleep(10000);

		$s = socket_read($this->socket,10000,PHP_BINARY_READ);
		$this->msg(" s : $s");
		$i = (ord(substr($s,2,1))*256) + ord(substr($s,3,1));					// taille
		$this->msg(" i : $i");
		$s = substr($s,4);
		$this->msg(" s : $s");
		if (strlen($s) != $i) {
			$this->msg("erreur de lecture");
		}

		if (strlen($s) == 0) {
			return false; }

		if (substr($s,0,3)=='CHG') 	{
			// proposition de port different
			list($wname, $wport, $wportId) = explode(",", substr($s,4));
			socket_shutdown($this->socket,2);
			socket_close($this->socket);
			$this->socket = socket_create( AF_INET , SOCK_STREAM , getprotobyname('tcp') );
			$wname = trim($wname);
			$wport = trim($wport);
			$wportId = trim($wportId);

			// reconnexion au port propos�
			$this->msg("reconnexion � $wname, $wport, $wportId");
			if ( ! socket_connect($this->socket , $wname , $wport )) {
				$this->msg('erreur de connexion');
				return false;
			}

			$this->writeInt($wportId);
			usleep(10000);
			$i = $this->readInt();

			if ($i != 0) {
				$this->msg("erreur: $i");
			}

			$s = $this->mvxTrans("FpwVersion      ");
			return (substr($s,0,2) == 'OK');
		}
		return true;
	}
	
	// fonction mvxAccess
	function mvxAccess($s='',$force=false) {

		// si force=true : on essaie 2 fois en cas d'erreur (pour MMS310MI par ex)
		$msgatt1 = "NOK            ATTENTION - des transactions pour l'ID de stock existent avec point ds temps post�rieur";

		if (strlen($s)==0) 	{
			if (substr($this->transaction,0,3)=='OK ') {
				return true;
			} else {
				$this->transaction = $this->mvxRecv();
				$this->fillOutLayout($this->transaction);
				return true;
			}
		}

		$this->curtrans = $s;

		if ($s and @$this->cacheInLayout[$s])
		{
			// on efface les valeurs du cache
			foreach ($this->cacheInLayout[$s] as $fid=>$fl) {
				$this->cacheInLayout[$s][$fid][2] = $this->ensureSize('',$fl[1]);
			}
		}

		// mise en cache des layout d'entr�e et sortie
		if (! @$this->cacheInLayout[$s] ) {
			$this->cacheInLayout[$s] = $this->decodeLayout( $this->mvxTrans($this->ensureSize('GetInLayout',15).$s) , $this->fields);
			$this->cacheOutLayout[$s] = $this->decodeLayout( $this->mvxTrans($this->ensureSize('GetOutLayout',15).$s) );
		} else {
			$this->fillInLayout();
		}

		// conception de la chaine d'appel

		$tosend = $this->ensureSize($s,15);
		foreach ($this->cacheInLayout[$s] as $fid=>$fl) {
			$tosend .= $fl[2];
		}

		if (substr($s,0,3)=='Snd') {
			return $this->mvxSend($tosend);
		} else {
			$this->transaction = $this->mvxTrans($tosend);
			if (substr($this->transaction,0,5)=='NOK  ') {
				$this->msg( $this->transaction);
				$this->msg(substr($this->transaction,0,strlen($msgatt1)));
				if (substr($this->transaction,0,strlen($msgatt1)) == $msgatt1) {
					return false;
				}
				if ($force) {
					// on essaie une 2ieme fois
					$this->transaction = $this->mvxTrans($tosend);
					if (substr($this->transaction,0,5)=='NOK  ') {
						return false;
					} else {
						$this->fillOutLayout($this->transaction);
					}
				} else {
					return false;
				}
			} else {
				$this->fillOutLayout($this->transaction);
			}
		}
		// supprime les champs pour la requete suivante
		$this->fields = array();
		return true;
	}
	
	// fonction mvxMore
	function mvxMore() {
		return ( substr($this->transaction,0,5)=='REP  ');
	}

	// fonction setField
	function setField($nom,$val) {
		$this->fields[$nom] = $val;
	}

	// fonction getField
	function getField($nom) {
		$this->msg("getField: $nom => ".$this->cacheOutLayout[$this->curtrans][$nom][2]);
		return $this->cacheOutLayout[$this->curtrans][$nom][2];
	}

	// fonction mvsRecv
	function mvxRecv() {
		$size = $this->readInt();
		$res = '';
		for ($i=0;$i<($size/2);$i++) {
			$res .= $this->readChar();
		}
		$this->msg("mvxRecv: $res");
		return $res;
	}
	
	// fonction fillInLayout
	function fillInLayout() {
		// remplit le buffer d'entr�e de la transaction courante avec les parametres
		foreach ($this->cacheInLayout[$this->curtrans] as $fid=>$fl) {
			$this->cacheInLayout[$this->curtrans][$fid][2] = $this->ensureSize(@$this->fields[$fid],$fl[1]) ;
		}
	}

	// fonction fillOutLayout
	function fillOutLayout($s) {
		// remplit le buffer de sortie de la transaction courante avec les valeurs renvoy�es
		foreach ($this->cacheOutLayout[$this->curtrans] as $fid=>$fl) {
			$this->cacheOutLayout[$this->curtrans][$fid][2] = substr($s,($fl[0]-1),$fl[1]);
		}
	}

	// fonction decodeLayout
	function decodeLayout($s,$initValue=array()) {
		$layout = array();
		$fields = explode(';',substr($s,16));
		foreach ($fields as $field) {
			@list($name,$position,$size) = explode(',',$field);
			$layout[$name] = array($position,$size,@$this->ensureSize($initValue[$name],$size));
		}
		return $layout;
	}

	// fonction mvxTrans
	function mvxTrans($s) {
		if (substr($s,0,3)=='Snd') {
			return '';
		}
		$this->sendData($s);
		usleep(10000);
		return $this->mvxRecv();
	}

	// fonction sendData
	function sendData($s) {
		$this->msg("Envoi: $s");
		$this->buffer = '';
		$k = strlen($s)*2;
		$this->writeInt($k);
		usleep(10000);
		$j=0;
		for ($i=0;$i<strlen($s);$i++) {

			$j += socket_write($this->socket, CHR(0).substr($s,$i,1) ,2);
		}
		return ($j==$k);
	}

	// fonction writeInt
	function writeInt($val) {
		$i = ($val + 0);
		$s = CHR( (($i>>24) & 0xFF) ) . CHR( (($i>>16) & 0xFF)) . CHR( (($i>>8) & 0xFF)) . CHR( (($i>>0) & 0xFF));
		return socket_write($this->socket, $s, 4) ;
	}

	// fonction readInt
	function readInt() {
		return ($this->readByte()*256*256*256) + ($this->readByte()*256*256) + ($this->readByte()*256) + ($this->readByte());
	}

	// fonction readChar
	function readChar() {
		$this->bufferIdx++;
		return CHR( $this->readByte());
	}

	// fonction readByte
	function readByte() {
		$s = '';
		$test = 0;
		$test = strlen($this->buffer)==0 ? 0 : 1;
		IF ($this->bufferIdx > strlen($this->buffer)) {

			$this->buffer = socket_read($this->socket,10000,PHP_BINARY_READ);
			IF (socket_last_error($this->socket) > 0) {
				$this->msg("Timeout, reessai");
				$this->buffer = socket_read($this->socket,10000,PHP_BINARY_READ);
			}
			$this->bufferIdx = $test;
		}
		$s = substr($this->buffer,$this->bufferIdx++);
		return ord($s);
	}

	// fonction encryptePassword
	function encryptePassword($chaine) {
		$s2 = '';
		for ($i=0;$i<10;$i++) {
			$a = ord(substr($chaine,$i));
			$s2 .= CHR($a==48+$i ? $a : ($a ^ (48+$i)));
		}
		$s2 .= substr($chaine,10,16-strlen($s2));
		return $s2;
	}


	// fonction ensureSize
	function ensureSize($chaine,$taille) {
		$i = strlen($chaine);
		if ($i>$taille) {
			return null;
		} elseif ($i<$taille) {
			return str_pad($chaine, $taille, ' ', STR_PAD_RIGHT);
		} else {
			return $chaine;
		}
	}

	// fonction msg
	function msg($msg) {
		if ($this->debug) echo date('H:i:s')." : <pre>$msg</pre><br>";
		$this->lastmsg = $msg;
	}


}

?>
