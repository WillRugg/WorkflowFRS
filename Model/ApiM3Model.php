<?php
require_once('Model/ApiModel.php') ;

class ApiM3Model extends ApiModel {

	
	public function testFournisseurM3 () {

		// on indique le serveur et le port	 6800:prod 26800:test
		//	$m3Api = new ApiModel('10.20.21.105',26800);


		if ($this->open('DSINADNOY','M92e93j94' ,"CRS620MI")) {

			// chmaps en entrée
			$this->setField('CONO','100');

			//appeler la transaction de CRS620MI (dispo MRS001) par mvAccess de ApiModel
			if ($this->mvxAccess('LstSuppliers')) {	
				$frsM3 = array();

				$i = 1;
				while ($this->mvxMore() && $i < 10) {
					//if ($this->getField('ALQT') > 0){ 
					$frsM3[$i] =
						array (	'CONO'=>$this->getField('CONO'),
				 				'SUNO'=>$this->getField('SUNO'), 
								'SUNM'=>$this->getField('SUNM'));
					 $i++;
				 
					$this->mvxAccess();
				} // while
			
					// var_dump($lart);
				return $frsM3;
			}	// if ($oMvx->mvxAccess
			$this->close();

		} // si open échoué
		else 
		{
			echo "<script type='type/text/javascript'>alert('La connexion api a échoué.')</script>";
	  	}

	}

	
	public function creerfrsM3($post) {

		$m3Api  = new Api('10.20.21.105',26800);
	
		$connexion = $this->open('DSINADNOY','M92e93j94' ,"CRS620MI")  

		if ($connexion === false ) {

		     echo "<script type='type/text/javascript'>alert('La connexion api a échoué.')</script>";
		} 
		else 
			{  // connexion réussi
	  			
	  		$transa = $this->transaction;

	  		echo "<script type='text/javascript'>alert('');</script>";
			
			// alimenter champ en dur 
			$cono = 100;
			$suno = '08870';


			//transaction à appeler
			 
				// alimenter les champs obligatoires de l'api
				$this->setField('CONO',$cono);
				$this->setField('SUNO',$suno);
				$this->setField('SUNM','TOTO');
				$this->setField('SUTY','0');
			 	$this->setField('ALSU','TOTO RECHERCHE');
				$this->setField('ECAR','');
				$this->setField('LNCD','FR');
				$this->setField('DTFM','DMY');
				$this->setField('MEPF',1);
				$this->setField('SUCL','S30');
				$this->setField('QUCL','');
				$this->setField('ORTY','100');
				$this->setField('TEDL','10');	
				$this->setField('MODL','100');	
				$this->setField('TEAF',1);	
				$this->setField('TEPA','');	
				$this->setField('DT4T',1);	
				$this->setField('DTCD',1);	
				$this->setField('CUCD','FR');		
				$this->setField('CRTP',1);
				$this->setField('TEPY','45F');
				$this->setField('PYME','BOR');
				$this->setField('ATPR',2);	
				$this->setField('ACRF','HG');	
				$this->setField('PHNO','0671781756');	
				$this->setField('TFNO','0475648660');	
				$this->setField('CORG','123456789');		  
				$this->setField('COR2','12345');	
				$this->setField('VRNO','FR12346567');	
				$this->setField('STAT','10');	
				//$this->setField('STAT',$post['']);

				if(!$this->mvxAccess('AddSupplier')) {
					echo "<script type='text/javascript'>alert('$this->transaction');<script>";
				}
							 				 
			}	// if ($oMvx->mvxAccess

			$this->close();

	  	
	  	
		} // si open échoué
	  	else {
	  		echo "<script type='type/text/javascript'>alert('La connexion api a échoué.')</script>";
	  		
	  	}
			
	}
		
	
  
	
}
?>