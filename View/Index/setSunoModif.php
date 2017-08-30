<?php

ob_start();
 ?>

<h3>Modification d'un fournisseur</h3>
<h4>1 - Trouver votre fournisseur grâce à ce lien : </h4>
<a href="http://maupiti/ReportServer/Pages/ReportViewer.aspx?%2fDirections%2fIndustrielle%2fAchats%2fRecherche+Fournisseurs&rs:Command=Render"> 
			 			<input type="submit" class="btn btn-warning" value="Recherche Fournisseur M3" name="Recherche Fournisseur M3"> 
			 		</a>
<h4>2 - Coller le numéro de votre fournisseur ici : </h4>

<form method="post">
	<input type="text" name="SUNO">

<h4>3 - Validez </h4>
	<input type="submit" name="Valider">	

</form>

<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>