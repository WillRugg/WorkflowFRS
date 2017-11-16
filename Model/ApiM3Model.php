<?php
require_once('Model/ApiModel.php') ;

class ApiM3Model extends ApiModel {

	
	public function testFournisseurM3 () {

	
		if ($this->open('API','4p1Comeca$' ,'CRS620MI')) {

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

	
	public function creerfrsM3($post,$get,$numeroString) {

	 	// connexion réussi	
		if ($this->open('API','4p1Comeca$',"CRS620MI")) {
	
			//var_dump($post);
			$erreur = array();
			// valeur suivant fournisseur Industriel ou de frais généraux 
		
			
			$suno = $numeroString;  
 			$sunm = $post['rsCommande'];
 			$suty =	'0'; 
 			$alsu = substr($post['rsCommande'],0,10);  
 			$cscd =	$post['paysCommande']; 
 			$ecar = '';
 			$lncd =	$post['langue'] ;
 			$dtfm =	'DMY';  
 			$mepf =	'41';  
 			$hafe =	'&D'; 
 			$sucl = $post['groupeFournisseur']; 
 			$qucl = '';
			
			if ($get['genre'] == 'G') {
 				$tedl =	'&D ';
 				$cobi =	$post['groupeAppartenance'];
 				$vtcd = 07;
 				$orty = "300";
 			} else {
 				$tedl =	$post['incotermGroupe'];
 				$cobi =	$post['groupeAppartenance'];
 				$vtcd =	int($post['typeProduit']); 
 				$orty =	$post['natureFournisseur'];
 			}
 			$modl =	'&D ';	  
 			$teaf =	'1';  
 			$dt4d =	'1';	  
 			$dtcd =	'1';  
 			$txap =	1; 
 			$cucd =	$post['deviseHG'];  
 			$crtp=	1;  
 			$tepy =	$post['conditionReglementHG'];
			$pyme =	$post['modeReglement'];		  
 			$atpr =	'2';  
 			$acrf =	$post['objetComptable'] ;
 			$phno =	$post['telephone'];
			//$tfno =	null;
			$corg =	$post['siret'];
			$cor2 =	$post['complement'];
			$vrno =	$post['tvaIntra'];
			$buye = 'MOVEX';
 			$absk = 'A';
			$absm = 1; 
 		 	$hafe =	'&D ';
 		 	$tepa = '&D ';
 		 	$shst =	0;
			$sust = 1;
			$tame = 1;
			$susy = 2;
			$shac = 2;
			$iapt = 2;
			$iapc = 1;
			$iape = 1;
			$iapf = 3;
			$cfi1 =	'&D ';   
			$cfi3 =	'&D '  ; 
			$cfi5 =	'&';   
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
			$this->setField('HAFE',$hafe);
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
			$this->setField('ACRF',$acrf);	 
			$this->setField('PHNO',$phno);	
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
			
			//transaction à appeler
			if(!$this->mvxAccess('AddSupplier')) 
			{
				$erreur['transa'] = $this->transaction;
				//echo "<script type='text/javascript'>alert('$this->transaction');<script>";
			} 
			else
			{
				$erreur['succes'] = 'Le fournisseur '.$numeroString. ' a bien été créé dans M3';
				//echo "<script type='text/javascript'>alert('le founisseur a bien été créé dans M3');</script>";
			}

		}	// / si open échoué
		else 
		{
		    $erreur['connexion'] = 'La connexion api a échoué';	
		    //echo "<script type='type/text/javascript'>alert('La connexion api a échoué.')</script>";
		}
		$this->close();

		return ($erreur);	  	
	} 


	public function creerAdresseM3($post,$numero) {

	 	// connexion réussi	
		if ($this->open('API','4p1Comeca$',"CRS620MI")) {

			// type 01 : adresse postal
			var_dump('$numero :', $numero);
			var_dump('post :' , $post)  ;

			$suno = $numero;
			$adte = '01';
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
	  		$this->setField('ADR2',$post['rue2Commande']);
			$this->setField('PONO',$post['codePostal']);
			$this->setField('TOWN',$post['villeCommande']);
	 		$this->setField('CSCD',$post['paysCommande']);  
			$this->setField('PRIA',0);  
 

			//transaction à appeler
			if(!$this->mvxAccess('AddAddress')) 
			{
				$erreur['transa'] = $this->transaction;
				//echo "<script type='text/javascript'>alert('$this->transaction');<script>";
			} 
			else
			{
				$erreur['succes'] = 'Le fournisseur '.$numero. ' a bien été créé dans M3';
				//echo "<script type='text/javascript'>alert('le founisseur a bien été créé dans M3');</script>";
			}

			// type 10 : adresse banque
			$adte = 10;
			$adid = '';
			if (!empty($post['rsPaiement'])) {
				$sunm= $post['rsPaiement'];
			} else  {
				$sunm =	$post['rsCommande'] ;
			}	
			if (!empty($post['ruePaiement'])) {
				$adr1 = $post['ruePaiement'];
			} else  {
				$adr1 =	$post['rueCommande'] ;
			}	
			if (!empty($post['rue2Paiement'])) {
				$adr2 = $post['rue2Paiement'];
			} else  {
				$adr2 =	$post['rue2Commande'] ;
			}	
			if (!empty($post['cpPaiement'])) {
				$pono= $post['cpPaiement'];
			} else  {
				$pono =	$post['codePostal'] ;
			}	
			if (!empty($post['villePaiement'])) {
				$town= $post['villePaiement'];
			} else  {
				$town =	$post['villeCommande'] ;
			} 	
			if (!empty($post['paysPaiement'])) {
				$cscd= $post['paysPaiement'];
			} else  {
				$cscd =	$post['paysCommande'] ;
			}	
			$this->setField('SUNO',$suno);	
			$this->setField('ADTE',$adte);	
			$this->setField('ADID',$adid);	
			$this->setField('SUNM',$sunm);	 
	  		$this->setField('ADR1',$adr1);
	  		$this->setField('ADR2',$adr2);
			$this->setField('PONO',$pono);
			$this->setField('TOWN',$town);
	 		$this->setField('CSCD',$cscd);  
			$this->setField('PRIA',0);  

			//transaction à appeler
			if(!$this->mvxAccess('AddAddress')) 
			{
				$erreur['transa'] = $this->transaction;
				//echo "<script type='text/javascript'>alert('$this->transaction');<script>";
			} 
			else
			{
				$erreur['succes'] = 'Le fournisseur '.utf8_encode($numero). ' a bien été créé dans M3';
				//echo "<script type='text/javascript'>alert('le founisseur a bien été créé dans M3');</script>";
			}

		}	// / si open échoué
		else 
		{
		    $erreur['connexion'] = 'La connexion api a échoué';	
		    //echo "<script type='type/text/javascript'>alert('La connexion api a échoué.')</script>";
		}

		$this->close();

		return ($erreur) ;	  	
	} 

	public function updatefrsM3($post,$get,$numeroString) {
	}

	public function updateAdresseM3($post,$numero) {
	}

}
?>