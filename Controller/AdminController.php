 <?php

require('Controller.php') ;

class AdminController extends Controller {

 	// action=index => affiche le formulaire de connexion et permettre la connexion
	public function accueilAction () {
		$session = $_SESSION['ident'];
		$app_title="Connexion " ;
		$app_body="Body_Connecte" ;
		$app_desc="Comeca" ;
		// si l admin est connecté
		$auth = $this->authModule->estConnecte();
		// si connecté => redirection vers indexAction de CategorieController 
		require_once('Model/SqlModel.php');
		$AttenteModel = new SqlModel();
				 

		$ListeAttente = $AttenteModel->AfficheAll();

		require('View/Connecte/accueil.php') ;
	}
	

}

?>