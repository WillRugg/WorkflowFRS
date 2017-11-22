 <?php
// constructeur de la classe pour securiser
            

require('Controller.php') ;

class ModifController extends Controller {

 	// action=index => affiche le formulaire de connexion et permettre la connexion
	 

	
	// ne ramène pas tous les champs et toutes les adresses
	public function modifAction()
	{
		$app_title="Connexion " ;
		$app_body="Body_Connecte" ;
		$app_desc="Comeca" ;

		// on récupère les données par GetBasicData et suno
		$fichier = 'http://dsiwilrug:w1ll14m$@tupai:32005/m3api-rest/execute/CRS620MI/GetBasicData?SUNO='.$this->get['SUNO'];
		/*	$xml = simplexml_load_file($fichier); */
			// print_r($xml);
			// var_dump( $xml->MIRecord->NameValue[0]->Name['CONO']->Value);
    		// var_dump( $xml->MIRecord->NameValue[2]->Value);
    		// var_dump( $xml->MIRecord->NameValue[3]->Value);
    		// var_dump( $xml->MIRecord->NameValue[4]->Value);
    		// var_dump( $xml->MIRecord->NameValue[5]->Value);

    	$dom = new DOMDocument;
		$dom->load($fichier);
		//var_dump($dom);
		$nomZone=$dom->getElementsByTagName("Name");
		$valueZone=$dom->getElementsByTagName("Value");
		//var_dump($enreg);
		$i=0;
		foreach($nomZone as $uneNomZone){
	  	  			$dataFrs1[$i]= $uneNomZone->nodeValue;
	  	  			$i++;
	  	}
	  
	  $j=0;	  			
			foreach($valueZone as $uneValeur){
		  	  			
		  	  			$dataFrs2[$j]=$uneValeur->nodeValue;
		  	  			$j++;
			}
	   	

	  	$dataFrs= array_combine($dataFrs1,$dataFrs2);


	  // on récupère les données adresse par LstAddresses et suno
		$fichier = 'http://dsiwilrug:w1ll14m$@tupai:32005/m3api-rest/execute/CRS620MI/LstAddresses?SUNO='.$this->get['SUNO'];
		/*	$xml = simplexml_load_file($fichier); */
			// print_r($xml);
			// var_dump( $xml->MIRecord->NameValue[0]->Name['CONO']->Value);
    		// var_dump( $xml->MIRecord->NameValue[2]->Value);
    		// var_dump( $xml->MIRecord->NameValue[3]->Value);
    		// var_dump( $xml->MIRecord->NameValue[4]->Value);
    		// var_dump( $xml->MIRecord->NameValue[5]->Value);

    	$dom = new DOMDocument;
		$dom->load($fichier);
		//var_dump($dom);
		$nomZone=$dom->getElementsByTagName("Name");
		$valueZone=$dom->getElementsByTagName("Value");
		//var_dump($enreg);
		$i=0;
		foreach($nomZone as $uneNomZone){
	  	  			$dataAdrFrs1[$i]= $uneNomZone->nodeValue;
	  	  			$i++;
	  	}
	  
	  $j=0;	  			
			foreach($valueZone as $uneValeur){
		  	  			
		  	  			$dataAdrFrs2[$j]=$uneValeur->nodeValue;
		  	  			$j++;
			}
	   	

	  	$dataAdrFrs= array_combine($dataAdrFrs1,$dataAdrFrs2);	
	 
	  	
	  

    	require('View/Index/modifFrs.php') ;
	}


}