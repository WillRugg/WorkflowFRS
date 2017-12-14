 <?php
// constructeur de la classe pour securiser
            

require('Controller.php') ;

class AchatsController extends Controller {

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
		$ListeAttente = $AttenteModel->AfficheEnAttente();
 
		require('View/Connecte/accueil.php') ;
	}

}

?>