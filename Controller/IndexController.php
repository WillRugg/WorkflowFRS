<?php
require_once('Controller/Controller.php') ;

class IndexController extends Controller {


	public function indexAction() {
		$app_title="FournisseurM3" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		
	
	$this->redirect('','choixFournisseur');

	}

	public function listesAction() {
		$app_title="FournisseurM3" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		
		require('Model/Db2Model.php');
		

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

			// lister Id Bancaire
			$idBanqModel = new Db2Model($this->getBiblio()); 
			$idBanq = $idBanqModel->listerBKIN();

			return(array ('entite'=>$entite,
						  'groupeAppartenance'=>$groupeAppartenance,
						  'groupeFournisseur'=>$groupeFournisseur,
						  'condition'=>$condition,
						  'modeReglement'=>$modeReglement,
						  'conditionReglement'=>$conditionReglement,
						  'devise'=>$devise,
						  'pays'=>$pays,
						  'idBanq'=>$idBanq,
						  'today'=>$today
						  ));
	 
	}

	public function enCoursDeDeveloppementAction() {
		$app_title="Choix Fournisseurs " ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;


		require('View/Index/enDev.php') ; 

	}

	public function choixFournisseurAction() {
		$app_title="Choix Fournisseurs " ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;



		require('View/Index/choix.php') ; 

	}

	

	public function rechercheFrsAction() {
		$app_title="Créer Fournisseurs de Frais Géneraux" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;

	    	
		require('View/Index/rechercheFrs.php') ; 

	}

	

	public function creeFournisseurAction() {
		$app_title="Créer Fournisseurs " ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		
		$path= $_SERVER['DOCUMENT_ROOT'].'/WorkflowFRS/Ressources/files/';
		// $path= 'vairao/WorkflowFRS/Ressources/files/';	
		// récupérer les listes des données M3
		$array = array();
		$array = $this->listesAction();

	 	// gestion des erreurs
		$erreurs = array();
	 	
		$session =null;
		$etapeSuivante=null;
		$timeUnique=null;
		$time=null;
			
		if($this->post) {
		 
			$post = $this->post;
			$files =$this->files;	
			$get=$this->get;	

						
			if (isset($post['Valider'])) {
				$session ="user";
			 	$etapeSuivante='achats';
			 	$timeUnique='NA';
			 	require('Model/SqlModel.php');
			 	$FicheFournisseurModel = new SqlModel(); 
			 	$result = array();
				$result = $FicheFournisseurModel->createFiche($post,$get,$files,$etapeSuivante,$timeUnique,$session);
 				 
				// envoi mail par phpmailer
				if ($result['result']) {
					//var_dump('ligne 151 : ' ,$result['result']);
					// envoi mail au demandeur
					require('Module/envoiMail.php') ;
					$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion
										// $chemin = 'c:/xampp/htdocs/WorkflowFRS/Ressources/files/';
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
							<th colspan="8">Vous avez une fiche Fournisseur à valider</th>
							 
						</tr>
						<tr>
							<th>Entite Demandeur</th>
							<th>Nom Demandeur</th>
							<th>Date creation</th>
							<th>Nom Fournisseur</th>
							<th>Raison Demande</th>
							<th>Fichier Rib</th>
							<th>Fichier Kbis</th>
							<th>Fichier Bilan </th>
						</tr>
						<tr>
							<td><?php echo $this->post['entiteDemandeur']; ?></td>
							<td><?php echo $this->post['nomDemandeur']; ?></td>
							<td><?php echo $this->post['dateJour']; ?></td>
							<td><?php echo $this->post['rsCommande']; ?></td>
							<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
							<td>
								<?php
								if (isset($result['ribName']) && !empty($result['ribName']) ) {
								?>
									<a href="<?php echo($path.$result['ribName']); ?>" ><?php echo ($result['ribName']); ?></a>
								<?php
								}
								?>
							</td>
							<td>
								<?php
								if (isset($result['bilanName']) && !empty($result['bilanName']) ) { 
								?>
									<a href="<?php echo($path.$result['bilanName']); ?>"><?php echo ($result['bilanName']); ?>
									</a> 
								<?php
								}
								?>
							</td>
							<td>
								<?php
								if (isset($result['kbisName']) && !empty($result['kbisName']) ) {
								?>		
									<a href="<?php echo($path.$result['kbisName']); ?>" ><?php echo ($result['kbisName']); ?></a>
								<?php
								}
								?>
							</td>
						</tr>
					</table>
						 
					<?php
					// concerne le HTML du contenu du mail 
					$mail->Body = ob_get_contents();
					ob_end_clean();

					$envoiMail = $mail->Send();
					 				
					if(!$envoiMail) {
                        //   echo 'Le Message n est pas envoye';
                        //   echo 'Mailer Error: ' . $mail->ErrorInfo;
                        $returnMail = 'Le Message n est pas envoye Le Message n est pas envoye'.$mail->ErrorInfo;
                       } else {
                        //   echo 'le Message a ete envoye a ' .$adresseMail;
                        $returnMail = 'le Message a ete envoye a ' .$adresseMail;
                    }                              

			 	 	$mail->SmtpClose();
		   		 	// ferme la connexion smtp et désalloue la mémoire...
		    		unset($mail); 
		    		// retour ecran choix => voir commet gérér le msg
		    		//$this->redirect('','choixFournisseur',array('envoiMail'=>$returnMail));

				} 	// if ($result) 

 
			 } //if (isset($post['Valider'])) 
			 elseif (isset($post['EnvoiFour'])) 
			 {
			 	$session = "user";
			 	$etapeSuivante='fournisseur';
			 	$time=time();
			 	$timeUnique=md5($time);
			 	$FicheFournisseurModel = new SqlModel(); 
				$result = $FicheFournisseurModel->createFiche($post,$files,$etapeSuivante,$timeUnique,$session);
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

		$SqlModel = new SqlModel();
		$UnFournisseur = $SqlModel->getInfosForFournisseur($this->get['idEnvoi'],$this->get['ID']);

		$array = array();
		$array = $this->listesAction();

		if($this->get) 
		{
			$get = $this->get;	
		}
		 	
	 	if($this->post) 
	 	{
			
			$post = $this->post;
			$files =$this->files;

			$FicheFournisseurModel = new SqlModel(); 

			// si on valide
			if(isset($post['Valider']))
			{
				$domaineSuivant = 'achats';
			}
			$frsM3 = 0;
			$result = $FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session,$fsM3);
			
			$this->redirect('','remerciements');

			// Lance lors de Valider la création dans Movex 
       		if (is_array($result)) 
       		{
				$erreurs = $result;
				
			} 
			else 
			{
				$this->redirect($session,'accueil',$resultM3);
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
	
		$SqlModel = new SqlModel();
		$UnFournisseur = $SqlModel->getInfos($this->get['ID']);

		$array = array();
		$array = $this->listesAction();
		 
		if($this->get) 
		{
			$get = $this->get;	
		}
		 
	 	if($this->post) 
	 	{
	
			$post = $this->post;
			$files =$this->files;

			$FicheFournisseurModel = new SqlModel(); 

			// test du niveau
		 	$domaineSuivant = null;
			
			if(isset($post['Valider'])) 	// si on clique sur le bouton valider
			{	
				// --------------//
				// si PAS ADMIN : achats ou compta
				// --------------//
				if($post['domaine'] !='admin')	
				{	
					if($post['domaine']=='achats')	
					{
						$domaineSuivant = 'compta';
						$adresseMail = 'compta_wkf_frs@comeca-group.com'  ;		
					} else {
							$domaineSuivant = 'admin';
							//$adresseMail = 'admin_wkf_frs@comeca-group.com'  ;
							$adresseMail = 'd.lamberti@comeca-group.com'  ;
					}
					$frsM3 = 0;
					$FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session,$frsM3);
					$UnFournisseur = $SqlModel->getInfos($this->get['ID']); 
				 	// envoi mail au servu=ice suivant
					require('Module/envoiMail.php') ;
					$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion
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
							<th>Fichier Rib</th>
							<th>Fichier Kbis</th>
							<th>Fichier Bilan </th>
						</tr>
						<tr>
							<td><?php echo $this->post['entiteDemandeur']; ?></td>
							<td><?php echo $this->post['nomDemandeur']; ?></td>
							<td><?php echo $this->post['dateJour']; ?></td>
							<td><?php echo $this->post['rsCommande']; ?></td>
							<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
							<td>
								<?php
								if (isset($UnFournisseur['fileRib']) && !empty($UnFournisseur['fileRib']) ) {
								?>
									<a href="<?php echo($path.$UnFournisseur['fileRib']); ?>" ><?php echo ($UnFournisseur['fileRib']); ?></a>
								<?php
								}
								?>
							</td>
							<td>
								<?php
								if (isset($UnFournisseur['bilan']) && !empty($UnFournisseur['bilan']) ) { 
								?>
									<a href="<?php echo($path.$UnFournisseur['bilan']); ?>"><?php echo ($UnFournisseur['bilan']); ?>
									</a> 
								<?php
								}
								?>
							</td>
							<td>
								<?php
								if (isset($UnFournisseur['kbis']) && !empty($UnFournisseur['kbis']) ) {
								?>		
									<a href="<?php echo($path.$UnFournisseur['kbis']); ?>" ><?php echo ($UnFournisseur['kbis']); ?></a>
								<?php
								}
								?>
							</td>
						</tr>
					</table>
					<?php
					// concerne le HTML du contenu du mail 
					$mail->Body = ob_get_contents();
					ob_end_clean();
					$envoiMail = $mail->Send();	 				
					if(!$envoiMail) 
					{
                        $errorMail = 'Le Message n est pas envoye - Mailer Error: ' . $mail->ErrorInfo;       
                    } else {
                        $okMail= 'le Message a ete envoye' .$adresseMail;
                    }                              
			 	 	$mail->SmtpClose();
		   		 	// ferme la connexion smtp et désalloue la mémoire...
		    		unset($mail); 
		    		$this->redirect($session,'accueil',array('errorMail'=>$errorMail,'okMail'=>$okMail));
				} // if($post['domaine']!='admin')
				
				// --------------//
				// si  ADMIN     //
				// --------------//
				elseif ($post['domaine'] =='admin')
				{
					$domaineSuivant = 'admin';
					$testPourDomaine = 'Movex';	
					$adresseMailAdmin = 'd.lamberti@comeca-group.com'  ;		

					// si dmaine de la fiche = admin
					if ($testPourDomaine == 'Movex' && $UnFournisseur['domaineValidation'] == 'admin')
					{
						require_once('Model/Db2Model.php');
						require_once('Model/ApiM3Model.php');
						$db2Model = new Db2Model();		
						$apiModel = new ApiM3Model();
				  
						// rechercher le dernier Numéro et + 1 			 
						$derNumero = $db2Model->rechercheDernierFrsM3();
						$numero= intval($derNumero[0])+1;
				  		$numeroString = '0'.$numero;	
					 	$resultM3 = $apiModel->creerfrsM3($this->post,$this->get,$numeroString);
						$resultAdrM3 = $apiModel->creerAdresseM3($this->post,$numeroString);
					    $resultRibM3 = $db2Model->creerCompteBancaireM3($this->post,$numeroString);
						
						//var_dump(' $resultAdrM3 : ', $resultAdrM3 );

						
						if (isset($resultM3['succes']) && isset($resultAdrM3['succes'])  && isset($resultRibM3['succes']) )
						{
							$domaineSuivant = 'Movex';
							// pour user = MOVEX
							$FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session,$numeroString);
							$UnFournisseur = $SqlModel->getInfos($this->get['ID']);
							// envoi mail au demandeur
							require('Module/envoiMail.php') ;
							$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion
							$adresseMail = $post['nomDemandeur']  ;
							$sujet = 'Workflow Fournisseur : Fournisseur M3 créé sous le num : '.$numeroString;
							$mail->AddAddress($adresseMail);
							$mail->AddAddress($adresseMailAdmin);
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
									<th>Fichier Rib</th>
									<th>Fichier Kbis</th>
									<th>Fichier Bilan </th>
								</tr>
								<tr>
									<td><?php echo $this->post['entiteDemandeur']; ?></td>
									<td><?php echo $this->post['nomDemandeur']; ?></td>
									<td><?php echo $this->post['dateJour']; ?></td>
									<td><?php echo $this->post['rsCommande']; ?></td>
									<td><?php echo $numeroString; ?></td>
									<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
									<td>
										<?php
										if (isset($UnFournisseur['fileRib']) && !empty($UnFournisseur['fileRib']) ) {
										?>
											<a href="<?php echo($path.$UnFournisseur['fileRib']); ?>" ><?php echo ($UnFournisseur['fileRib']); ?></a>
										<?php
										}
										?>
									</td>
									<td>
										<?php
										if (isset($UnFournisseur['bilan']) && !empty($UnFournisseur['bilan']) ) { 
										?>
											<a href="<?php echo($path.$UnFournisseur['bilan']); ?>"><?php echo ($UnFournisseur['bilan']); ?>
											</a> 
										<?php
										}
										?>
									</td>
									<td>
										<?php
										if (isset($UnFournisseur['kbis']) && !empty($UnFournisseur['kbis']) ) {
										?>		
											<a href="<?php echo($path.$UnFournisseur['kbisName']); ?>" ><?php echo ($UnFournisseur['kbis']); ?></a>
										<?php
										}
										?>
									</td>
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

						elseif (!isset($resultM3['succes']) || !isset($resultAdrM3['succes']) || !isset($resultRibM3['succes'])) 
						//elseif (!isset($resultM3['succes']) || !isset($resultAdrM3['succes']) || !isset($resultRibM3['succes'])) 
						{
							 
						$this->redirect('', 'update',array(	'ID'=>$get['ID'],
														   	'genre'=>$get['genre'],
														   	'typeDde'=>$get['typeDde'],
														   	'transa'=>$resultM3['transa'],
															'transaAdr'=>$resultAdrM3['transa'],
															'transaRib'=>$resultRibM3['transa']));
															//'transaAdr'=>$resultAdrM3['transa']));
						}			

					} //if ($testPourDomaine = 'Movex') 

				} 	// elseif ($post['domaine']=='admin' ) 

			} 	// if(isset($post['Valider']))

			elseif (isset($post['Attente']))  // si on clique sur le bouton valider Attente 
			{
				$domaineSuivant = $post['domaine'] ;
				$frsM3 = 0;
				$FicheFournisseurModel->updateFiche($post,$files,$get,$domaineSuivant,$session,$frsM3);
				$UnFournisseur = $SqlModel->getInfos($this->get['ID']);
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
						<th>Fichier Rib</th>
						<th>Fichier Kbis</th>
						<th>Fichier Bilan </th>
					</tr>
					<tr>
						<td><?php echo $this->post['entiteDemandeur']; ?></td>
						<td><?php echo $this->post['nomDemandeur']; ?></td>
						<td><?php echo $this->post['dateJour']; ?></td>
						<td><?php echo $this->post['rsCommande']; ?></td>
						<td><?php echo nl2br($this->post['raisonDemande']); ?></td>
						<td>
							<?php
							if (isset($UnFournisseur['fileRib']) && !empty($UnFournisseur['fileRib']) ) {
							?>
								<a href="<?php echo($path.$UnFournisseur['fileRib']); ?>" ><?php echo ($UnFournisseur['fileRib']); ?></a>
							<?php
							}
							?>
						</td>
						<td>
							<?php
							if (isset($UnFournisseur['bilan']) && !empty($UnFournisseur['bilan']) ) { 
							?>
								<a href="<?php echo($path.$UnFournisseur['bilan']); ?>"><?php echo ($UnFournisseur['bilan']); ?>
								</a> 
							<?php
							}
							?>
						</td>
						<td>
							<?php
							if (isset($UnFournisseur['kbis']) && !empty($UnFournisseur['kbis']) ) {
							?>		
								<a href="<?php echo($path.$UnFournisseur['kbis']); ?>" ><?php echo ($UnFournisseur['kbis']); ?></a>
							<?php
							}
							?>
						</td>
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
	                echo 'le Message a ete envoye a : ' .$adresseMail;
	            }                              

				$mail->SmtpClose();
			   	// ferme la connexion smtp et désalloue la mémoire...
			    unset($mail); 

			    // si une valeur est =/= de celle demandée par l'utilisateur alors mail à l utilisateur
			   	$frsInitialModel = new SqlModel();
			   	$frsInitial=$frsInitialModel->getDemandeOrigine($this->get['ID']);

			   	$ecart = $this->isUpdate($frsInitial,$this->post);

			   	 
			   	// si le tableau n'est pas vide => des modifs ont été faites
			   	if (is_array($ecart) ){
			   		// envoi mail au demandeur
					//require('Module/envoiMail.php') ;
					$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion
					 
					$adresseMail =  $this->post['nomDemandeur'];  
					$sujet = 'Workflow Fournisseur : '.$post['rsCommande'].' concerne les modifications apportees';
						
					$mail->Subject = $sujet;
					$mail->AddAddress($adresseMail);
					//Contenu du  message en HTML : table  
				 	ob_start();

				   ?>
					

					<!--envoi du mail en table pour générer du HTML -->
			 		<table style="font-family:sans-serif" border="3" >
			 			<tr>
							<th colspan="3">Vos donnees ci-dessous ont ete modifiees </th>
						</tr>
						
						<tr>
							<th>Intitule</th>
							<th>Votre saisie </th>
							<th>Modification apportee</th>
						</tr>
						<?php
						foreach ($ecart  as $unEcart) {
						?>
							<tr>
								<td> <?php echo $unEcart['valeur'] ?></td>
								<td> <?php echo $unEcart['fichier'] ?></td>
								<td> <?php echo $unEcart['post']  ?></td>
							</tr>

						<?php
							}
						?>
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

				} // if (is_array($ecart) 

			  	//$this->redirect($session,'accueil');

			} // elseif (isset($post['Attente']))
		

		} // if $this->post

		require('View/Index/update.php') ; 	
		 
	} // fin fonction update

 
	public function setSunoM3Action()
	{
		$session=null;
		$app_title="UpdateFrsM3 " ;
		$app_body="Body_UpdateFrsM3" ;
		$app_desc="Comeca" ;	

		if($this->post) {
		 
			$post = $this->post;
			$files =$this->files;	
			$get=$this->get;	

			if (isset($post['Valider'])) {
				$session ="user";
			 	$etapeSuivante='achats';

			$this->redirect('','updateM3',array('genre'=>'M','suno'=>$post['sunoM3'],
												'etapeSuivante'=>$etapeSuivante ));

			}

		}

		require('View/Index/setSuno.php') ;

	}

	public function updateM3Action()
	
	{
		$app_title="UpdateFrsM3 " ;
		$app_body="Body_UpdateFrsM3" ;
		$app_desc="Comeca" ;	

		require_once('Model/Db2Model.php');
		$db2Model = new Db2Model();		
		$apiModel = new ApiM3Model();

		// Récup infos M3
		$UnFournisseur = $db2Model->getInfosM3($this->get['suno']);
		$typeAdr = '01';
		$adressesCommande = $db2Model->getAdressesM3($this->get['suno'], $typeAdr );
		$typeAdr = '10';
		$adressePayeur =  $db2Model->getAdressesM3($this->get['suno'],$typeAdr);

		// récupérer les listes des données M3
		$array = array();
		$array = $this->listesAction();

		if($this->post) {
		 
			$post = $this->post;
			$files =$this->files;	
			$get=$this->get;	

			if (isset($post['Valider'])) {
				$session ="user";
			 	$etapeSuivante='achats';
			 	$timeUnique='NA';


				$this->redirect('','choixFournisseur',array('envoiMail'=>$returnMail));


			}



		}

		require('View/Index/update.php') ;

	}



 	// NON Utilisé !!!!

	public function creeFrsFraisGenerauxAction() {
		$app_title="Créer Fournisseurs de Frais Géneraux" ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;

		require('Model/SqlModel.php');

		$array = array();
		$array = $this->listesAction();
		
		// gestion des erreurs
		$erreurs = array();
		 	
		$session =null;
		$etapeSuivante=null;
		$timeUnique=null;
		$time=null;
			

		if($this->post) {
			
			$post = $this->post;
			$files =$this->files;			
			
			if (isset($post['Valider'])) {
				$session ="user";
			 	$etapeSuivante='achats';
			 	$timeUnique='NA';
			 	$FicheFournisseurModel = new SqlModel(); 
				$result = $FicheFournisseurModel->createFicheFraisGen($post,$files,$etapeSuivante,$timeUnique,$session);
 				 
				// envoi mail par phpmailer
				if ($result) {
					// envoi mail au demandeur
					require('Module/envoiMail.php') ;
					$mail = envoiMail() ;  //appel la fonction envoiMail de module pour connexion

					//$adresseMail = 'compta_wkf_frs@comeca-group.com'  ;
					$adresseMail = 'achats_wkf_frs@comeca-group.com'  ;
					$sujet = 'Workflow Fournisseur de Frais Généraux à valider : '.$post['rsCommande'];
					//Sujet
					$mail->Subject = $sujet;
					$mail->AddAddress($adresseMail);
					//Contenu du  message en HTML : table  
				 	ob_start();
				 	
					?>
					<!-- envoi du mail en table pour générer du HTML -->
			 		<table style="font-family:sans-serif" border="1" >
			 			<tr>
							<th colspan="5">Vous avez une fiche Fournisseur de Frais Généraux à valider</th>
							 
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
                           echo 'le Message a ete envoye a ' .$adresseMail;
                    }                              

			 	 	$mail->SmtpClose();
		   		 	// ferme la connexion smtp et désalloue la mémoire...
		    		unset($mail); 

				} 	// if ($result) 
 
			 } // if (isset($post['Valider']))

		} // if (&post)
  	
		require('View/Index/creationFrsFraisGen.php') ; 

	}

	
	
}

 
?>




 

