<?php

ob_start();
 //var_dump($session);
//echo $this->get['idEnvoi'];
//echo $this->get['ID'];
 ?>

 Adresse pour suivi fournisseur : </br>
http://private.comeca-group.com/SupplierExtranet/Supplier.php?action=updateByFournisseur&idEnvoi=<?php echo $this->get['idEnvoi'] ;?>&ID=<?php echo $this->get['ID'] ;?> 


			
<?php
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;
?>