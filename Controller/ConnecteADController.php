 <?php

require('Controller.php') ;

class ConnecteADController extends Controller {


 	// action=index => affiche le formulaire de connexion et permettre la connexion
	public function indexAction () {
		$app_title="Connexion " ;
		$app_body="Body_Connecte" ;
		$app_desc="Comeca" ;
		// si l admin est connecté
		$auth = $this->authModule->estConnecte();
		
		// si connecté => redirection vers indexAction de CategorieController 
		// $domain = 'comeca.intra';
		// $username = 'ruggiero.william';
		// $password = 'w1ll14m$';
		// $ldapconfig['host'] = '10.20.21.59';
		// $ldapconfig['port'] = 389;
		// $ldapconfig['basedn'] = 'dc=comeca,dc=intra';

		// $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
		// ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
		// ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

		// $dn="ou=person,".$ldapconfig['basedn'];
		// $bind=ldap_bind($ds, $username .'@' .$domain, $password);
		// $isITuser = ldap_search($bind,$dn,'(&(objectClass=User)(sAMAccountName=' . $username. '))');
		// if ($isITuser) {
		//     echo("Login correct");
		// } else {
		//     echo("Login incorrect");
		// }





}}
/*
@ldap_bind($ad, "{$user}@{$domain}", $password) or die('Could not bind to AD.');


		
		require('View/Index/index.php') ;
	}
	
*/
