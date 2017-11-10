<?php

ob_start();

$origine = $this->get['FRS'];
 
?>
 
 <div class="col-md-12"> 
 	<div class="col-md-1"> 
 		<a href="<?php echo $this->link('','choixFournisseur');?>"><img src="Ressources\files\fleche_left.jpg" height="30" data-toggle="tooltip" 
				    		title="Retour Ecran Précédent" ></a> 
	</div>
	<div class="col-md-10"></div>
	<div class="col-md-1"> 	
  		<a href="<?php  if     ($origine == 'gen' ) { echo $this->link('','creeFournisseur',array('FRS'=>'gen'));} 
  						elseif ($origine == 'ind' ) { echo $this->link('','enCoursDeDeveloppement',array('FRS'=>'ind'));}
 						elseif ($origine == 'mvx' ) { echo $this->link('','enCoursDeDeveloppement',array('FRS'=>'mvx'));}   ?>">
 			<img src="Ressources\files\fleche_right.jpg" height="30"  data-toggle="tooltip" title="Poursuivez la création" > 
 		</a>
 		<!--<a href="<?php  if  ($origine == 'gen' ) { echo $this->link('','creeFournisseur',array('FRS'=>'gen'));} 
  						elseif ($origine == 'ind' ) { echo $this->link('','creeFournisseur',array('FRS'=>'ind'));}
 						elseif ($origine == 'mvx' ) { echo $this->link('Modif','',array('FRS'=>'mvx'));}   ?>">
 			<img src="Ressources\files\fleche_right.jpg" height="30"  data-toggle="tooltip" title="Poursuivez la création" > 
 		</a> -->
  	</div>
	</div>
 	<iframe 
 	style="width: 100%; height: 1000px;" 
 	src="http://maupiti/ReportServer/Pages/ReportViewer.aspx?%2fDirections%2fIndustrielle%2fAchats%2fRecherche+Fournisseurs&rs:Command=Render">
	</iframe>


<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
