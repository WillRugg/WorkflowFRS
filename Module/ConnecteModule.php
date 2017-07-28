<?php
// Class qui va créer un objet authentification 
// et sera instancié dans Controller pour être accessible de tous les controlleurs
// manipule et renvoie la valeur du booleen dans $_session[app-auth]
class ConnecteModule {
	// booleen : false ou true
	private $idConnecte;
	// user connecté
	private $userConnecte;
	private $environnement;

	// fonction qui s'exécute automatiquement
	// on peut y ajouter du code perso
	public function __construct() {
		// si l'authentification en Session n'est pas défini alors on met à null le booleen
		if(!isset($_SESSION['appel_auth'])) {
			$this->idConnecte = null;
			$this->userConnecte = null;
			$this->environnement = 2;
		} else {
		// si l'authentification en Session est défini alors on récupère 
		// de la session le booleen et le userConnecte
			$this->idConnecte = $_SESSION['appel_auth']['idConnecte'];
			$this->userConnecte = $_SESSION['appel_auth']['userConnecte'] ;
			$this->environnement = $_SESSION['appel_auth']['environnement'] ;
		}
		//	var_dump(($_SESSION['appel_auth']));
	}
	// fonction qui s'exécute automatiquement
	// on peut y ajouter du code perso
	// on remet en session le booleen 
	public function __destruct() {
		$_SESSION['appel_auth'] = array('idConnecte' => $this->idConnecte,
			                            'userConnecte' => $this->userConnecte,
			                            'environnement' => $this->environnement);
	}

	// on enregistre le booleen fournis par le controller
	public function seConnecte($userConnecte) {
		$this->idConnecte = true;
		$this->userConnecte = $userConnecte;
		$this->environnement = $environnement;
	}


	// verifier que la $_SESSION["auth"]= booleen est renseignée
	public function estConnecte() {
		if (!empty($this->idConnecte)) {
			return array('idConnecte'=>$this->idConnecte,
						  'userConnecte'=>$this->userConnecte,
						  'environnement'=>$this->environnement
						  ) ;
		}
	}

	// on enregistre le booleen à null pour le controlleur
	public function seDeconnecter() {
		$this->idConnecte = null;
		$this->userConnecte = null;
		$this->environnement = null;
		// $_SESSION['pass'] = null;
		// $_SESSION['ident'] = null; 
		session_start();
		session_unset();
		session_destroy();
	}

	

}

?>