<?php
require_once('Controller/Controller.php') ;

class IndexController extends Controller {
	
	public function indexAction() {
		$app_title="Article par Emplacement " ;
		$app_desc="Comeca" ;
		$app_body="body_Index" ;
		
		// liste des clients 
		require_once('Model/ApiM3Model.php');
		$apiModel = new ApiM3Model();
				
		$articles = $apiModel->listerArticle();
		 
		require('View/Index/index.php') ; 
	}

		
	 
	
	
	
	
}

 
?>




 

