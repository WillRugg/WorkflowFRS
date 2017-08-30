<?php

ob_start();
// print_r($xml);
 ?>

<h3>Modification d'un fournisseur <?php echo ( $xml->MIRecord->NameValue[3]->Value); ?> </h3>



<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>