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
		return ('Workflow Fournisseur V-3');
	}
	
	
	// permet de r�cup�rer la biblio
	public function getBiblio() {
		if (substr($_SERVER['DOCUMENT_ROOT'], 0, 2) == 'C:' )  {
			return ('m3edbtest');
		} else {
			return ('M3EDBPROD');
		}

	}


	// v�rifie si une fiche fournisseur a �t� modifi�e 
	protected function isUpdate($fournisseur,$post) {

		// g�n�rer la table des modifictatons 
		$valeurs = array();

		if ($fournisseur['siret'] !=  $post['siret']) {
			$valeurs['siret']['valeur']  = 'Siret' ;
			$valeurs['siret']['fichier']  = $fournisseur['siret'] ;
			$valeurs['siret']['post'] = $post['siret'] ;
		}	

		if ($fournisseur['complementSiret'] !=  $post['complement']) {
			$valeurs['complementSiret']['valeur']  = 'Complement Siret' ;
			$valeurs['complementSiret']['fichier']  = $fournisseur['complementSiret'] ;
			$valeurs['complementSiret']['post'] = $post['complement'] ;
		}	

		if ($fournisseur['tva'] !=  $post['tvaIntra']) {
			$valeurs['tva']['valeur']  = 'Tva' ;
			$valeurs['tva']['fichier']  = $fournisseur['tva'] ;
			$valeurs['tva']['post'] = $post['tvaIntra'] ;
		}	

		if ($fournisseur['raisonSociale'] !=  $post['rsCommande']) {
			$valeurs['raisonSociale']['valeur']  = 'Raison Sociale' ;
			$valeurs['raisonSociale']['fichier']  = $fournisseur['raisonSociale'] ;
			$valeurs['raisonSociale']['post'] = $post['rsCommande'] ;
		}	


		if ($fournisseur['groupeAppartenance'] !=  $post['groupeAppartenance']) {
			$valeurs['groupeAppartenance']['valeur']  =  'Groupe Appartenance' ;
			$valeurs['groupeAppartenance']['fichier']  = $fournisseur['groupeAppartenance'] ;
			$valeurs['groupeAppartenance']['post'] = $post['groupeAppartenance'] ;
		}

		if ($fournisseur['natureFournisseur'] !=  $post['natureFournisseur']) {
			$valeurs['natureFournisseur']['valeur']  =  'Nature Fournisseur' ;
			$valeurs['natureFournisseur']['fichier']  = $fournisseur['natureFournisseur'] ;
			$valeurs['natureFournisseur']['post'] = $post['natureFournisseur'] ;
		}

		if ($fournisseur['groupeFournisseur'] !=  $post['groupeFournisseur']) {
			$valeurs['groupeFournisseur']['valeur']  =  'Groupe Fournisseur';
			$valeurs['groupeFournisseur']['fichier']  = $fournisseur['groupeFournisseur'] ;
			$valeurs['groupeFournisseur']['post'] = $post['groupeFournisseur'] ;
		}
		if (isset($post['incotermGroupe'])) {
			if ($fournisseur['incoterm'] !=  $post['incotermGroupe']) {
				$valeurs['incoterm']['valeur']  = 'Incoterm' ;
				$valeurs['incoterm']['fichier']  = $fournisseur['incoterm'] ;
				$valeurs['incoterm']['post'] = $post['incotermGroupe'] ;
			}
		}
 		
		if ($fournisseur['BSSTypeProduit'] !=  $post['typeProduit']) {
			$valeurs['BSSTypeProduit']['valeur']  = 'Type Produit' ;
			$valeurs['BSSTypeProduit']['fichier']  = $fournisseur['BSSTypeProduit'] ;
			$valeurs['BSSTypeProduit']['post'] = $post['typeProduit'] ;
		}


		if ($fournisseur['devise'] !=  $post['deviseHG']) {
			$valeurs['devise']['valeur']  =  'Devise' ;
			$valeurs['devise']['fichier']  = $fournisseur['devise'] ;
			$valeurs['devise']['post'] = $post['deviseHG'] ;
		}

		if ($fournisseur['modeReglement'] !=  $post['modeReglement']) {
			$valeurs['modeReglement']['valeur']  = 'Mode Reglement' ;
			$valeurs['modeReglement']['fichier']  = $fournisseur['modeReglement'] ;
			$valeurs['modeReglement']['post'] = $post['modeReglement'] ;
		}

		if ($fournisseur['conditionReglement'] !=  $post['conditionReglementHG']) {
			$valeurs['conditionReglement']['valeur']  =  'Condition Reglement' ;
			$valeurs['conditionReglement']['fichier']  = $fournisseur['conditionReglement'] ;
			$valeurs['conditionReglement']['post'] = $post['conditionReglementHG'] ;
		}

		if ($fournisseur['identiteBanquePays'] !=  $post['idBanq']) {
			$valeurs['identiteBanquePays']['valeur']  =  'Identite Bancaire' ;
			$valeurs['identiteBanquePays']['fichier']  = $fournisseur['identiteBanquePays'] ;
			$valeurs['identiteBanquePays']['post'] = $post['idBanq'] ;
		}

		if ($fournisseur['nomBanque'] !=  $post['nomBanq']) {
			$valeurs['nomBanque']['valeur']  = 'Nom Banque' ;
			$valeurs['nomBanque']['fichier']  = $fournisseur['nomBanque'] ;
			$valeurs['nomBanque']['post'] = $post['nomBanq'] ;
		}

		if ($fournisseur['codeBanque'] !=  $post['codeBanq']) {
			$valeurs['codeBanque']['valeur']  = 'codeBanque' ;
			$valeurs['codeBanque']['fichier']  = $fournisseur['codeBanque'] ;
			$valeurs['codeBanque']['post'] = $post['codeBanq'] ;
		}

		if ($fournisseur['etablissementBanque'] !=  $post['etabBanq']) {
			$valeurs['etablissementBanque']['valeur']  = 'Etablissement Banque' ;
			$valeurs['etablissementBanque']['fichier']  = $fournisseur['etablissementBanque'] ;
			$valeurs['etablissementBanque']['post'] = $post['etabBanq'] ;
		}

		if ($fournisseur['numeroCompteBanque'] !=  $post['numCompte']) {
			$valeurs['numeroCompteBanque']['valeur']  = 'Numero CompteBanque' ;
			$valeurs['numeroCompteBanque']['fichier']  = $fournisseur['numeroCompteBanque'] ;
			$valeurs['numeroCompteBanque']['post'] = $post['numCompte'] ;
		}

		if ($fournisseur['cleCompteBanque'] !=  $post['cleCompte']) {
			$valeurs['cleCompteBanque']['valeur']  = 'Cle Compte Banque' ;
			$valeurs['cleCompteBanque']['fichier']  = $fournisseur['cleCompteBanque'] ;
			$valeurs['cleCompteBanque']['post'] = $post['cleCompte'] ;
		}

		if ($fournisseur['iban'] !=  $post['iban']) {
			$valeurs['iban']['valeur']  = 'Iban' ;
			$valeurs['iban']['fichier']  = $fournisseur['iban'] ;
			$valeurs['iban']['post'] = $post['iban'] ;
		}

		if ($fournisseur['swift'] !=  $post['swift']) {
			$valeurs['swift']['valeur']  =  'Swift' ;
			$valeurs['swift']['fichier']  = $fournisseur['swift'] ;
			$valeurs['swift']['post'] = $post['swift'] ;
		}

 
		return $valeurs;
	}	
}
 
?>
