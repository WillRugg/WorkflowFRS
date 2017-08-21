 <?php

require('Controller.php') ;

class ConnecteController extends Controller {


 	// action=index => affiche le formulaire de connexion et permettre la connexion
	public function indexAction () {
		$app_title="Connexion " ;
		$app_body="Body_Connecte" ;
		$app_desc="Comeca" ;
		// si l admin est connecté
		$auth = $this->authModule->estConnecte();
		// si connecté => redirection vers indexAction de CategorieController 
	 
		if($auth){

		
		// si le post est renseigné
		} elseif ($this->post) {
			// si pas connecté => créer la connexion : connecter($this->post)
			require_once('Model/SqlModel.php');
			$userModel = new SqlModel();
			// retourne le resultat de la connection
			 
			$boolConf = $userModel->connecter($this->post) ;
			// si connecté  / on passe l'identifiant
		//	var_dump($boolConf['idConnecte']);
			//var_dump($boolConf) ;
			if ($boolConf['idConnecte']) {
				$this->authModule->seConnecte($this->post["ident"]); 
				if($this->post["ident"]=='achats'){
					 $_SESSION['pass']  = $this->post["password"];
					 $_SESSION['ident'] = $this->post["ident"];
					 
									
				$this->redirect('achats','accueil');
				}
				elseif ($this->post["ident"]=='compta') {
				
				 $_SESSION['pass'] = $this->post["password"];
				 $_SESSION['ident'] = $this->post["ident"];
				 $this->redirect('compta','accueil');
				}
				else
				{
				$_SESSION['pass'] = $this->post["password"];
				$_SESSION['ident'] = $this->post["ident"];
				$this->redirect('admin','accueil');
				}
			}
		}
		require('View/Connecte/index.php') ;
	}
	
public function seDeconnecteAction() {
		if(!$this->authModule->estConnecte()) {
			  $this->redirect("","creeFournisseurs");
			  $this->authModule->seDeconnecter();
		}
		$this->authModule->seDeconnecter();
		$this->redirect("","creeFournisseurs");
	}

}

?>