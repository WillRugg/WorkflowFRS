<?php
require_once('Model/ApiModel.php') ;

class ApiM3Model extends ApiModel {
	
	
	public function listerArticle() {
		
	
	// on indique le serveur et le port	 6800:prod 26800:test
	//$m3Api = new ApiModel('10.20.21.105',6800);

	if ($this->open('DSINADNOY','M92e93j94' ,"MMS310MI") ) {
		
		
		// champs entrée
		$this->setField('CONO','100');
		$this->setField('WHLO','109');
		$this->setField('WHSL','04_BDL');
        $lart = array();
		
		//transaction à appeler
		if ($this->mvxAccess('List')) {	
			
			$i = 1;
			while ($this->mvxMore() ) {
				//if ($this->getField('ALQT') > 0){ 
					$lart[$i] =
						array (	'CONO'=>$this->getField('CONO'),
						 				'WHLO'=>$this->getField('WHLO'), 
				 						'WHSL'=>$this->getField('WHSL'),
										'ITNO'=>$this->getField('ITNO'),
										'ITDS'=>$this->getField('ITDS'),
		 								'ITNO'=>$this->getField('ITNO'),
				 						'STQT'=>$this->getField('STQT'),
				 						'ALQT'=>$this->getField('ALQT'));
				 
				 $i++;
				//}
				 $this->mvxAccess();
			} // while
			
			// var_dump($lart);
			return $lart;
		}	// if ($oMvx->mvxAccess

	$this->close();

  	
  	
	} // si open échoué
  	else {
  		echo "<script type='type/text/javascript'>alert('La connexion api a échoué.')</script>";
  		
  	}
		
}
	
	
  
	
}
?>