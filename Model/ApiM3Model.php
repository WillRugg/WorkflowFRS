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
			$cono = $post['entiteDemandeur'];
			$suno = $numero;
			$sunm = $post['rsCommande'];
			$alsu = $post['rsCommande'];
			$cscd =	$post['paysCommande'];
			$lncd =	'FR';
			$dtfm =	'DMY';
			$mepf =	41;
			$stat =	'10';
			$sucl =	$post['groupeFournisseur'];
			$orty =	'100';
			$edit = '/';
			$tedl =	$post['incotermGroupe'];
			$modl =	 '&D ';
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
			$vtcd =	'01';
			$txap =	'1';
			$hafe =	'&D';
			$cfi1 =	'&D';
			$cfi3 =	'&D';
			$cfi5 =	'&';
			$tepa ='&D';
			$absk = '1';
			$absm = 1;	
			$buye = 'MOVEX';
			$shst = 0;
			$atpr = '2';
			$sust = 1;
			$susy = 2;
			$shac = 2;
			$tame = 1;
			$iatp = 2;
			$iapc = 1;
			$iape = 1;
			$iapf = 3;
			

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
			$this->setField('HAFE',$hafe);
			$this->setField('CFI1',$cfi1);
			$this->setField('CFI3',$cfi3);
			$this->setField('CFI5',$cfi5);
			$this->setField('TEPA',$tepa);
			$this->setField('ABSK',$absk);	
			$this->setField('ABSM',$absm);	
			$this->setField('BUYE',$buye);	
			$this->setField('SHST',$shst);	
			$this->setField('ATPR',$atpr);	
			$this->setField('SUST',$sust);	
			$this->setField('SUSY',$susy);	
			$this->setField('SHAC',$shac);	
			$this->setField('IATP',$iatp);	
			$this->setField('IAPC',$iapc);	
			$this->setField('IAPE',$iape);	
			$this->setField('IAPF',$iapf);	
			 				 
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