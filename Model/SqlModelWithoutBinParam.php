<?php
require_once('Model/Model.php') ;

class SqlModel extends Model{
	
	public function createFiche($post) {

	// connexion à sqlserver

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
						    domaineValidation
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
						     :bilanAFournir  ,
						     :domaineValidation
						    )'
						    );
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
			'codePostal'=>$post['codepopo'],
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
		    'groupeAppartenance'=>$post['groupeFournisseur']  ,
		    'natureFournisseur'=>$post['natureFournisseur']  ,
		    'incoterm'=>$post['incoterm']  ,
		     'lieuVilleRegleGroupe'=>$post['lieu'] ,
		    'francoDePortRegleGroupe'=>$post['montant']  ,
		     'motifDerogationHorsGroupe'=>$post['motifDero'] ,
		    'BSSTypeProduit'=>$post['typeProduit'] ,
		    'devise'=>$post['devise'] ,
		    'modeReglement'=>$post['modeReglementHG'],
		    'conditionReglement'=>$post['conditionReglement'],
			 'ca'=>$post['ca'],
		    'nbEmployes'=>$post['nbreEmployes']  ,
		     'iso'=>$post['iso']  ,
		     'bilanAFournir'=>$post['deviseHG']  ,
		     'domaineValidation'=>$post['domaine']

		 	));
	
                               


			 
		}

 
	 	// $stmt->bindParam(':entite' , $data['entiteDemandeur']);
			// $stmt->bindParam(':nomDemandeur' , $data['nomDemandeur']);
			// $stmt->bindParam(':fonction', $data['fonctionDemandeur']);
			// $stmt->bindParam(':dateDemande' , $data['dateJour']);
			// $stmt->bindParam(':raisonSociale' , $data['rsCommande']);
   //  		$stmt->bindParam(':voieRue',  $data['rueCommande']);
   //  		$stmt->bindParam(':codePostal' , $data['cpCommande']);
   //  		$stmt->bindParam(':ville' , $data['villeCommande']);
   //  		$stmt->bindParam(':pays' ,  $data['paysCommande']);
   //  		$stmt->bindParam(':domaineValidation',$data['domaine']);
	
}
?>