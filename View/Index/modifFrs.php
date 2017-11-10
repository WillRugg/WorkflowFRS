<?php

ob_start();
// print_r($xml);
 ?>


<form action = "" class='formCreate' method='post' enctype="multipart/form-data">

	<h3>Modification d'un fournisseur </h3>

 
 	<div>
 		

		  
		<div><?php  var_dump('frs' , $dataFrs); ?>  &nbsp; </div>
		<div><?php echo 'Num '.$dataFrs['SUNO'];	?> &nbsp; </div>
		<div><?php echo 'NOm  '.$dataFrs['SUNM'];	?> &nbsp; </div>
		<div><?php echo 'Cle Reche '.$dataFrs['ALSU'];	?> &nbsp;</div>
		<div><?php echo 'siren  '.$dataFrs['CORG'];	?> &nbsp;</div>
		<div><?php echo 'siret (5) '.$dataFrs['COR2']; ?> &nbsp;</div>
		<div><?php echo 'tva intra '.$dataFrs['VRNO']; ?> &nbsp;</div>
		<div><?php echo 'tel '.$dataFrs['PHNO']; ?> &nbsp;</div>
		<div><?php echo 'tva intra '.$dataFrs['VRNO']; ?> &nbsp;</div>
		<div><?php echo 'Nature '.$dataFrs['ORTY']; ?> &nbsp;</div>
		<div><?php echo 'code TVA '.$dataFrs['VTCD']; ?> &nbsp;</div>
		<div><?php echo 'mode Regl '.$dataFrs['PYME']; ?> &nbsp;</div>
		<div><?php echo 'delai Regl '.$dataFrs['TEPY']; ?> &nbsp;</div>
		<div><?php echo 'obj compta '.$dataFrs['ACRF']; ?> &nbsp;</div>
		
 		<div><?php  var_dump('frs' , $dataAdrFrs); ?>  &nbsp; </div>
			 
	</div>


</form>

<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>