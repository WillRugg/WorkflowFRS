<?php
ob_start();
?>


<h3> Merci d'avoir rempli vos informations </h3>


<?php
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;
}