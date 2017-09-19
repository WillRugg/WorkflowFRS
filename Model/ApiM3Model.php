<?php
require_once('Model/ApiModel.php') ;

class ApiM3Model extends ApiModel {

	
	public function testFournisseurM3 () {

	
		if ($this->open('API','4p1Comeca$' ,'CRS620MI')) {

			// chmaps en entr�e
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

		} // si open �chou�
		else 
		{
			echo "<script type='type/text/javascript'>alert('La connexion api a �chou�.')</script>";
	  	}

	}

	
	public function creerfrsM3($post,$numeroString) {

	 	// connexion r�ussi	
		if ($this->open('API','4p1Comeca$',"CRS620MI")) {
	
			//var_dump($post);
			
			$erreur = array();
						
			$suno = $numeroString;  
 			$sunm = $post['rsCommande'];
 			$alsu = substr($post['rsCommande'],0,10);  
 			$cscd =	$post['paysCommande'];  
 			$lncd =	'FR';  
 			$dtfm =	'DMY';  
 			$mepf =	41;  
 			$sucl = $post['groupeFournisseur']; 
 			$cobi =	$post['groupeAppartenance']; 
 			$orty =	$post['natureFournisseur'];
 			$tedl =	$post['incotermGroupe'];
 			$modl =	'300';	  
 			$teaf =	'1';  
 			$dt4d =	'1';	  
 			$dtcd =	'1';  
 			$cucd =	$post['deviseHG'];  
 			$crtp=	1;  
 			$tepy =	$post['conditionReglementHG'];
			$pyme =	$post['modeReglement'];		  
 			$atpr =	'2';  
 			$phno =	$post['telephone'];
			$tfno =	$post['fax'];
			$corg =	$post['siret'];
			$cor2 =	$post['complement'];
			$vrno =	$post['tvaIntra'];
 			$suty =	'0';  
 			$acrf =	'HG';	  
 			$vtcd =	01;  
 			$txap =	1; 
 		 	$hafe =	'&D ';
			$cfi1 =	'&D ';   
			$cfi3 =	'&D '  ; 
			$cfi5 =	'&';   
			$tepa ='&D ';
			$absk = 'A';
			$absm = 1;
			$buye = 'MOVEX';
			$shst =	0;
			$sust = 1;
			$susy = 2;
			$shac = 2;
			$tame = 1;
			$iapt = 2;
			$iapc = 1;
			$iape = 1;
			$iapf = 3; 
			$qucl = '';
			$ecar = '';
			$stat = '10';
		

			//var_dump($this->setField('SUTY',$suty));
			// alimenter les champs obligatoires de l'api
		
			//$this->setField('CONO',$cono);
			$this->setField('SUNO',$suno);
			$this->setField('SUNM',$sunm);
			$this->setField('SUTY',$suty);	
			$this->setField('ALSU',$alsu);
			$this->setField('CSCD',$cscd);
			$this->setField('ECAR',$ecar);
		    $this->setField('LNCD',$lncd);
			$this->setField('DTFM',$dtfm);
			$this->setField('MEPF',$mepf);
			$this->setField('SUCL',$sucl);
			$this->setField('QUCL',$qucl);
			$this->setField('ORTY',$orty);
			$this->setField('TEDL',$tedl);					
			$this->setField('MODL',$modl);				
			$this->setField('TEAF',$teaf);
			$this->setField('DT4T',$dt4d);
			$this->setField('DTCD',$dtcd);
			$this->setField('VTCD',$vtcd);  // a tester suivant pays frs
			$this->setField('TXAP',$txap);	// a tester suivant pays frs	
			$this->setField('CUCD',$cucd);
			$this->setField('CRTP',$crtp);
			$this->setField('TEPY',$tepy);
			$this->setField('PYME',$pyme);
			$this->setField('ATPR',$atpr);	
			$this->setField('ACRF',$acrf);	// a tester suivant pays frs
			$this->setField('PHNO',$phno);	
			$this->setField('TFNO',$tfno);	
			$this->setField('CORG',$corg);		  
			$this->setField('COR2',$cor2);	
			$this->setField('VRNO',$vrno);
			$this->setField('BUYE',$buye);
			$this->setField('ABSK',$absk);	
			$this->setField('ABSM',$absm);	
			$this->setField('COBI',$cobi);
		  	$this->setField('HAFE',$hafe);
			$this->setField('TEPA',$tepa);
			$this->setField('SHST',$shst);	
			$this->setField('SUST',$sust);	
			$this->setField('TAME',$tame);
			$this->setField('SUSY',$susy);	
			$this->setField('SHAC',$shac);	
			$this->setField('IAPT',$iapt);	
			$this->setField('IAPC',$iapc);	
			$this->setField('IAPE',$iape);	
			$this->setField('IAPF',$iapf);	 
	  		$this->setField('CFI1',$cfi1);
			$this->setField('CFI3',$cfi3);
			$this->setField('CFI5',$cfi5);  
			$this->setField('STAT',$stat); 
			 				 
			//transaction � appeler
			if(!$this->mvxAccess('AddSupplier')) 
			{
				$erreur['transa'] = $this->transaction;
				//echo "<script type='text/javascript'>alert('$this->transaction');<script>";
			} 
			else
			{
				$erreur['succes'] = 'Le fournisseur '.$numeroString. ' a bien �t� cr�� dans M3';
				//echo "<script type='text/javascript'>alert('le founisseur a bien �t� cr�� dans M3');</script>";
			}

		}	// / si open �chou�
		else 
		{
		    $erreur['connexion'] = 'La connexion api a �chou�';	
		    //echo "<script type='type/text/javascript'>alert('La connexion api a �chou�.')</script>";
		}
		$this->close();


		return ($erreur) ;	  	
	} 


	public function creerAdresseM3($post,$numero) {

	 	// connexion r�ussi	
		if ($this->open('API','4p1Comeca$',"CRS620MI")) {

			// type 01 : adresse postal
			$suno = $numero;
			$adte = 01;
			if (!empty($post['complement'])) {
				$adid = $post['complement'];
			}
			else  {
				$adid =	'AC' ;
			}			
						 
			$this->setField('SUNO',$suno);	
			$this->setField('ADTE',$adte);	
			$this->setField('ADID',$adid);	
			$this->setField('SUNM',$post['rsCommande']);	 
	  		$this->setField('ADR1',$post['rueCommande']);
			$this->setField('PONO',$post['codePostal']);
			$this->setField('TOWN',$post['villeCommande']);
	 		$this->setField('CSCD',$post['paysCommande']);  
			$this->setField('PRIA',0);  
 

			//transaction � appeler
			if(!$this->mvxAccess('AddAddress')) 
			{
				$erreur['transa'] = $this->transaction;
				//echo "<script type='text/javascript'>alert('$this->transaction');<script>";
			} 
			else
			{
				$erreur['succes'] = 'Le fournisseur '.$numero. ' a bien �t� cr�� dans M3';
				//echo "<script type='text/javascript'>alert('le founisseur a bien �t� cr�� dans M3');</script>";
			}

		// type 10 : adresse banque

			$adte = 10;
			$adid = '';
			if (!empty($post['rsPaiement'])) {
				$sunm= $post['rsPaiement'];
			}
			else  {
				$sunm =	$post['rsCommande'] ;
			}	
			if (!empty($post['ruePaiement'])) {
				$adr1 = $post['ruePaiement'];
			}
			else  {
				$adr1 =	$post['rueCommande'] ;
			}	
			if (!empty($post['cpPaiement'])) {
				$pono= $post['cpPaiement'];
			}
			else  {
				$pono =	$post['codePostal'] ;
			}	
			if (!empty($post['villePaiement'])) {
				$town= $post['villePaiement'];
			}
			else  {
				$town =	$post['villeCommande'] ;
			}	
			if (!empty($post['paysPaiement'])) {
				$cscd= $post['paysPaiement'];
			}
			else  {
				$cscd =	$post['paysCommande'] ;
			}	
			$this->setField('SUNO',$suno);	
			$this->setField('ADTE',$adte);	
			$this->setField('ADID',$adid);	
			$this->setField('SUNM',$sunm);	 
	  		$this->setField('ADR1',$adr1);
			$this->setField('PONO',$pono);
			$this->setField('TOWN',$town);
	 		$this->setField('CSCD',$cscd);  
			$this->setField('PRIA',0);  
 

			//transaction � appeler
			if(!$this->mvxAccess('AddAddress')) 
			{
				$erreur['transa'] = $this->transaction;
				//echo "<script type='text/javascript'>alert('$this->transaction');<script>";
			} 
			else
			{
				$erreur['succes'] = 'Le fournisseur '.utf8_encode($numero). ' a bien �t� cr�� dans M3';
				//echo "<script type='text/javascript'>alert('le founisseur a bien �t� cr�� dans M3');</script>";
			}


		}	// / si open �chou�
		else 
		{
		    $erreur['connexion'] = 'La connexion api a �chou�';	
		    //echo "<script type='type/text/javascript'>alert('La connexion api a �chou�.')</script>";
		}


		$this->close();


		return ($erreur) ;	  	
	} 

}
?>