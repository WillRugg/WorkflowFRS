<?php
// ------------------------------------------------
// schema
// ------
// mvc 
//	-> index.php : rooter : point d'entrée
//	-> Controller : dossier qui contiendra les classes Controller : - IndexController - UserController -
//	-> Layout  : dossier qui contiendra les fichiers  : - header - footer  - menu - layout
//	-> Model : dossier qui contiendra les classes Model : - Model.php(connexion) - ConversationsModel.php - UserModel.php -
//	-> Module : dossier qui contiendra les classes Module : - AuthModule.php(authentification) 
//	-> View: dossier qui contiendra les fichiers View :
//	-> un dossier Index contenant les fichier de view un par action pour l'Index (index.php - update.php )
//	-> un dossier User contenant les fichier de view un par action pour le User (index.php - delete.php - add.php - update.php )
// 
// INDEX GENERANT LES NOMS  CONTROLLER ET L ACTION 
// -------------------------------------------------
// -- INITIALISATION DES CONSTANTES ET DE LA PAGE --
// -------------------------------------------------
//
// Ouverture du session start
session_start();
// definir les constantes de connexion
define('VERSION','Création Fournisseur V.1');
//maiao
define('PDO_DSN','odbc:M3');
define('PDO_USERNAME', 'API');
define('PDO_PASSWORD','API'); 
//sqlserver
define('PDOS_DSN','mysql:host=localhost;dbname=fournisseurs');
define('PDOS_USERNAME', 'root');
define('PDOS_PASSWORD',''); 

// démarrer la Session pour se connecter

// on récupere la valeur de --$_GET[''] et $_POST[]--
$request_files = $_FILES;
$request_get = $_GET;
$request_post = $_POST;
 
// on met --$_GET[''] et $_POST[]-- à null pour qu il ne soit plus possible de l utiliser dans le controller
$_GET  = $_POST  = $_FILES = null;

// ------------------------------------------------------------
// --  GENERER CONTROLLER ET ACTION EN AUTOMATIQUE ------------
// ------------------------------------------------------------
 
// Récupérer la valeur en minuscule du controller dans l'url $_GET['controller']
if (empty($request_get['controller'])) {
	$appel_controller_name = "index";	
} else {
	$appel_controller_name = strtolower($request_get['controller']);	
}
 

// Récupérer la valeur en minuscule de l action dans l'url $_GET['action']
if (empty($request_get['action'])) {
	$appel_action_name = "index";
} else {	
	$appel_action_name = strtolower($request_get['action']);
}
 
// montage du nom correct de Class Controller du dossier Controller (passé dans l'url)
$appel_controller_class_name = transformeName($appel_controller_name)."Controller";
$appel_controller_file = "Controller/".$appel_controller_class_name.".php";

// lancer la fonction "file_exists" pour vérifier l'existence du fichier 
if (file_exists($appel_controller_file)) {
	// charger la class controller
	require_once($appel_controller_file);
	// instancier un objet (créer) de la class controller avec le get et post
	$appel_controller = new $appel_controller_class_name($request_get,$request_post,$request_files) ;
	// Montage du nom correct de l action (doit commencé par une Maj) du fichier ControllerName.php (passé dans l'url)
	$appel_controller_action = lcfirst(transformeName($appel_action_name))."Action";
	if (method_exists($appel_controller, $appel_controller_action)){
		// Lancer l'action
		$appel_controller->$appel_controller_action();
	} else {
		die ("L'action  " .$appel_action_name."Action n'est pas sur le ".$appel_controller_class_name."!");
	}
} else {
	die ("Le ".$appel_controller_class_name. "n'existe pas !");
}
// -------------------------------------------------------------------
// -- Fonction pour générer les controllers et action en CamelCase  -- 
// -- 	si mots composés dans les liens => générer la bonne syntaxe
// 			mentions_legales
// 			str_replace('_', ' ', $string) => mentions légales
// 			ucwords(mentions légales) => Mentions Legales
// 			return str_replace(' ', '',"Mentions Legales") => MentionsLegales
// -------------------------------------------------------------------

function transformeName ($string) {
	$string = str_replace('_',' ',$string); // supprimer les "_" par des " "
	$string = ucwords($string);   			// Mettre le 1er carct des mots en majuscule
	$string = str_replace(' ','',$string); // supprimer les " " par rien ""

	// return str_replace(' ', '',ucwords(str_replace('_',' ', $string)));
	return $string;
}



?>
