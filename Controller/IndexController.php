<?php
require_once('Controller/Controller.php') ;

class IndexController extends Controller {


	public function indexAction() {
		$app_title="FournisseurM3" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		

		$this->redirect('','creeFournisseurs');
	}

	public function creeFournisseursAction() {
		$app_title="Créer Fournisseurs " ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		
		
		require_once('Model/Db2Model.php');
		require('Model/SqlModel.php');

			// lister divi
			$entiteModel = new Db2Model($this->getBiblio()); 
			$entite = $entiteModel->listerEntite();

			$today = date("Ymd");
			

			// lister groupe appartenace Fournisseur suty = 3 de cidmas
			$groupeAppartenanceModel = new Db2Model($this->getBiblio()); 
			$groupeAppartenance = $groupeAppartenanceModel->listerGrpAppartenance();
			
			// lister groupeFournisseur
		 
			$groupeFournisseurModel = new Db2Model($this->getBiblio()); 
			$groupeFournisseur = $groupeFournisseurModel->listerSUCL();
			
			// lister Conditions livraisons Groupe
			 
			$conditionsLivraisonsHorsGroupeModel = new Db2Model($this->getBiblio()); 
			$condition = $conditionsLivraisonsHorsGroupeModel->listerTEDL();
			
			// lister Mode de règlement
			$modeReglementModel = new Db2Model($this->getBiblio()); 
			$modeReglement = $modeReglementModel->listerPYME();

			// lister Conditions de règlement
			$conditionReglementModel = new Db2Model($this->getBiblio()); 
			$conditionReglement = $conditionReglementModel->listerTEPY();
		 

			// lister devise
			$deviseModel = new Db2Model($this->getBiblio()); 
			$devise = $deviseModel->listerCUCD();

			// lister devise
			$paysModel = new Db2Model($this->getBiblio()); 
			$pays = $paysModel->listerCSCD();
		 	
		 	// gestion des erreurs
			$erreurs = array();
		 	

			$etapeSuivante=null;
			$timeUnique=null;
			$time=null;
			

			if($this->post) {
			$post = $this->post;
			$files =$this->files;			
			
			 if (isset($post['Valider'])) {
			 	$etapeSuivante='achats';
			 	$timeUnique='NA';
			 	$FicheFournisseurModel = new SqlModel(); 
				$result = $FicheFournisseurModel->createFiche($post,$files,$etapeSuivante,$timeUnique);
			 }
			 elseif (isset($post['EnvoiFour'])) {
			 	$etapeSuivante='fournisseur';
			 	$time=time();
			 	$timeUnique=md5($time);
			 	$FicheFournisseurModel = new SqlModel(); 
				$result = $FicheFournisseurModel->createFiche($post,$files,$etapeSuivante,$timeUnique);
				var_dump($timeUnique);
				$resultRetrouveID = $FicheFournisseurModel->getID($timeUnique);
				$this->redirect('','fenetreConfirmation',array('idEnvoi'=>$timeUnique,'ID'=>$resultRetrouveID['ID']));		
			 }
			 
				
			 	
			

			// $FicheFournisseurModel = new SqlModel(); 
			// $result = $FicheFournisseurModel->createFiche($post,$files,$etapeSuivante,$timeUnique);
			
		}

		require('View/Index/creation.php') ; 
	}
		
	public function fenetreConfirmationAction() {

		require 'lib/libphp-phpmailer/PHPMailerAutoload.php';
		$app_title="Modification Fiche";
		$app_desc="Comeca" ;
		$app_body="body_Index" ;		 	
	 
	 	if ($this->post) {
	 	if($this->post['Envoi']){
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp2.comeca-group.com';
		$mail->SMTPAuth = false;
		$mail->SMTPDebug = true;

		$mail->From = 'accueil@comeca-group.com'; 
		$mail->FromName = 'Comeca Group';
		$mail->addAddress($this->post['emailSupplier']);

		$mail->isHTML(true);

		$mail->Subject = 'Concernant votre ajout dans la base de donnees Comeca';
		$mail->Body    = ' Merci de remplir les informations nécessaires à la comptabilité sur ce lien : <a href="'.$this->post['Lien'].'"> </a>';

				if(!$mail->send()) {
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				 } else {
				    echo 'Message has been sent';
				}		
		} 
		
	 	}

		require('View/Index/demandeFournisseur.php') ; 
	}

	public function updateByFournisseurAction() {
		$app_title="Modification Fiche";
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		$session ="fournisseur";

		require_once('Model/SqlModel.php');

		require_once('Model/Db2Model.php');
	
		$SqlModel = new SqlModel();
		
		$UnFournisseur = $SqlModel->getInfosForFournisseur($this->get['idEnvoi'],$this->get['ID']);


		// lister divi
		$entiteModel = new Db2Model($this->getBiblio()); 
		$entite = $entiteModel->listerEntite();

		// lister groupeFournisseur
		$groupeFournisseurModel = new Db2Model($this->getBiblio()); 
		$groupeFournisseur = $groupeFournisseurModel->listerSUCL();
			
		// lister Conditions livraisons Groupe
		$conditionsLivraisonModel = new Db2Model($this->getBiblio()); 
		$conditionLivraison = $conditionsLivraisonModel->listerTEDL();
		
		// lister Mode de règlement
		$modeReglementModel = new Db2Model($this->getBiblio()); 
		$modeReglement = $modeReglementModel->listerPYME();

		// lister Conditions de règlement
		$conditionReglementModel = new Db2Model($this->getBiblio()); 
		$conditionReglement = $conditionReglementModel->listerTEPY();
	 

		// lister devise
		$deviseModel = new Db2Model($this->getBiblio()); 
		$devise = $deviseModel->listerCUCD();

		// lister pays
		$paysModel = new Db2Model($this->getBiblio()); 
		$pays = $paysModel->listerCSCD();

		if($this->get) 
		{
			$get = $this->get;	
		}
		 	
	 	if($this->post) 
	 	{
			var_dump($this->post);
			$post = $this->post;
			$files =$this->files;

			$FicheFournisseurModel = new SqlModel(); 

			// test du niveau
		 	

			// si on valide
			if(isset($post['Valider']))
			{
				$domaineSuivant = 'achats';
			}

			$result = $FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session);
			
			$this->redirect('','remerciements');

			// Lance lors de Valider la création dans Movex 


       		if (is_array($result)) 
       		{
				$erreurs = $result;
				
			} 
			else 
			{
				//$this->redirect($session,'accueil',$resultM3);
			}  
		 
		} // if $this->post

		require('View/Index/update.php') ; 
	}

	public function remerciementsAction() {
		$app_title="Modification Fiche";
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		$session = null;

		require('View/Index/thanks.php') ; 
	}

	public function updateAction() {

		$app_title="Modification Fiche";
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		$session = $_SESSION['ident'];
		

		// liste dÃ©roulante catÃ©gorie
		require_once('Model/SqlModel.php');

		require_once('Model/Db2Model.php');
	
		$SqlModel = new SqlModel();
		
		$UnFournisseur = $SqlModel->getInfos($this->get['ID']);


		// lister groupe appartenace Fournisseur suty = 3 de cidmas
		$groupeAppartenanceModel = new Db2Model($this->getBiblio()); 
		$groupeAppartenance = $groupeAppartenanceModel->listerGrpAppartenance();

		// lister divi
		$entiteModel = new Db2Model($this->getBiblio()); 
		$entite = $entiteModel->listerEntite();

		$today = date("Ymd");
			
		// lister groupeFournisseur
		$groupeFournisseurModel = new Db2Model($this->getBiblio()); 
		$groupeFournisseur = $groupeFournisseurModel->listerSUCL();
			
		// lister Conditions livraisons Groupe
		$conditionsLivraisonModel = new Db2Model($this->getBiblio()); 
		$conditionLivraison = $conditionsLivraisonModel->listerTEDL();
		
		// lister Mode de règlement
		$modeReglementModel = new Db2Model($this->getBiblio()); 
		$modeReglement = $modeReglementModel->listerPYME();

		// lister Conditions de règlement
		$conditionReglementModel = new Db2Model($this->getBiblio()); 
		$conditionReglement = $conditionReglementModel->listerTEPY();
	 

		// lister devise
		$deviseModel = new Db2Model($this->getBiblio()); 
		$devise = $deviseModel->listerCUCD();

		// lister pays
		$paysModel = new Db2Model($this->getBiblio()); 
		$pays = $paysModel->listerCSCD();

		if($this->get) 
		{
			$get = $this->get;	
		}
		 	
	 	if($this->post) 
	 	{
			//var_dump($this->post);

			$post = $this->post;
			$files =$this->files;

			$FicheFournisseurModel = new SqlModel(); 

			// test du niveau
		 	$domaineSuivant = null;

			// si on valide
			if(isset($post['Valider']))
			{
				if($post['domaine']=='achats')	
				{
					$domaineSuivant = 'compta';
				}
				elseif ($post['domaine']=='compta' ) 
				{
					$domaineSuivant = 'compta';
					$testPourDomaine = 'Movex';			

					if ($testPourDomaine = 'Movex') {

						// rechercher le dernier Numéro et + 1 
						require_once('Model/Db2Model.php');
						$db2Model = new Db2Model();					 
						$derNumero = $db2Model->rechercheDernierFrsM3();

						 

						$numero= intval($derNumero[0])+1;
				  		$numeroString = '0'.$numero;	  	 
						// liste des clients 
						require_once('Model/ApiM3Model.php');
						$apiModel = new ApiM3Model();
						
						// return 
						$resultM3 = $apiModel->creerfrsM3($this->post,$numeroString);
						$resultAdrM3 = $apiModel->creerAdresseM3($this->post,$numeroString);
							
						if(isset($resultM3['succes']) && isset($resultAdrM3['succes']) )
						{
							$domaineSuivant = 'Movex';
						}

				} 

				}
			}
			elseif (isset($post['Attente'])) 
			{
				$domaineSuivant = $post['domaine'] ;
				$this->redirect($session,'accueil');
			}

			$result = $FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session);

			// Lance lors de Valider la création dans Movex 


       		if (is_array($result)) 
       		{
				$erreurs = $result;
				
			} 
			elseif (isset($resultM3['succes']) && isset($resultAdrM3['succes']) ) {
				$this->redirect($session,'accueil',$resultM3,$post);
			}
			elseif (!isset($resultM3['succes']) || !isset($resultAdrM3['succes']) ) {
				var_dump($resultM3)	; 	var_dump($resultAdrM3)	; 
				$this->redirect('', 'update',array('ID'=>$get['ID'],'transa'=>$resultM3['transa']));

			

			}
	
		 
		} // if $this->post

		require('View/Index/update.php') ; 		 
	}

	
	
}

 
?>




 

