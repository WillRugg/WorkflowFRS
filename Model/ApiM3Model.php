<?php
require_once('Model/ApiModel.php') ;

class ApiM3Model extends ApiModel {

	
	public function testFournisseurM3 () {

	
		if ($this->open('DSINADNOY','M92e93j94' ,'CRS620MI')) {

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

	
	public function creerfrsM3($post,$numero) {

	 	// connexion réussi	
		if ($this->open('API','API',"CRS620MI")) {
	
			//var_dump($this->transaction);
			$erreur = array();
	  		
			// alimenter champ en dur 
			$cono = 100;
			$suno = $numero;
			$sunm = 'TEST FRS 6 WORKFLOW par API';
			$alsu = 'FRS 6';
			$cscd =	'FR ';
			$lncd =	'FR';
			$dtfm =	'DMY';
			$mepf =	41;
			$stat =	'10';
			$sucl =	 'S30';
			$orty =	'100';
			$tedl =	'10';
			$modl =	'300';	
			$teaf =	'1';
			$dt4d =	'1';	
			$dtcd =	'1';
			$cucd =	'EUR';
			$crtp=	1;
			$tepy =	'45F';
			$pyme =	'BOR';			
			$atpr =	'2';
			$phno =	 '06 71 78 17 56';	
			$tfno =	 '04 75 64 86 60';	
			$corg =	'123456789';		  
			$cor2 =	'12345';	
			$vrno =	'FR12346567';
			$suty =	'0';
			$acrf =	'HG';	
			$vtcd =	'01';
			$txap =	'1';
				/*
				$ =	'ECAR','');
				$ =	'QUCL','');
				$ =	'TEPA','');	
				*/

				// alimenter les champs obligatoires de l'api
			$this->setField('CONO',$cono);
			$this->setField('SUNO',$suno);
			$this->setField('SUNM',$sunm);
			$this->setField('ALSU',$alsu);
			$this->setField('CSCD',$cscd);
			$this->setField('LNCD',$lncd);
			$this->setField('DTFM',$dtfm);
			$this->setField('MEPF',$mepf);
			$this->setField('STAT',$stat);
			$this->setField('SUCL',$sucl);
			$this->setField('ORTY',$orty);
			$this->setField('TEDL',$tedl);					
			$this->setField('MODL',$modl);				
			$this->setField('TEAF',$teaf);
			$this->setField('DT4T',$dt4d);
			$this->setField('DTCD',$dtcd);	
			$this->setField('CUCD',$cucd);
			$this->setField('CRTP',$crtp);
			$this->setField('TEPY',$tepy);
			$this->setField('PYME',$pyme);
			$this->setField('ATPR',$atpr);	
			$this->setField('PHNO',$phno);	
			$this->setField('TFNO',$tfno);	
			$this->setField('CORG',$corg);		  
			$this->setField('COR2',$cor2);	
			$this->setField('VRNO',$vrno);
			$this->setField('SUTY',$suty);	
			$this->setField('ACRF',$acrf);	// a tester suivant pays frs
			$this->setField('VTCD',$vtcd);  // a tester suivant pays frs
			$this->setField('TXAP',$txap);	// a tester suivant pays frs
				/*
				
				$this->setField('ECAR','');				
				$this->setField('QUCL','');
				$this->setField('TEPA','');	
				
				*/
				
			//transaction à appeler
			if(!$this->mvxAccess('AddSupplier')) 
			{
				$erreur['transa'] = $this->transaction;
				//echo "<script type='text/javascript'>alert('$this->transaction');<script>";
			} 
			else
			{
				$erreur['succes'] = 'Le fournisseur '.$numero. ' a bien été créé dans M3';
				//echo "<script type='text/javascript'>alert('le founisseur a bien été créé dans M3');</script>";
			}

		}	// / si open échoué
		else 
		{
		    $erreur['connexion'] = 'La connexion api a échoué';	
		    echo "<script type='type/text/javascript'>alert('La connexion api a échoué.')</script>";
		}
		$this->close();
	
		return ($erreur) ;	  	
	} 


}
?>