<?php

ob_start();

?>
 

<div id="container">
	 	<div class="col-md-12" style="text-align: center;"><u>Bienvenue sur la plateforme de demande de création de fournisseurs </u></br><i> Afin de créer un fournisseur, remplir la fiche fournisseur ci-dessous en étant le plus complet possible. Dès la finalisation de votre formulaire, votre demande devra être validée par le service Achats ainsi que la Comptabilité.</br> Pour toute question relative au remplissage du questionnaire et au renseignement d'un formulaire contactez <b>xxxxxx@comeca-group.com</b> Si vous rencontrez toute difficulté durant le remplissage du formulaire merci de prendre contact avec la DSI de Comeca Group en faisant un GLPI ou en envoyant un mail à <b>helpdesk@comeca-group.com</b> </br> </br></i>
	 	<b>Note Importante :</b></br>
	 	<i>Avant toute demande de création de formulaire nous vous demandons de vérifier en cliquant sur le bouton "Liste Fournisseurs existants" si le fournisseur n'est pas déjà présent dans la base de données de Comeca.</br></br></i>

	</div>
	
	<legend class="scheduler-border">
	       		<h2><span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp; Fiche fournisseur à compléter</h2>
	</legend>


	<form action = "" method='post' enctype="multipart/form-data">

	<?php 

        	
			
			foreach ($listeDesChamps as $list) {
				?> 

				<input type="text" class="<?php echo $list['class']; ?>" placeholder="<?php echo $list['placeholder']; ?>">

				<?php
			}
			
	
			

		
		?> 
	

	    
	  
	</form>
   		 	
	<div class="col-md-8">&nbsp; </div>
</div> 
 	


<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
