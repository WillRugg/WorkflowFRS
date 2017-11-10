<?php

ob_start();
 ?>

<form method="post">

	<legend class="scheduler-border">
		<div class="well" >
			<h3> Modification d'un fournisseur M3 </h3>
		</div>
	</legend>	 
	

	<h4>1 - Saisir le numéro du fournisseur ici : </h4>

	<input type="text" name="SUNO">
	
	<h4>2 - Validez </h4>
	<input type="submit" name="Valider">	

</form>

<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>