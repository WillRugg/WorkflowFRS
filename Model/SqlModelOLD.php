<?php
require_once('Model/Model.php') ;

class SqlModel extends Model{


	
	public function createFiche($data) {
		
 
	$domaine = 'achats';

	// connexion à sqlserver
		 

	//var_dump("Post:" , $data);
	 	
	//if (empty($erreurs)) {

			$query = "INSERT INTO  `TABLEFRS`
			 			   (entite ,
							nomDemandeur ,
							fonction ,
							dateDemande ,
							raisonSociale ,
    						voieRue, 
    						ville ,
    						pays , 
    					    domaineValidation)
				values     ('109' ,
							'NOYER' ,
							'DSI' ,
							20170725 ,
							'Rs cde',
							'rue cde ',
							'ville cde' ,
							'pays cde',
						    'achats' ) ";
		  		
			$stmt = $this->pdoSql->prepare($query);
			var_dump($stmt);
			if ($stmt->execute() ) {
				$id = $this->pdoSql->lastInsertId();
				var_dump($id);
			} else {
				$erreurs['form'] = 'Fournisseur non inséré  !';
			}
		 

		}

		

	


	public function createFicheOld($data) {
		
	$erreurs = array();
	$domaine = 'achats';

	// connexion à sqlserver
		try {
			$this->pdoSql = new PDO(PDOS_DSN,PDOS_USERNAME,PDOS_PASSWORD);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de SQL a échouée : ' . $e->getMessage();
		}

	//var_dump("Post:" , $data);
	 	
	//if (empty($erreurs)) {

			$query = "INSERT INTO  `TABLEFRS`
			 			   (entite ,
							nomDemandeur ,
							fonction ,
							dateDemande ,
							raisonDemande,
							siret ,
							complementSiret ,
							tva ,
							raisonSociale ,
    						voieRue, 
    						codePostal ,
    						ville ,
    						pays , 
    						telephone , 
    						fax ,  
    						siteInternet, 
    						raisonSocialePaiement ,
    						voieRuePaiement ,
    						codePostalPaiement ,
						    villePaiement   ,
						    paysPaiement ,
						    groupeAppartenance  ,
						    natureFournisseur  ,
						    incoterm  ,
						    lieuVilleRegleGroupe  ,
						    francoDePortRegleGroupe  ,
						    motifDerogationHorsGroupe  ,
						    BSSTypeProduit ,
						    devise ,
						    modeReglement,
						    conditionReglement,
  						    ca  ,
						    nbEmployes  ,
						    iso  ,
						    bilanAFournir  ,
						    domaineValidation)
				values     ('109' ,
							'NOYER' ,
							'DSI' ,
							20170725 ,
							'test ',
							'7777777 ',
							'7777' ,
							'7777777777777',
							'raisonSociale' ,
    						'voieRue', 
    						'codePostal' ,
    						'ville' ,
    						'pays ', 
    						'telephone ', 
    						'fax' ,  
    						'siteInternet', 
    						'raisonSocialePaiement' ,
    						'voieRuePaiement ',
    						'codePostalPaiement ',
						    'villePaiement '   ,
						    'paysPaiement ',
						    'groupeAppartenance'  ,
						    'natureFournisseur ' ,
						    'incoterm  ',
						    'lieuVilleIncoterm',
						    'francoDePort  ',
						    'motifDerogation'  ,
						    'BSSTypeProduit',
						    'devise  ',
						    'modeReglement' ,
						    'conditionReglement '
						    'ca  ',
						    'nbEmployes'  ,
						    'iso  ',
						    'bilanAFournir'  ,
						    'achats' ) ;"

						    				/*
				values     (:entite ,
							:nomDemandeur ,
							:fonction ,
							:dateDemande ,
							:raisonDemande,
							:siret ,
							:complementSiret ,
							:tva ,
							:raisonSociale ,
    						:voieRue, 
    						:codePostal ,
    						:ville ,
    						:pays , 
    						:telephone , 
    						:fax ,  
    						:siteInternet, 
    						:raisonSocialePaiement ,
    						:voieRuePaiement ,
    						:codePostalPaiement ,
						    :villePaiement   ,
						    :paysPaiement ,
						    :groupeAppartenance  ,
						    :natureFournisseur  ,
						    :incoterm  ,
						    :lieuVilleIncoterm ,
						    :francoDePort  ,
						    :motifDerogation  ,
						    :BSSTypeProduit ,
						    :devise  ,
						    :modeReglement ,
						    :conditionReglement ,
						    :ca  ,
						    :nbEmployes  ,
						    :iso  ,
						    :bilanAFournir  ,
						    :domaineValidation)"  ; 
			
			$stmt->bindParam(":entite" , $data['entiteDemandeur'],PDO::PARAM_STR,255);
			$stmt->bindParam(":nomDemandeur" , $data['nomDemandeur'],PDO::PARAM_STR,255);
			$stmt->bindParam(":fonction ", $data['fonctionDemandeur'],PDO::PARAM_STR,255);
			$stmt->bindParam(":dateDemande" , $data['dateJour'],PDO::PARAM_INT,8);
			$stmt->bindParam(":raisonDemande", $data['raisonDemande'],PDO::PARAM_STR,255);
			$stmt->bindParam(":siret" , $data['siret'],PDO::PARAM_STR,255);
			$stmt->bindParam(":complementSiret" , $data['complement'],PDO::PARAM_STR,255);
			$stmt->bindParam(":tva", $data['tvaIntra'],PDO::PARAM_STR,255);
			$stmt->bindParam(":raisonSociale" , $data['rsCommande'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":voieRue",  $data['rueCommande'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":codePostal" , $data['cpCommande'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":ville" , $data['villeCommande'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":pays" ,  $data['paysCommande'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":telephone" ,  $data['telephone'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":fax" ,   $data['fax'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":siteInternet",  $data['site'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":raisonSocialePaiement" , $data['rsPaiement'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":voieRuePaiement", $data['ruePaiement'],PDO::PARAM_STR,255);
    		$stmt->bindParam(":codePostalPaiement" , $data['cpPaiement'],PDO::PARAM_STR,255);
			$stmt->bindParam(":villePaiement"   , $data['villePaiement'],PDO::PARAM_STR,255);
			$stmt->bindParam(":paysPaiement" , $data['paysPaiement'],PDO::PARAM_STR,255);
			// a revoir car autre = préciser
			if ($data['autreGroupeFournisseur'] != "" ){
				$stmt->bindParam(":groupeAppartenance"  , $data['autreGroupeFournisseur'],PDO::PARAM_STR,255);
			} else {
				$stmt->bindParam(":groupeAppartenance"  , $data['groupeFournisseur'],PDO::PARAM_STR,255);	
			}
			$stmt->bindParam(":natureFournisseur"  , $data['natureFournisseur'],PDO::PARAM_STR,255);
			// inoterm reglemet 2 champs possible si HG est <> "" alors hg sinon val defaut
			if ($data['incotermHorsGroupe'] != "" ){
				$stmt->bindParam(":incoterm"  , $data['incotermHorsGroupe'],PDO::PARAM_STR,255);
			} else {
				$stmt->bindParam(":incoterm"  , $data['incoterm'],PDO::PARAM_STR,255);	
			}
			$stmt->bindParam(":lieuVilleIncoterm"  , $data['lieu'],PDO::PARAM_STR,255);
			$stmt->bindParam(":francoDePort"  , $data['montant'],PDO::PARAM_STR,255);
			$stmt->bindParam(":motifDerogation"  , $data['motifDero'],PDO::PARAM_STR,255);
			// checkboxs à traiter 
			/*$tProduit = $data['typeP'];
			  if(!empty($tProduit) 
			 {
			    $N = count($tProduit);
			  
			    for($i=0; $i < $N; $i++)
			    {
		     		echo($tProduit[$i] . " ");
			    }
			  } */
			  /*
		 	$stmt->bindParam(":BSSTypeProduit" , $data['typeP'],PDO::PARAM_STR,255);

			// mode reglemet 3 champs possible si HG est <> "" alors hg sinon BOOR
			if ($data['modeReglementHG'] != "" ){
				$stmt->bindParam(":modeReglement"  , $data['modeReglementHG'],PDO::PARAM_STR,255);
			} else {
				$stmt->bindParam(":modeReglement"  , $data['modeReglement'],PDO::PARAM_STR,255);	
			}
			// mode reglemet 2 champs possible si HG est <> "" alors hg sinon BOOR
			if ($data['modeReglementHG'] != "" ){
				$stmt->bindParam(":modeReglement"  , $data['modeReglementHG'],PDO::PARAM_STR,255);
			} else {
				$stmt->bindParam(":modeReglement"  , $data['modeReglement'],PDO::PARAM_STR,255);	
			}
			$stmt->bindParam(":modeReglement" ,  $data['modeReglement'],PDO::PARAM_STR,255);
			// iconditions reglement : 2 champs possible si HG est <> "" alors hg sinon val defaut
			if ($data['conditionReglementHG'] != "" ){
				$stmt->bindParam(":conditionReglement"  , $data['conditionReglementHG'],PDO::PARAM_STR,255);
			} else {
				$stmt->bindParam(":conditionReglement"  ,  $data['conditionReglement'],PDO::PARAM_STR,255);
			}
			// Devise : 2 champs possible si HG est <> "" alors hg sinon val defaut
			if ($data['deviseHG'] != "" ){
				$stmt->bindParam(":devise"  , $data['deviseHG'],PDO::PARAM_STR,255);
			} else {
				$stmt->bindParam(":devise"  ,  $data['devise'],PDO::PARAM_STR,255);
			}
			/*$stmt->bindParam(":autreDeviseHG"  , $data['autreDevise'],PDO::PARAM_STR,255); ===> à voir pour test l'un ou l'autre */ 
			/*$stmt->bindParam(":ca"  , $data['ca'],PDO::PARAM_STR,255);
			$stmt->bindParam(":nbEmployes"  , $data['nbreEmployes'],PDO::PARAM_STR,255);
			$stmt->bindParam(":iso"  , $data['iso'],PDO::PARAM_STR,255);
			$stmt->bindParam(":bilanAFournir"  , $data['bilan '],PDO::PARAM_STR,255);
			$stmt->bindParam(":domaineValidation",$domaine,PDO::PARAM_STR,255);; */
 
			  		
			$stmt = $this->pdoSql->prepare($query);
			if ($stmt->execute()) {
				$id = $this->pdoSql->lastInsertId();
				var_dump($id);
			} else {
				$erreurs['form'] = 'Fournisseur non inséré  !';
			}
		} //else { 
			//$erreurs['form'] = 'Veuillez verifier les données fournies !';
		

	}	 /*
		 /*
	
	public function updateFiche($data,$statut) {
		 
		$erreurs = array();
	 
		if (empty($erreurs)) {
		
						
			$query = "UPDATE  ".$this->biblio.".ZSLEDG
						SET ZZSTATUT ='".$statut."'
							WHERE ZZSOURCE ='".$data[0]."' and ESDIVI ='".$data[4]."' and ESJRNO ='".$data[1]."' and ESJSNO ='".$data[2]."' and ESYEA4 =".$data[3]; 
			 		
			$stmt = $this->pdo->prepare($query);
			
				
			if ($stmt->execute()) {
				$result = $stmt->rowCount();
			} else {
				$erreurs['form'] = 'PiÃ¨ce non modifiÃ©e !';
			}
			
		}
		if (isset($result)) {
		 	return ($result);
		} else {
			return($erreurs);
		} */
	 
	
}
?>