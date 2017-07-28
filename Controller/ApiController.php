<?php
require_once('Controller/Controller.php') ;

class ApiController extends Controller {
	
	public function indexAction() {
		$app_title="Fournisseur TEST  " ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		
		// liste des clients 
		require_once('Model/ApiM3Model.php');
		$apiModel = new ApiM3Model();
				
		$frsM3 = $apiModel->testFournisseurM3();
		 
		require('View/Index/testApi.php') ; 
	}

	public function creefrsM3Action() {
		$app_title="Fournisseur TEST  " ;
		$app_desc="Comeca" ;
		$app_body="body_Cree" ;
		
		// liste des clients 
		require_once('Model/ApiM3Model.php');
		$apiModel = new ApiM3Model();
				
		$frsM3 = $apiModel->creerfrsM3($this->post);
		 
		require('View/Index/testApi.php') ; 
	}
		
	 
	
	
	
	
}

 
?>




 

