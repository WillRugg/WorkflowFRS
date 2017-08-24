<?php

ob_start();

?>

<!-- www.devbridge.com/sourcery/components/jquery-autocomplete/# 
https://www.w3schools.com/php/php_ajax_livesearch.asp-->

<h3>Modification d'un fournisseur</h3>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.5.js'></script>  
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>
<!-- <script type="text/javascript" src="Ressources/recupFournisseurs.js"></script> -->
<?php 

        $bla=null;

		foreach ($ListeFournisseurs as $uneList) {	
		 	//echo '"'.$uneList['IDSUNM'].'",';
			$bla .= '"'.$uneList['IDSUNM'].'-'.$uneList['SAADR3'].'",';

		}
		?> 

<script type="text/javascript">
	$(function() {
	    var availableTags = 
	    [  <?php echo $bla ; ?> ];
	    $( "#tags" ).autocomplete({source: availableTags,minLength:2}).bind('focus', function(){ $(this).autocomplete("search"); } );
	    $('#tags').trigger("focus"); 
	});
</script>
  



<div class="demo">

<div class="ui-widget">
    <label for="tags">Recherche: </label>
    <input type="text" id="tags"/>
</div>

</div>
<h4>Liste Fournisseurs existants</h4>
<div class="col-sm-12">Emplacement tableau recensement</div>

<!-- 	<?php 
				 		 foreach ($ListeFournisseurs as $uneList) {	
				 ?> 
				<?php echo $uneList['IDSUNM'].',';?>

	<?php } ?>	 -->

<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>