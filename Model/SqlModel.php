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
            return array('idConnecte'=> false,$erreurs['ident']);
        } 
        
        // identifiant obligatoire
        if(!empty($post['password'])) {
            $password = $post['password'];
        } 
        else 
        {
            $erreurs['password'] = 'Le mot de passe ne peut être vide';
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
                    
            // si ident et mdp ok => on retourne true et le user connecté
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
	public function createFiche($post,$get,$files,$etapeSuivante,$timeUnique,$session) {

		// connexion à sqlserver
		$updateCrea=1;
		//$domaineSuivant='nonRenseigne';
				
		// suppression des 2 champs => on les passe à null
		$fax = null;
		$site = null;
		
		$typeDemande = 'C';
	   // 2 champs du post pour mode Réglement : si autre est renseigné on prend valeur de autre
		if ($post['modeReglementHG'] != "" ) 			{
			$modeReglement =$post['modeReglementHG'];
		} else 	{
			$modeReglement= $post['reglementGroupe'];
		}

 		// 2 champs du post pour condition Réglement : si autre est renseigné on prend valeur de autre
		if ($post['conditionReglementHG'] != "" ) {
			$conditionReglement=$post['conditionReglementHG'];
		} else {
			$conditionReglement= $post['conditionReglementG'];
		}

		// Devise : 2 champs possible si HG est <> "" alors hg sinon val defaut
		if ($post['deviseHG'] != "" ) {
			$devise=$post['deviseHG'];
		} else {
			$devise=$post['devise'];
		}

		// si file  rib sélectionné
		if(!empty($files['fileRib']['name'])) 	{
			$ribName=$post['dateJour'].'_'.$files['fileRib']['name'] ;
		}
				
		if ($get['FRS'] == 'gen') {
			
			$natureFournisseur = "300" ;
			$groupeAppartenance = null;
			$genreFournisseur = 'G';
			$typeProduit= '07';
			$incoterm = '&D';
			$lieu=null;
			$montant=null;
			$motifDerog = null;
			$ca=null;
			$nbreEmployes = null;
			$iso = null;
			$kbisName = null;
			$bilanName=null;
			
		} elseif  ($get['FRS'] == 'ind') {
			$genreFournisseur = 'I';
			$natureFournisseur = $post['natureFournisseur'] ;
			$typeProduit= $post['typeProduit']  ;
			$lieu= $post['lieu'] ;
			$montant=$post['montant'] ;
			$motifDerog = $post['motifDerog'] ;
			$ca=$post['ca'] ;
			$nbreEmployes = $post['nbreEmployes'] ;
			$iso = $post['iso'] ;
			
			// 2 champs du poste pour groupe appartenance : si autre est renseigné on prend valeur de autre  => VIDE si FRAIS GENERAUX
			if ($post['autreGroupeFournisseur'] != "" )  {
				$groupeAppartenance=$post['autreGroupeFournisseur'];
			} 	else {
				$groupeAppartenance=$post['groupeAppartenance'];
			}

			// 2 champs du poste pour incoterm : si autre est renseigné on prend valeur de autre 			=> VIDE si FRAIS GENERAUX
			if ($post['incotermHorsGroupe'] != "" ) {
				$incoterm=$post['incotermHorsGroupe'];
			} else  {
				$incoterm=$post['incoterm'];
			}

			// si file  kbis sélectionné
			if(!empty($files['kbis']['name'])) 	{
				$kbisName=$post['dateJour'].'_'.$files['kbis']['name'] ;
			}
		
			
			// si file  bilan sélectionné
			if(!empty($files['bilan']['name']))	{ 			
				$bilanName=$post['dateJour'].'_'.$files['bilan']['name']  ;
			}
		} // if ($get['FRS'] == 'ind')
		

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
						    idEnvoi,
						    codeM3,
						    identiteBanquePays,
						    nomBanque,
						    codeBanque,
						    etablissementBanque,
						    numeroCompteBanque,
						    cleCompteBanque,
						    iban,
						    swift,
						    voieRueComplement,
						    voieRuePaiementComplement,
						    objetComptable,
                            fileRib,
                            genreFournisseur,
                            typeDemande,
                            langue
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
						    :swift,
						    :voieRueComplement,
						    :voieRuePaiementComplement,
						    :objetComptable,
                            :fileRib,
                            :genreFournisseur,
                            :typeDemande,
                            :langue
						    )'
						    );
		// on execute le prépare
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
			'fax'=>$fax ,  
			'siteInternet'=>$site,
			'raisonSocialePaiement'=>$post['rsPaiement'] ,
			'voieRuePaiement'=>$post['ruePaiement'] ,
			'codePostalPaiement'=>$post['cpPaiement'] ,
		    'villePaiement'=>$post['villePaiement']   ,
		    'paysPaiement'=>$post['paysPaiement'] ,
		    'groupeAppartenance'=>$groupeAppartenance  ,
		    'natureFournisseur'=>$natureFournisseur  ,
		    'groupeFournisseur'=>$post['groupeFournisseur']  ,
		    'incoterm'=>$incoterm  ,
		    'lieuVilleRegleGroupe'=>$lieu ,
		    'francoDePortRegleGroupe'=>$montant ,
		    'motifDerogationHorsGroupe'=>$motifDerog ,
		    'BSSTypeProduit'=>$typeProduit,
		    'devise'=>$devise ,
		    'modeReglement'=>$modeReglement,
		    'conditionReglement'=>$conditionReglement,
			'ca'=>$ca,
		    'nbEmployes'=>$nbreEmployes  ,
		    'iso'=>$iso  ,
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
			'swift'=>$post['swift'],
			'voieRueComplement'=>$post['rue2Commande'],
			'voieRuePaiementComplement'=>$post['rue2Paiement'],
			'objetComptable'=>$post['objetComptable'],
            'fileRib'=>$ribName,
            'genreFournisseur'=>$genreFournisseur,
            'typeDemande'=>$typeDemande,
            'langue'=>$post['langue']
		 	));
			$lastID= $this->pdoSql->lastInsertId();

		// on charge les files

		move_uploaded_file($files['bilan']['tmp_name'],'Ressources/files/'.$bilanName);
		move_uploaded_file($files['kbis']['tmp_name'],'Ressources/files/'.$kbisName);
		move_uploaded_file($files['fileRib']['tmp_name'],'Ressources/files/'.$ribName);
		
	
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
						    swift,
						    voieRueComplement,
						    voieRuePaiementComplement,
						    objetComptable,
                            fileRib,
                            genreFournisseur,
                            typeDemande,
                            langue
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
						    :bilan ,
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
						    :swift,
						    :voieRueComplement,
						    :voieRuePaiementComplement,
                            :objetComptable,
                            :fileRib,
                            :genreFournisseur,
                            :typeDemande,
                            :langue						   
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
			'fax'=>$fax ,  
			'siteInternet'=>$site,
			'raisonSocialePaiement'=>$post['rsPaiement'] ,
			'voieRuePaiement'=>$post['ruePaiement'] ,
			'codePostalPaiement'=>$post['cpPaiement'] ,
		    'villePaiement'=>$post['villePaiement']   ,
		    'paysPaiement'=>$post['paysPaiement'] ,
		    'groupeAppartenance'=>$groupeAppartenance  ,
		    'natureFournisseur'=>$natureFournisseur  ,
		    'groupeFournisseur'=>$post['groupeFournisseur']  ,
		    'incoterm'=>$incoterm  ,
		    'lieuVilleRegleGroupe'=>$post['lieu'] ,
		    'francoDePortRegleGroupe'=>$post['montant']  ,
		    'motifDerogationHorsGroupe'=>$post['motifDero'] ,
		    'BSSTypeProduit'=>$typeProduit,
		    'devise'=>$devise ,
		    'modeReglement'=>$modeReglement,
		    'conditionReglement'=>$conditionReglement,
			'ca'=>$ca,
		    'nbEmployes'=>$nbreEmployes ,
		    'iso'=>$iso  ,
		    'bilan'=>$bilanName  ,
		    'kbis'=>$kbisName  ,
		    'domaineValidation'=>$etapeSuivante,
		    'domaineInitial'=> $session,	// à la création le domaine = 'user' vide pour comparer et envoyer les modifs par rapport à la demande initiale
		    'lastModif'=>$timeUnique,
		    'codeM3'=>0,
		    'identiteBanquePays'=>$post['idBanq'] ,
			'nomBanque' =>$post['nomBanq'],
		    'codeBanque' =>$post['codeBanq'],
		    'etablissementBanque'=>$post['etabBanq'],
			'numeroCompteBanque'=>$post['numCompte'],
			'cleCompteBanque'=>$post['cleCompte'],
			'iban'=>$post['iban'],
			'swift'=>$post['swift'],
			'voieRueComplement'=>$post['rue2Commande'],
			'voieRuePaiementComplement'=>$post['rue2Paiement'],
			'objetComptable'=>$post['objetComptable'],
            'fileRib'=>$ribName,
            'genreFournisseur'=>$genreFournisseur,
            'typeDemande'=>$typeDemande,
            'langue'=>$post['langue']
		    ));

		// on charge les files
		move_uploaded_file($files['bilan']['tmp_name'],'Ressources/files/'.$bilanName);
		move_uploaded_file($files['kbis']['tmp_name'],'Ressources/files/'.$kbisName);
		move_uploaded_file($files['fileRib']['tmp_name'],'Ressources/files/'.$ribName);

		return(array('result'=>$result , 'ribName'=>$ribName, 'bilanName'=>$bilanName, 'kbisName'=>$kbisName));
		 
	}

	// modifier fiche
	public function updateFiche($post,$files,$get,$domaineSuivant,$session,$frsM3) {

 		$erreurs = array();

 		$fax = null;
 		$siteInternet=null;
		$updateCrea= 2 ;
		

		if ($get['genre'] == 'G' ) {
			$incoterm = null;
			$groupeAppartenance= null;
			$lieu = null ;
			$montant = null;
			$motifDero= null;
			$ca = null;
			$nbreEmployes = null;
			$iso = null; 
			$typeProduit = '07';

		} elseif ($get['genre'] == 'I' ) {
			$incoterm = $post['incotermGroupe'];
			$groupeAppartenance= $post['groupeAppartenance'];
			$lieu = $post['lieu'];
			$montant = $post['montant'];
			$motifDero = $post['motifDero'];
			$ca = $post['ca'];
			$nbreEmployes = $post['nbreEmployes'];
			$typeProduit = $post['typeProduit'] ; 
		}

		$query = "UPDATE `tablefrs`
							SET siret = ? ,
								complementSiret = ?,
								tva = ? ,
								raisonSociale = ? , 
    							voieRue = ?,
    							codePostal = ?, 
    							ville = ?,
    			 				pays = ?, 
    			 				telephone = ?, 
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
						    	swift = ?,
						    	voieRueComplement = ?,
						    	voieRuePaiementComplement = ?,
                            	objetComptable = ?,
                            	langue = ?
								WHERE `ID`= ? "; 
		$stmt =  $this->pdoSql->prepare($query);
		$stmt->execute(array(	$post['siret'],
								$post['complement'],
								$post['tvaIntra'],
								$post['rsCommande'],
								$post['rueCommande'],
								$post['codePostal'],
								$post['villeCommande'],
								$post['paysCommande'],
								$post['telephone'],						
								$post['rsPaiement'],
								$post['ruePaiement'],
								$post['cpPaiement'],
								$post['villePaiement'],
								$post['paysPaiement'],
								$groupeAppartenance,
								$post['natureFournisseur'],
								$post['groupeFournisseur'],
								$incoterm,
								$lieu,
								$montant,
								$motifDero,
								$typeProduit,
								$post['deviseHG'],
								$post['modeReglement'],
								$post['conditionReglementHG'],
								$ca,
								$nbreEmployes,
								$iso,
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
								$post['rue2Commande'],
			 					$post['rue2Paiement'],
			 					$post['objetComptable'],
            					$post['langue'],
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
						    swift,
						    voieRueComplement ,
						    voieRuePaiementComplement ,
                            objetComptable ,
                            genreFournisseur ,
                            typeDemande ,
                            langue 
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
  					 	    :ca ,
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
						    :swift,
						    :voieRueComplement,
						    :voieRuePaiementComplement ,
                            :objetComptable ,
                            :genreFournisseur ,
                            :typeDemande, 
                            :langue 
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
			'fax'=>$fax ,  
			'siteInternet'=>$siteInternet,
			'raisonSocialePaiement'=>$post['rsPaiement'] ,
			'voieRuePaiement'=>$post['ruePaiement'] ,
			'codePostalPaiement'=>$post['cpPaiement'] ,
		    'villePaiement'=>$post['villePaiement']   ,
		    'paysPaiement'=>$post['paysPaiement'] ,
		    'groupeAppartenance'=> $groupeAppartenance, 
		    'natureFournisseur'=>$post['natureFournisseur']  ,
		    'groupeFournisseur'=>$post['groupeFournisseur']  ,
		    'incoterm'=>$incoterm  ,
		    'lieuVilleRegleGroupe'=>$lieu ,
		    'francoDePortRegleGroupe'=>$montant ,
		    'motifDerogationHorsGroupe'=>$motifDero ,
		    'BSSTypeProduit'=>$typeProduit ,
		    'devise'=> $post['deviseHG'],
		    'modeReglement'=>$post['modeReglement'],
		    'conditionReglement'=>$post['conditionReglementHG'],
			'ca'=>$ca,
		    'nbEmployes'=>$nbreEmployes  ,
		    'iso'=>$iso  ,
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
			'swift'=> $post['swift'],
	    	'voieRueComplement'=>$post['rue2Commande'],
			'voieRuePaiementComplement'=> $post['rue2Paiement'] ,
            'objetComptable' => $post['objetComptable'] ,
            'genreFournisseur' => $get['genre'] ,
            'typeDemande' => $get['typeDde'], 
            'langue' => $post['langue'] 	));



	/*	$result= $stmt->rowCount();
				} else {
					$erreurs['update'] = 'La fiche n a pas été modifée';
				}
			} else {
				$erreurs['update'] = "Veuillez vérifier les données" ;
			} */
/*header('location:index.php?action=update&id='.$get['id']);
*/		} 

// modifier fiche
	public function updatecodeM3Fiche($get,$numeroStringM3) {
		
		$updateCrea=3;  // création dans M3
		$erreurs = array();
		$query = "UPDATE `tablefrs`
							SET codeM3= ? 
							WHERE `ID`= ? "; 
	
		$stmt =  $this->pdoSql->prepare($query);
		$stmt->execute(array($numeroStringM3, $get['ID']));
	
	}

}



	

?>