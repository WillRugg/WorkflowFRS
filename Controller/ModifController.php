 <?php
// constructeur de la classe pour securiser
            

require('Controller.php') ;

class ModifController extends Controller {

 	// action=index => affiche le formulaire de connexion et permettre la connexion
	public function indexAction () {
		//$session = $_SESSION['ident'];
		$app_title="Connexion " ;
		$app_body="Body_Connecte" ;
		$app_desc="Comeca" ;
		
		if($this->post) {
			$post = $this->post;
			$files =$this->files;			
			$suno=$post['SUNO'];
			$this->redirect('Modif','modif',array('SUNO'=>$suno));
			
			}
		require('View/Index/setSunoModif.php') ;
}
	public function modifAction()
	{
		$app_title="Connexion " ;
		$app_body="Body_Connecte" ;
		$app_desc="Comeca" ;
		$fichier = 'http://dsiwilrug:w1ll14m$@tupai:32005/m3api-rest/execute/CRS620MI/GetBasicData?SUNO='.$this->get['SUNO'];
			$xml = simplexml_load_file($fichier);
			//print_r($xml);
			echo ( $xml->MIRecord->NameValue[1]->Value);
    		// var_dump( $xml->MIRecord->NameValue[1]->Value);
    		// var_dump( $xml->MIRecord->NameValue[2]->Value);
    		// var_dump( $xml->MIRecord->NameValue[3]->Value);
    		// var_dump( $xml->MIRecord->NameValue[4]->Value);
    		// var_dump( $xml->MIRecord->NameValue[5]->Value);

    	require('View/Index/modifFrs.php') ;
	}


}