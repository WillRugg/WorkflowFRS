<?php
require_once('Model/Model.php') ;

class SqlModel extends Model{

	// Fonction qui r�cup�re la table "champs 
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
            $erreurs['ident'] = 'L\'identifiant ne peut �tre vide';
            return array('idConnecte'=> false,$erreurs['ident']);
        } 
        
        // identifiant obligatoire
        if(!empty($post['password'])) {
            $password = $post['password'];
        } 
        else 
        {
            $erreurs['password'] = 'Le mot de passe ne peut �tre vide';
            return array('idConnecte'=> false,$erreurs['password']);
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
            	$erreurs['ident'] = 'Le user est incorrect';
                return array('idConnecte'=> false,$erreurs['ident'] );
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
                $erreurs['ident'] = 'Le user est inexistant';
                return array('idConnecte'=> false,$erreurs['user']);
            }
                    
            // si ident et mdp ok => on retourne true et le user connect�
            if ($admin == $userBdd && $password == $passwordBdd ) {
                return array('idConnecte'=>true ,'userConnecte' => $userBdd, 'environnement' => $environnementBdd);
            }
            else
            {
                $erreurs['password'] = 'Le mot de passe est incorrect';
                return array('idConnecte'=> false,$erreurs['password'] );
            }
       }  
   }


	// fonction qui ajoute le param�tre de config avec le POST en param�tre
	// passage du $post pour v�rifier la connection
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

	// s�lection des Frs encours
	public function AfficheAll() {
      
      $query = "SELECT * FROM `tablefrs`";
      $stmt = $this->pdoSql->query($query);

      return $stmt->fetchAll();
	}

	// r�cup�re champs pour 1 Id
	public function RecupUnite($id) {     

      	$query = "SELECT * FROM `tablefrs` where ID='".$id."'";
      	$stmt = $this->pdoSql->query($query);

     return $stmt->fetch();
       
	}

	public function getDemandeOrigine($id) {
     
	    $query = "SELECT * FROM `tablefrshisto` where  domaineInitial = 'user' and ID='".$id."'";
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
	public function createFiche($post,$files,$etapeSuivante,$timeUnique,$session) {

		// connexion � sqlserver
		$updateCrea=1;
		//$domaineSuivant='nonRenseigne';

		// 2 champs du poste pour groupe appartenance : si autre est renseign� on prend valeur de autre
		if ($post['autreGroupeFournisseur'] != "" )
		{
			$groupeAppartenance=$post['autreGroupeFournisseur'];
		} 
		else 
		{
			$groupeAppartenance=$post['groupeAppartenance'];
		}

		// 2 champs du poste pour incoterm : si autre est renseign� on prend valeur de autre
		if ($post['incotermHorsGroupe'] != "" )
		{
			$incoterm=$post['incotermHorsGroupe'];
		} 
		else 
		{
			$incoterm=$post['incoterm'];
		}

		// 2 champs du post pour mode R�glement : si autre est renseign� on prend valeur de autre
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

		// si file  kbis s�lectionn�
		if(empty($files['kbis']['name']))
		{
			$kbisName=null;
		}
		else
		{
			$kbisName=$post['dateJour'].$files['kbis']['name'] ;
		}
		
		// si file  bilan s�lectionn�
		if(empty($files['bilan']['name']))	{
			$bilanName=null;
		}
		else
		{
			$bilanName=$post['dateJour'].$files['bilan']['name']  ;
		}

		 
		// on pr�pare l insert avec pdo (bindparam ne fonctionne pas)
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
						    idEnvoi,
						    codeM3,
						    identiteBanquePays,
						    nomBanque,
						    codeBanque,
						    etablissementBanque,
						    numeroCompteBanque,
						    cleCompteBanque,
						    iban,
						    swift
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
						    :idEnvoi,
						    :codeM3,
						    :identiteBanquePays,
						    :nomBanque,
						    :codeBanque,
						    :etablissementBanque,
						    :numeroCompteBanque,
						    :cleCompteBanque,
						    :iban,
						    :swift
						    )'
						    );
		// on execute le pr�pare
		$result = $stmt->execute(array(
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
		    'idEnvoi'=>$timeUnique,
		    'codeM3'=>0,
		    'identiteBanquePays'=>$post['idBanq'] ,
		    'nomBanque' =>$post['nomBanq'],
		    'codeBanque' =>$post['codeBanq'],
		    'etablissementBanque'=>$post['etabBanq'],
			'numeroCompteBanque'=>$post['numCompte'],
			'cleCompteBanque'=>$post['cleCompte'],
			'iban'=>$post['iban'],
			'swift'=>$post['swift']
		 	));
			$lastID= $this->pdoSql->lastInsertId();

		// on charge les files
		move_uploaded_file($files['bilan']['tmp_name'],'Ressources/files/'.$bilanName);
		move_uploaded_file($files['kbis']['tmp_name'],'Ressources/files/'.$kbisName);
		
	
		// historique => tablefrsHisto toujours insert
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
						    domaineValidation,
						    domaineInitial,
						    lastModif,
						    codeM3,
						    identiteBanquePays,
						    nomBanque,
						    codeBanque,
						    etablissementBanque,
						    numeroCompteBanque,
						    cleCompteBanque,
						    iban,
						    swift
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
						    :domaineValidation,
						    :domaineInitial,
						    :lastModif,
						    :codeM3,
						    :identiteBanquePays,
						    :nomBanque,
						    :codeBanque,
						    :etablissementBanque,
						    :numeroCompteBanque,
						    :cleCompteBanque,
						    :iban,
						    :swift
						    )');
		// ion execute le pr�pare
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
		    'domaineValidation'=>$etapeSuivante,
		    'domaineInitial'=> $session,	// � la cr�ation le domaine = 'user' vide pour comparer et envoyer les modifs par rapport � la demande initiale
		    'lastModif'=>$timeUnique,
		    'codeM3'=>0,
		    'identiteBanquePays'=>$post['idBanq'] ,
			'nomBanque' =>$post['nomBanq'],
		    'codeBanque' =>$post['codeBanq'],
		    'etablissementBanque'=>$post['etabBanq'],
			'numeroCompteBanque'=>$post['numCompte'],
			'cleCompteBanque'=>$post['cleCompte'],
			'iban'=>$post['iban'],
			'swift'=>$post['swift']
		    ));

		// on charge les files
		move_uploaded_file($files['bilan']['tmp_name'],'Ressources/files/'.$bilanName);
		move_uploaded_file($files['kbis']['tmp_name'],'Ressources/files/'.$kbisName);
		return($result);
	}

	// modifier fiche
	public function updateFiche($post,$files,$get,$domaineSuivant,$session,$frsM3) {
		 
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
							    domaineValidation = ?,
							    codeM3 = ?,
							    identiteBanquePays = ?,
							    nomBanque = ? ,
						    	codeBanque = ? ,
						    	etablissementBanque = ?,
						    	numeroCompteBanque = ?,
						    	cleCompteBanque = ?,
						    	iban = ?,
						    	swift = ?
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
								$frsM3,
								$post['idBanq'],
								$post['nomBanq'],
								$post['codeBanq'],
								$post['etabBanq'],
								$post['numCompte'],
								$post['cleCompte'],
								$post['iban'],
								$post['swift'],
								$get['ID']
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
						    domaineInitial,
						    codeM3,
						    identiteBanquePays ,
						    nomBanque ,
						    codeBanque ,
						    etablissementBanque ,
						    numeroCompteBanque ,
						    cleCompteBanque ,
						    iban ,
						    swift
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
						    :domaineInitial,
						    :codeM3,
						    :identiteBanquePays ,
						    :nomBanque ,
						    :codeBanque ,
						    :etablissementBanque ,
						    :numeroCompteBanque ,
						    :cleCompteBanque ,
						    :iban ,
						    :swift
						    )'
						    );
		// ion execute le pr�pare
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
		    'domaineInitial'=>$session,
		    'codeM3'=>$frsM3,
		    'identiteBanquePays'=> $post['idBanq'],
		    'nomBanque' => $post['nomBanq'],
			'codeBanque' => $post['codeBanq'],
			'etablissementBanque' => $post['etabBanq'],
			'numeroCompteBanque'=> 	$post['numCompte'],
			'cleCompteBanque' => $post['cleCompte'],
			'iban' => $post['iban'],
			'swift'=> $post['swift']
		 	));



	/*	$result= $stmt->rowCount();
				} else {
					$erreurs['update'] = 'La fiche n a pas �t� modif�e';
				}
			} else {
				$erreurs['update'] = "Veuillez v�rifier les donn�es" ;
			} */
/*header('location:index.php?action=update&id='.$get['id']);
*/		} 

// modifier fiche
	public function updatecodeM3Fiche($get,$numeroStringM3) {
		
		$updateCrea=3;  // cr�ation dans M3
		$erreurs = array();
		$query = "UPDATE `tablefrs`
							SET codeM3= ? 
							WHERE `ID`= ? "; 
	
		$stmt =  $this->pdoSql->prepare($query);
		$stmt->execute(array($numeroStringM3, $get['ID']));
	
	}

}



	

?>