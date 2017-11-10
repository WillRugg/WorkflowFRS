<?php

ob_start();

?>
 
 	<form class="formSearch" method="get">	
			 

	<form action = "" class='formCreate col-sm-12' method='post'>

		<fieldset>
			<div class="well" style="margin-top: 20px;text-align: center; ">  
				<!--input type="hidden" name="page" value="1"/-->
	    		<h2> Choisissez une des trois options du menu</h2>
	    	</div>
	            <div class="row">         	 
	             	<ul class="nav nav-tabs  nav-justify">
	             		<li role="presentation" class=" ">
		             		<!-- <a href="http://maupiti/ReportServer/Pages/ReportViewer.aspx?%2fDirections%2fIndustrielle%2fAchats%2fRecherche+Fournisseurs&rs:Command=Render">  -->
		             		<a href="<?php echo $this->link('','rechercheFrs',array('FRS'=>'gen'));?>"><h3> Creation Fournisseur Frais Géneraux </h3></a>
		             	</li>
	            		<li role="presentation" class="">	            		 
	            			<a href="<?php echo $this->link('','rechercheFrs',array('FRS'=>'ind'));?>"><h3> Creation Fournisseur Industriel </h3></a>
	            		</li>
	            		<li role="presentation" class="">	            		 
	            			<a href="<?php echo $this->link('','rechercheFrs',array('FRS'=>'mvx'));?>"><h3> Modification Fournisseur M3 </h3></a>
	            		</li>
					</ul>
				</div> 
			</div>
 	<div id="container"  >
 		<div>&nbsp;&nbsp;</div>
 		<div>&nbsp;&nbsp;</div>
	 	<div class="col-md-12" style="text-align: center;">
	 		<u>Bienvenue sur la plateforme de demande de création et modification des fournisseurs </u></br></br></br><i> 
		 	<b>Note Importante :</b></br>
		 	<i>Avant toute demande de création de formulaire nous vous demandons de vérifier que le fournisseur à créer n'est pas déjà présent dans la base de données de Comeca.</br></br></i>
		 	Une fois la recherche effectuée , remplir la fiche fournisseur adaptée en étant le plus complet possible. Dès la finalisation de votre formulaire, votre demande devra être validée par le service Achats ainsi que la Comptabilité.</br></br>  Pour toute question relative au remplissage du questionnaire et au renseignement d'un formulaire contactez <b>d.lamberti@comeca-group.com</b></br> </br> Si vous rencontrez toute difficulté durant le remplissage du formulaire merci de prendre contact avec la DSI de Comeca Group en faisant un GLPI ou en envoyant un mail à <b>helpdesk@comeca-group.com</b> </br> </br></i>
		 	 
	 	</div>
	 	  	
	
  	</fieldset>

  
	</form>
   		 	
	<div class="col-md-8">&nbsp; </div>
 
</div> 	


<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
