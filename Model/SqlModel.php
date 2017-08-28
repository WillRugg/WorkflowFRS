<?php
require_once('Model/Model.php') ;

class SqlModel extends Model{

	// Fonction qui récupère la table "champs 
	public function recupChamps(){
	
	$query = "SELECT * FROM `champs`";
    $stmt = $this->pdoSql->query($query);

    return $stmt->fetchAll();
	
	}

	// Fonction DE CONNEXION
	public function connecter($post) {
       
    	$erreurs = array();

        // identifiant obligatoire
        if(!empty($post['ident'])) {
            $admin = $post['ident'];
        } 
        else
        {
            $erreurs['ident'] = 'L\'identifiant ne peut être vide';
        } 
        
        // identifiant obligatoire
        if(!empty($post['password'])) {
            $password = $post['password'];
        } 
        else 
        {
            $erreurs['password'] = 'Le mot de passe ne peut être vide';
        }
       
        if(!count($erreurs)) {

            // recherche identifiant
            $query = "SELECT * FROM `users` where USER_IDENTIFIANT='".$post['ident']."'";
            $stmt = $this->pdoSql->query($query);
            if ($user = $stmt->fetch()) {
                $userBdd = $user['USER_IDENTIFIANT'];
                $environnementBdd = $user['USER_IDENT'];
            }
            else
            {
                return array('idConnecte'=> false);
            }

            // recherche password
            $query = "SELECT * FROM `users` where USER_IDENTIFIANT='".$post['ident']."'";
            $stmt = $this->pdoSql->query($query);
            if ($user = $stmt->fetch()) {
                $passwordBdd = $user['USER_PASSWORD'];
                $environnementBdd = $user['USER_IDENT'];
            } 
            else 
            {
                $erreurs['ident'] = 'Le mdp est incorrect';
                return array('idConnecte'=> false);
            }
                    
            // si ident et mdp ok => on retourne true et le user connecté
            if ($admin == $userBdd && $password == $passwordBdd ) {
                return array('idConnecte'=>true ,'userConnecte' => $userBdd, 'environnement' => $environnementBdd);
            }
            else
            {
                $erreurs['password'] = 'Le mot de passe est incorrect';
                return array('idConnecte'=> false);
            }
       }  
   }


	// fonction qui ajoute le paramètre de config avec le POST en paramètre
	// passage du $post pour vérifier la connection
	public function getID($timeUnique) {
			$query = "SELECT ID FROM `tablefrs` where idEnvoi='".$timeUnique."'";
			$stmt = $this->pdoSql->query($query);
      		return $stmt->fetch();
    	}
	


	public function AfficheEnAttente() {

      	if(isset($_SESSION['ident']))
		{
			$query = "SELECT * FROM `tablefrs` where domaineValidation='".$_SESSION['ident']."'";
			$stmt = $this->pdoSql->query($query);

      		return $stmt->fetchAll();
    	}
       
	}

	// sélection des Frs encours
	public function AfficheAll() {
      
      $query = "SELECT * FROM `tablefrs`";
      $stmt = $this->pdoSql->query($query);

      return $stmt->fetchAll();
	}

	// récupère champs pour 1 Id
	public function RecupUnite($id) {     

      	$query = "SELECT * FROM `tablefrs` where ID='".$id."'";
      	$stmt = $this->pdoSql->query($query);

     return $stmt->fetch();
       
	}

	public function getInfos($id) {
     
	    $query = "SELECT * FROM `tablefrs` where ID='".$id."'";
    	$stmt = $this->pdoSql->query($query);

     	return $stmt->fetch();
       
	}  

		public function getInfosForFournisseur($idEnvoi,$ID) {
     
	    $query = "SELECT * FROM `tablefrs` where idEnvoi='".$idEnvoi."' and  ID='".$ID."' and domaineValidation='fournisseur'";
    	$stmt = $this->pdoSql->query($query);

     	return $stmt->fetch();
       
	}  


	// insert du poste dans BDD
	public function createFiche($post,$files,$etapeSuivante,$timeUnique) {

		// connexion à sqlserver
		$updateCrea=1;
		//$domaineSuivant='nonRenseigne';

		// 2 champs du poste pour groupe appartenance : si autre est renseigné on prend valeur de autre
		if ($post['autreGroupeFournisseur'] != "" )
		{
			$groupeAppartenance=$post['autreGroupeFournisseur'];
		} 
		else 
		{
			$groupeAppartenance=$post['groupeAppartenance'];
		}

		// 2 champs du poste pour incoterm : si autre est renseigné on prend valeur de autre
		if ($post['incotermHorsGroupe'] != "" )
		{
			$incoterm=$post['incotermHorsGroupe'];
		} 
		else 
		{
			$incoterm=$post['incoterm'];
		}

		// 2 champs du post pour mode Réglement : si autre est renseigné on prend valeur de autre
		if ($post['modeReglementHG'] != "" )
		{
			$modeReglement =$post['modeReglementHG'];
		} 
		else 
		{
			$modeReglement= $post['reglementGroupe'];
		}

		if ($post['conditionReglementHG'] != "" )
		{
			$conditionReglement=$post['conditionReglementHG'];
		} 
		else 
		{
			$conditionReglement= $post['conditionReglementG'];
		}
		
		// Devise : 2 champs possible si HG est <> "" alors hg sinon val defaut
		if ($post['deviseHG'] != "" )
		{
			$devise=$post['deviseHG'];
		} 
		else 
		{
			$devise=$post['devise'];
		}

		// si file  kbis sélectionné
		if(empty($files['kbis']['name']))
		{
			$kbisName=null;
		}
		else
		{
			$kbisName=$post['dateJour'].$files['kbis']['name'] ;
		}
		
		// si file  bilan sélectionné
		if(empty($files['bilan']['name']))	{
			$bilanName=null;
		}
		else
		{
			$bilanName=$post['dateJour'].$files['bilan']['name']  ;
		}

		// on prépare l insert avec pdo (bindparam ne fonctionne pas)
		$stmt=$this->pdoSql-> prepare('INSERT INTO tablefrs(
		 					entite ,
							nomDemandeur ,
							fonction ,
							dateDemande ,
							raisonDemande,
							siret ,
							complementSiret ,
							tva ,
							raisonSociale, 
    						voieRue ,
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
						    groupeFournisseur  ,
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
						    bilan ,
						    kbis,
						    domaineValidation,
						    idEnvoi
						 ) 
						    VALUES (
						    :entite,
						    :nomDemandeur ,
							:fonction ,
							:dateDemande ,
							:raisonDemande,
							:siret ,
							:complementSiret ,
							:tva ,
							:raisonSociale ,
    				 		:voieRue ,
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
						    :groupeFournisseur  ,
						    :incoterm  ,
						    :lieuVilleRegleGroupe  ,
						    :francoDePortRegleGroupe  ,
						    :motifDerogationHorsGroupe  ,
						    :BSSTypeProduit ,
						    :devise ,
						    :modeReglement,
						    :conditionReglement,
  					 	    :ca,
						    :nbEmployes  ,
						    :iso  ,
						    :bilan  ,
						    :kbis,
						    :domaineValidation,
						    :idEnvoi
						    )'
						    );
		// ion execute le prépare
		$stmt->execute(array(
		 	'entite'=>$post['entiteDemandeur'],
		 	'nomDemandeur'=>$post['nomDemandeur'],
		  	'fonction'=>$post['fonctionDemandeur'],
		  	'dateDemande'=>$post['dateJour'],
		  	'raisonDemande'=>$post['raisonDemande'],
		  	'siret'=>$post['siret'],
		  	'complementSiret'=>$post['complement'],
		  	'tva'=>$post['tvaIntra'],
			'raisonSociale'=>$post['rsCommande'] ,
			'voieRue'=>$post['rueCommande'], 
			'codePostal'=>$post['codePostal'],
			'ville'=>$post['villeCommande'] ,
			'pays'=>$post['paysCommande'] , 
			'telephone'=>$post['telephone'] , 
			'fax'=>$post['fax'] ,  
			'siteInternet'=>$post['site'],
			'raisonSocialePaiement'=>$post['rsPaiement'] ,
			'voieRuePaiement'=>$post['ruePaiement'] ,
			'codePostalPaiement'=>$post['cpPaiement'] ,
		    'villePaiement'=>$post['villePaiement']   ,
		    'paysPaiement'=>$post['paysPaiement'] ,
		    'groupeAppartenance'=>$groupeAppartenance  ,
		    'natureFournisseur'=>$post['natureFournisseur']  ,
		    'groupeFournisseur'=>$post['groupeFournisseur']  ,
		    'incoterm'=>$incoterm  ,
		    'lieuVilleRegleGroupe'=>$post['lieu'] ,
		    'francoDePortRegleGroupe'=>$post['montant']  ,
		    'motifDerogationHorsGroupe'=>$post['motifDero'] ,
		    'BSSTypeProduit'=>$post['typeProduit'] ,
		    'devise'=>$devise ,
		    'modeReglement'=>$modeReglement,
		    'conditionReglement'=>$conditionReglement,
			'ca'=>$post['ca'],
		    'nbEmployes'=>$post['nbreEmployes']  ,
		    'iso'=>$post['iso']  ,
		    'bilan'=>$bilanName  ,
		    'kbis'=>$kbisName,
		    'domaineValidation'=>$etapeSuivante,
		    'idEnvoi'=>$timeUnique
		 	));
			$lastID= $this->pdoSql->lastInsertId();

		// on charge les files
		move_uploaded_file($files['bilan']['tmp_name'],'Ressources/files/'.$bilanName);
		move_uploaded_file($files['kbis']['tmp_name'],'Ressources/files/'.$kbisName);
	
		
		
		// on prépare l insert avec pdo (bindparam ne fonctionne pas)
		$stmt=$this->pdoSql-> prepare('INSERT INTO tablefrsHisto(
							statut,
							ID,
		 					entite ,
							nomDemandeur ,
							fonction ,
							dateDemande ,
							raisonDemande,
							siret ,
							complementSiret ,
							tva ,
							raisonSociale, 
    						voieRue ,
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
						    groupeFournisseur  ,
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
						    bilan ,
						    kbis,
						    domaineValidation
						 ) 
						    VALUES (
						    :statut,
						    :lastID,
						    :entite,
						    :nomDemandeur ,
							:fonction ,
							:dateDemande ,
							:raisonDemande,
							:siret ,
							:complementSiret ,
							:tva ,
							:raisonSociale ,
    				 		:voieRue ,
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
						    :groupeFournisseur  ,
						    :incoterm  ,
						    :lieuVilleRegleGroupe  ,
						    :francoDePortRegleGroupe  ,
						    :motifDerogationHorsGroupe  ,
						    :BSSTypeProduit ,
						    :devise ,
						    :modeReglement,
						    :conditionReglement,
  					 	    :ca,
						    :nbEmployes  ,
						    :iso  ,
						    :bilan  ,
						    :kbis,
						    :domaineValidation
						    )');
		// ion execute le prépare
		$stmt->execute(array(
			'statut'=>$updateCrea,
			'lastID'=>$lastID,
		 	'entite'=>$post['entiteDemandeur'],
		 	'nomDemandeur'=>$post['nomDemandeur'],
		  	'fonction'=>$post['fonctionDemandeur'],
		  	'dateDemande'=>$post['dateJour'],
		  	'raisonDemande'=>$post['raisonDemande'],
		  	'siret'=>$post['siret'],
		  	'complementSiret'=>$post['complement'],
		  	'tva'=>$post['tvaIntra'],
			'raisonSociale'=>$post['rsCommande'] ,
			'voieRue'=>$post['rueCommande'], 
			'codePostal'=>$post['codePostal'],
			'ville'=>$post['villeCommande'] ,
			'pays'=>$post['paysCommande'] , 
			'telephone'=>$post['telephone'] , 
			'fax'=>$post['fax'] ,  
			'siteInternet'=>$post['site'],
			'raisonSocialePaiement'=>$post['rsPaiement'] ,
			'voieRuePaiement'=>$post['ruePaiement'] ,
			'codePostalPaiement'=>$post['cpPaiement'] ,
		    'villePaiement'=>$post['villePaiement']   ,
		    'paysPaiement'=>$post['paysPaiement'] ,
		    'groupeAppartenance'=>$groupeAppartenance  ,
		    'natureFournisseur'=>$post['natureFournisseur']  ,
		    'groupeFournisseur'=>$post['groupeFournisseur']  ,
		    'incoterm'=>$incoterm  ,
		    'lieuVilleRegleGroupe'=>$post['lieu'] ,
		    'francoDePortRegleGroupe'=>$post['montant']  ,
		    'motifDerogationHorsGroupe'=>$post['motifDero'] ,
		    'BSSTypeProduit'=>$post['typeProduit'] ,
		    'devise'=>$devise ,
		    'modeReglement'=>$modeReglement,
		    'conditionReglement'=>$conditionReglement,
			'ca'=>$post['ca'],
		    'nbEmployes'=>$post['nbreEmployes']  ,
		    'iso'=>$post['iso']  ,
		    'bilan'=>$bilanName  ,
		    'kbis'=>$kbisName  ,
		    'domaineValidation'=>$etapeSuivante));

		// on charge les files
		move_uploaded_file($files['bilan']['tmp_name'],'Ressources/files/'.$bilanName);
		move_uploaded_file($files['kbis']['tmp_name'],'Ressources/files/'.$kbisName);
	}

	// modifier fiche
	public function updateFiche($post,$files,$get,$domaineSuivant,$session) {
		


		$updateCrea=2;
		$erreurs = array();
		$query = "UPDATE `tablefrs`
							SET entite= ?,
								nomDemandeur  = ?,
								fonction = ?,
								raisonDemande = ?,
								siret = ? ,
								complementSiret = ?,
								tva = ? ,
								raisonSociale = ? , 
    							voieRue = ?,
    							codePostal = ?, 
    							ville = ?,
    			 				pays = ?, 
    			 				telephone = ?, 
    							fax = ?, 
    							siteInternet = ?, 
    							raisonSocialePaiement = ?, 
    							voieRuePaiement = ?, 
    							codePostalPaiement = ?, 
						    	villePaiement   = ?, 
						    	paysPaiement = ?, 
						    	groupeAppartenance = ?, 
						    	natureFournisseur  = ?, 
						    	groupeFournisseur  = ?,
						    	incoterm = ?, 
						    	lieuVilleRegleGroupe  = ?, 
						    	francoDePortRegleGroupe  = ?, 
						    	motifDerogationHorsGroupe  = ?, 
						    	BSSTypeProduit = ?, 
						    	devise = ?, 
						    	modeReglement = ?, 
						    	conditionReglement = ?, 
  						    	ca  = ?, 
						    	nbEmployes  = ?, 
						    	iso  = ?, 
							    domaineValidation = ?
								WHERE `ID`= ? "; 
		$stmt =  $this->pdoSql->prepare($query);
		$stmt->execute(array(	$post['entiteDemandeur'],
								$post['nomDemandeur'],
								$post['fonctionDemandeur'],
								$post['raisonDemande'],
								$post['siret'],
								$post['complement'],
								$post['tvaIntra'],
								$post['rsCommande'],
								$post['rueCommande'],
								$post['codePostal'],
								$post['villeCommande'],
								$post['paysCommande'],
								$post['telephone'],
								$post['fax'],
								$post['site'],
								$post['rsPaiement'],
								$post['ruePaiement'],
								$post['cpPaiement'],
								$post['villePaiement'],
								$post['paysPaiement'],
								$post['groupeAppartenance'],
								$post['natureFournisseur'],
								$post['groupeFournisseur'],
								$post['incotermGroupe'],
								$post['lieu'],
								$post['montant'],
								$post['motifDero'],
								$post['typeProduit'],
								$post['deviseHG'],
								$post['modeReglement'],
								$post['conditionReglementHG'],
								$post['ca'],
								$post['nbreEmployes'],
								$post['iso'],
								$domaineSuivant,
								$get['ID'],
								));
	

			$stmt=$this->pdoSql-> prepare('INSERT INTO tablefrsHisto(
							statut,
							ID,
		 					entite,
							nomDemandeur ,
							fonction ,
							dateDemande ,
							raisonDemande,
							siret ,
							complementSiret ,
							tva ,
							raisonSociale, 
    						voieRue ,
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
						    groupeFournisseur  ,
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
						    domaineValidation,
						    domaineInitial
						 ) 
						    VALUES (
						    :statut,
						    :ID,
						    :entite,
						    :nomDemandeur ,
							:fonction ,
							:dateDemande ,
							:raisonDemande,
							:siret ,
							:complementSiret ,
							:tva ,
							:raisonSociale ,
    				 		:voieRue ,
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
						    :groupeFournisseur  ,
						    :incoterm  ,
						    :lieuVilleRegleGroupe  ,
						    :francoDePortRegleGroupe  ,
						    :motifDerogationHorsGroupe  ,
						    :BSSTypeProduit ,
						    :devise ,
						    :modeReglement,
						    :conditionReglement,
  					 	    :ca,
						    :nbEmployes  ,
						    :iso  ,
						    :domaineValidation,
						    :domaineInitial
						    )'
						    );
		// ion execute le prépare
		$stmt->execute(array(
			'statut'=>$updateCrea,
			'ID'=>$get['ID'],
		 	'entite'=>$post['entiteDemandeur'],
		 	'nomDemandeur'=>$post['nomDemandeur'],
		  	'fonction'=>$post['fonctionDemandeur'],
		  	'dateDemande'=>$post['dateJour'],
		  	'raisonDemande'=>$post['raisonDemande'],
		  	'siret'=>$post['siret'],
		  	'complementSiret'=>$post['complement'],
		  	'tva'=>$post['tvaIntra'],
			'raisonSociale'=>$post['rsCommande'] ,
			'voieRue'=>$post['rueCommande'], 
			'codePostal'=>$post['codePostal'],
			'ville'=>$post['villeCommande'] ,
			'pays'=>$post['paysCommande'] , 
			'telephone'=>$post['telephone'] , 
			'fax'=>$post['fax'] ,  
			'siteInternet'=>$post['site'],
			'raisonSocialePaiement'=>$post['rsPaiement'] ,
			'voieRuePaiement'=>$post['ruePaiement'] ,
			'codePostalPaiement'=>$post['cpPaiement'] ,
		    'villePaiement'=>$post['villePaiement']   ,
		    'paysPaiement'=>$post['paysPaiement'] ,
		    'groupeAppartenance'=> $post['groupeAppartenance'], 
		    'natureFournisseur'=>$post['natureFournisseur']  ,
		    'groupeFournisseur'=>$post['groupeFournisseur']  ,
		    'incoterm'=>$post['incotermGroupe']  ,
		    'lieuVilleRegleGroupe'=>$post['lieu'] ,
		    'francoDePortRegleGroupe'=>$post['montant']  ,
		    'motifDerogationHorsGroupe'=>$post['motifDero'] ,
		    'BSSTypeProduit'=>$post['typeProduit'] ,
		    'devise'=> $post['deviseHG'],
		    'modeReglement'=>$post['modeReglement'],
		    'conditionReglement'=>$post['conditionReglementHG'],
			'ca'=>$post['ca'],
		    'nbEmployes'=>$post['nbreEmployes']  ,
		    'iso'=>$post['iso']  ,
		    'domaineValidation'=>$domaineSuivant,
		    'domaineInitial'=>$session

		 	));

	



	/*	$result= $stmt->rowCount();
				} else {
					$erreurs['update'] = 'La fiche n a pas été modifée';
				}
			} else {
				$erreurs['update'] = "Veuillez vérifier les données" ;
			} */
/*header('location:index.php?action=update&id='.$get['id']);
*/		} 


	

}



	

?>