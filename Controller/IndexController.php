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
		 
		if($this->post) {
			
			$post = $this->post;
			$files =$this->files;			
			
			$FicheFournisseurModel = new SqlModel(); 
			$result = $FicheFournisseurModel->createFiche($post,$files);
		}

		require('View/Index/creation.php') ; 
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
		
		$UnFournisseur = $SqlModel->getInfos($this->get['id']);


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


			if($this->get) {
				$get = $this->get;	
			}
		 	
			if($this->post) {
				$post = $this->post;
				$files =$this->files;	
							
				
				$FicheFournisseurModel = new SqlModel(); 
				$result = $FicheFournisseurModel->updateFiche($post,$files,$get);

				 if (is_array($result)) {
					$erreurs = $result;
				} else {
					 
				 
					$this->redirect($session,'accueil',null);
						 
				 
				}  
		 
		}

		require('View/Index/update.php') ; 
			 
	}
	
	
	
	
	public function updateAjaxAction () {
 
	require_once('Model/SqlModel.php');

	require_once('Model/Db2Model.php');

	$frsModel = new SqlModel;

		$data = array('id'=> $this->get['id']);
		// var_dump($data);
		// passer un array idem le formulaire 
		$result = $frsModel->update($data);
		// var_dump($result);
		if($result){
			$json = array('result'=>true);
		}else{
			$json = array('result'=>false);
		}
		// retourne en JS 
	echo json_encode($json);			 
	}
	
	
	
}

 
?>




 

