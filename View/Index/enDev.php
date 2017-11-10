<?php

ob_start();

 
?>
 
 	
	 

		<!--<input type="hidden" name="controller" value="index" /> 
 		<input type="hidden" name="action" value="creeFournisseurs" />	 -->
		<legend class="scheduler-border">
			<div class="well" >

       			<h2>   
       				<?php echo "ENCOURS DE DEVELOPPEMENT" ; 
       			  ?>
       			</h2>
       		</div>
		</legend>	 
	
	
 
 	


<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
