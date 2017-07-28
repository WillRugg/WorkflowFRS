<?php
// -----------------------------------------------------------------------------------------------//
// ce controller a pour but de générer lui même l'url : array(param) , controllerName, actionName //
// protected function link : peut être appelé par ses enfants                                     //
// le rooting se fait dans index.php , l' url va toujours commencer par => $url=index.php         //
// si $controller est null ou égal à index , ce sera par defaut ne pas l ajouter dans url         //
// si $action est null ou égal à index , ce sera par defaut ne pas l ajouter dans url             //
// gerér le ? une seule fois                                                                      //
// gérer le & à chaque ajout d un param d'url et sa valeur et s'il y a eu un ?                    //
// exp index.php?page=2  index.php?controller=user&action=modifie&id=5                            //
// -----------------------------------------------------------------------------------------------//

class Controller {
	// attributs vus par la class et ses enfants
	protected $get;
	protected $post;
	protected $files;
	protected $authModule;
	public $session;
	
 

	// constructeur spécifique
	public function __construct($get=null,$post=null,$files=null ) {
		$this->get = $get;
		$this->post = $post;
		$this->files = $files;
		// appel du module de connexion
		require_once('Module/ConnecteModule.php');
		$this->authModule = new ConnecteModule();

	}

	// gestion des erreurs
	public function afficheErreurs($msgErreur) {
		$html = "";
		 
		if (!empty($msgErreur)) {
			$html .= '<ul>';
			// je gère une seule ligne de message 
				$html .= '<li class ="erreur">'.$msgErreur.'</li>';
			 
			$html .= '</ul>';
		}
	return $html ;
	}

	// création de l'url  : "index.php?controller=nameController&action=nameAction&nameParam=valueParam"
	protected function link($controller=null,$action=null,$params=array()) {
		// générer la cible $target de l url : on ajoute le ? en fin
		$target='index.php?';  

		// si il y a un nom de controller : on ajoute le & en fin
		if (!empty($controller)) {
			$target .= 'controller='.$controller.'&' ; 
		}
		
		// si il y a un nom d action : on ajoute le & en fin
		if (!empty($action)) {
			$target .= 'action='.$action.'&';
		}

		// si il n'y a un ou plusieurs nom de paramètres ou si ce n'est pas un array => on cree array()vide :
		if (empty($params) || !is_array($params)) {
			$params = array();
		}
		// on parcourt l'array si vide => pas de foreach
		foreach ($params as $key => $value) {
			//  on ajoute le & en fin même 
			$target .= $key.'='.$value.'&';
		}

		// le dernier caractère sera un ? ou un & => on le supprime
		if (in_array($target[strlen($target)-1], array('?','&'))) {
			$target = substr($target, 0, strlen($target)-1);
		}
		 return $target;
	}

	// redirection 
	protected function redirect($controller=null,$action=null,$params=array()) {
		header('Location:'.$this->link($controller,$action,$params));
		exit();
	}

	// permet de r�cup�rer la version
	public function getVersion() {
		return ('Workflow Fournisseur V-1');
	}
	
	// permet de r�cup�rer la biblio
	public function getBiblio() {
		return ('M3EDBTEST');
		//return ('COMEDBPROD');
	}

}
 
?>