<?php

ob_start();
 ?>

<form method="post">

	<legend class="scheduler-border">
		<div class="well" >
			<h3> Modification d'un fournisseur M3 </h3>
		</div>
	</legend>	 
	
	<div class="col-sm-12 ">
		<div class="col-sm-4 col-offset-sm-1">
			<h4>  Saisir le numéro du fournisseur   </h4>
		</div>
		<div class="col-sm-2 col-offset-sm-1">
			<input type="text" id="sunoM3" name="sunoM3">
 		</div>
 		<div class="col-sm-4">
			<input type="submit" name="Valider" value="Valider">	
		</div>
	</div>
	
</form>

<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>