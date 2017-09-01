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
 		//Chargement de la class

 			
				// envoi mail par phpmailer
				if ($result) {
					
					// envoi mail au demandeur
					require('Module/envoiMail.php') ;
					$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion

					//$adresseMail = 'compta_wkf_frs@comeca-group.com'  ;
					$adresseMail = 'achats_wkf_frs@comeca-group.com'  ;
					$sujet = 'Workflow Fournisseur  à valider : '.$post['rsCommande'];
					//Sujet
					$mail->Subject = $sujet;
					$mail->AddAddress($adresseMail);
					//Contenu du  message en HTML : table  
				 	ob_start();
				 	
					?>
					<!-- envoi du mail en table pour générer du HTML -->
			 		<table style="font-family:sans-serif" border="1" >
			 			<tr>
							<th colspan="5">Vous avez une fiche Fournisseur à valider</th>
							 
						</tr>
						<tr>
							<th>Entite Demandeur</th>
							<th>Nom Demandeur</th>
							<th>Date creation</th>
							<th>Nom Fournisseur</th>
							<th>Raison Demande</th>
						</tr>
						<tr>
							<td><?php echo $this->post['entiteDemandeur']; ?></td>
							<td><?php echo $this->post['nomDemandeur']; ?></td>
							<td><?php echo $this->post['dateJour']; ?></td>
							<td><?php echo $this->post['rsCommande']; ?></td>
							<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
						</tr>
					</table>
						 
					<?php
					// concerne le HTML du contenu du mail 
					$mail->Body = ob_get_contents();
					ob_end_clean();

					$envoiMail = $mail->Send();
					 				
					if(!$envoiMail) {
                           echo 'Le Message n est pas envoye';
                           echo 'Mailer Error: ' . $mail->ErrorInfo;
                       } else {
                           echo 'le Message a ete envoye à ' .$adresseMail;
                    }                              

			 	 	$mail->SmtpClose();
		   		 	// ferme la connexion smtp et désalloue la mémoire...
		    		unset($mail); 

				} 	// if ($result) 
 
			 } //if (isset($post['Valider'])) 
			 elseif (isset($post['EnvoiFour'])) 
			 {
			 	$etapeSuivante='fournisseur';
			 	$time=time();
			 	$timeUnique=md5($time);
			 	$FicheFournisseurModel = new SqlModel(); 
				$result = $FicheFournisseurModel->createFiche($post,$files,$etapeSuivante,$timeUnique);
				//var_dump($timeUnique);
				$resultRetrouveID = $FicheFournisseurModel->getID($timeUnique);
				$this->redirect('','fenetreConfirmation',array('idEnvoi'=>$timeUnique,'ID'=>$resultRetrouveID['ID']));		
			 }
			
		} // if($post)

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
			$mail->SMTPDebug = false;

			$mail->From = 'accueil@comeca-group.com'; 
			$mail->FromName = 'Comeca Group';
			$mail->addAddress($this->post['emailSupplier']);

			$mail->isHTML(true);

			$mail->Subject = 'Concernant votre ajout dans la base de donnees Comeca';
			$mail->Body    = ' Merci de remplir les informations nécessaires à la comptabilité sur ce lien : <a href="'.$this->post['Lien'].'"> Cliquez ici </a>';

					if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					 } else {
					    echo 'Message has been sent';
					}		
			} // if($this->post['Envoi'])
		
	 	} // if ($this->post)

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
		 
		} // if ($this->post)

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

			
			if(isset($post['Valider'])) 	// si on clique sur le bouton valider
			{
				if($post['domaine']=='achats')	
				{
					$domaineSuivant = 'compta';
					 
				 	// envoi mail au demandeur
					require('Module/envoiMail.php') ;
						$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion

						//$adresseMail = 'compta_wkf_frs@comeca-group.com'  ;
						$adresseMail = 'compta_wkf_frs@comeca-group.com'  ;
						$sujet = 'Workflow Fournisseur  à valider : '.$post['rsCommande'];
						
						$mail->Subject = $sujet;
						$mail->AddAddress($adresseMail);
						//Contenu du  message en HTML : table  
					 	ob_start();
					 	
						?>
						<!-- envoi du mail en table pour générer du HTML -->
				 		<table style="font-family:sans-serif" border="1" >
				 			<tr>
								<th colspan="5">Vous avez une fiche Fournisseur à valider</th>
								 
							</tr>
							<tr>
								<th>Entite Demandeur</th>
								<th>Nom Demandeur</th>
								<th>Date creation</th>
								<th>Nom Fournisseur</th>
								<th>Raison Demande</th>
							</tr>
							<tr>
								<td><?php echo $this->post['entiteDemandeur']; ?></td>
								<td><?php echo $this->post['nomDemandeur']; ?></td>
								<td><?php echo $this->post['dateJour']; ?></td>
								<td><?php echo $this->post['rsCommande']; ?></td>
								<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
							</tr>
						</table>
							 
						<?php
						// concerne le HTML du contenu du mail 
						$mail->Body = ob_get_contents();
						ob_end_clean();

						$envoiMail = $mail->Send();
						 				
						if(!$envoiMail) {
	                           $errorMail = 'Le Message n est pas envoye - Mailer Error: ' . $mail->ErrorInfo;
	                           
	                       } else {
	                           $okMail= 'le Message a ete envoye';
	                    }                              

				 	 	$mail->SmtpClose();
			   		 	// ferme la connexion smtp et désalloue la mémoire...
			    		unset($mail); 
			    	$this->redirect($session,'accueil',array('errorMail'=>$errorMail,'okMail'=>$okMail));
			    	
				} // if($post['domaine']=='achats')
			
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

						// creation du FRS
						require_once('Model/ApiM3Model.php');
						$apiModel = new ApiM3Model();
						
						// return 
						$resultM3 = $apiModel->creerfrsM3($this->post,$numeroString);
						$resultAdrM3 = $apiModel->creerAdresseM3($this->post,$numeroString);
								

						if (isset($resultM3['succes']) && isset($resultAdrM3['succes']) )
						{
							$domaineSuivant = 'Movex';

							// envoi mail au demandeur
							require('Module/envoiMail.php') ;
							$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion

							$adresseMail = $post['nomDemandeur']  ;
							$sujet = 'Workflow Fournisseur : Fournisseur M3 créé sous le num : '.$numeroString;

							$mail->AddAddress($adresseMail);
						    $mail->Subject=$sujet; 
							 
							//Contenu du  message en HTML : table  
						 	ob_start();
							
							?>
							<!-- envoi du mail en table pour générer du HTML -->
							<table style="font-family:sans-serif" border="1" >
								<tr>
									<th colspan="6"> Fournisseur M3 créé sous le num : '<?php echo $numeroString; ?></th>
								</tr>
								<tr>
									<th>Entite Demandeur</th>
									<th>Nom Demandeur</th>
									<th>Date creation</th>
									<th>Nom Fournisseur</th>
									<th>Code Fournisseur M3</th>
									<th>Raison Demande</th>
								</tr>
								<tr>
									<td><?php echo $this->post['entiteDemandeur']; ?></td>
									<td><?php echo $this->post['nomDemandeur']; ?></td>
									<td><?php echo $this->post['dateJour']; ?></td>
									<td><?php echo $this->post['rsCommande']; ?></td>
									<td><?php echo $numeroString; ?></td>
									<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
								</tr>
							</table>
									 
							<?php
							// concerne le HTML du contenu du mail 
							$mail->Body = ob_get_contents();

							ob_end_clean();  
				 

						    // affiche une erreur => pas toujours explicite
						    if(!$mail->Send()) {
						        $_REQUEST['error'] = $mail->ErrorInfo; 
						    }
						    $mail->SmtpClose();
						    // ferme la connexion smtp et désalloue la mémoire...
						    unset($mail); 

							// affiche accueil , liste des frs à valider pour M3
							$this->redirect($session,'accueil',$resultM3,$post);

						} // elseif (isset($resultM3['succes']) && isset($resultAdrM3['succes']) )

						elseif (!isset($resultM3['succes']) || !isset($resultAdrM3['succes']) ) 
						{
							// var_dump($resultM3)	; 	var_dump($resultAdrM3)	; 
							$this->redirect('', 'update',array('ID'=>$get['ID'],'transa'=>$resultM3['transa']));
						}

					} //if ($testPourDomaine = 'Movex') 

				} 	// elseif ($post['domaine']=='compta' ) 

			} 	// if(isset($post['Valider']))

			elseif (isset($post['Attente'])) // si // si on clique sur le bouton valider Attente 
			{
				$domaineSuivant = $post['domaine'] ;
				$FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session);
				// envoi mail au demandeur
				require('Module/envoiMail.php') ;
				$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion
				//$adresseMail = 'compta_wkf_frs@comeca-group.com'  ;
				$adresseMail = 'achats_wkf_frs@comeca-group.com'  ;
				$sujet = 'Workflow Fournisseur  en attente : '.$post['rsCommande'];
						
				$mail->Subject = $sujet;
				$mail->AddAddress($adresseMail);
				//Contenu du  message en HTML : table  
			 	ob_start();
			 	
				?>
				<!-- envoi du mail en table pour générer du HTML -->
		 		<table style="font-family:sans-serif" border="1" >
		 			<tr>
						<th colspan="5">Vous avez mis une fiche Fournisseur en attente de validation </th>
						 
					</tr>
					<tr>
						<th>Entite Demandeur</th>
						<th>Nom Demandeur</th>
						<th>Date creation</th>
						<th>Nom Fournisseur</th>
						<th>Raison Demande</th>
					</tr>
					<tr>
						<td><?php echo $this->post['entiteDemandeur']; ?></td>
						<td><?php echo $this->post['nomDemandeur']; ?></td>
						<td><?php echo $this->post['dateJour']; ?></td>
						<td><?php echo $this->post['rsCommande']; ?></td>
						<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
					</tr>
				</table>
					 
				<?php
				// concerne le HTML du contenu du mail 
				$mail->Body = ob_get_contents();
				ob_end_clean();

				$envoiMail = $mail->Send();
				 				
				if(!$envoiMail) 
				{
	                echo 'Le Message n est pas envoye';
	                echo 'Mailer Error: ' . $mail->ErrorInfo;
	            } else {
	                   echo 'le Message a ete envoye';
	            }                              

				$mail->SmtpClose();
			   	// ferme la connexion smtp et désalloue la mémoire...
			    unset($mail); 

				$this->redirect($session,'accueil');

			} // elseif (isset($post['Attente']))

			$result = $FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session);

		 
		} // if $this->post

		require('View/Index/update.php') ; 	
		 
	} // fin fonction update

	
	
}

 
?>




 

