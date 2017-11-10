<?php

ob_start();

?>

<div id="container">
	
	<!-- Affiche grand Livre -->
	<div class='bootstrap-table' id="">
		<div class="fixed-table-container">
			 
			<table id="mesFournisseursM3"  class="tablesorter table table-striped table-bordered " >
				<thead> 
					<tr  class=".noExl"> 
						<th colspan="3" style="text-align:center"> L I S T E  :   F o u r n i s s e u r s   M 3  par  A P I  </th>
				 	</tr>	
					
					<tr >	
						<th> Cono</th>
						<th> Code </th>
						<th> Nom </th>
					</tr>
				</thead> 
				<tbody>
				<?php
				if(!empty($frsM3)) 
				{
				?>		
					<?php
					foreach ($frsM3 as $unfrsM3) 
					{ ?>	
						<tr>	
							<!--td><form class="formBloq" method="get"> <input type="checkbox" name="statut[]" value="statut[]" class="statut"> </form></td--> 
							<td class="text-center typPiece"><?php echo $unfrsM3["CONO"];?></td> 
							<td class="numCliPiece"><?php echo $unfrsM3["SUNO"];?> </td> 
							<td class="cliPiece"><?php echo $unfrsM3["SUNM"];?></td>
						</tr>
					<?php	} ?>	  
								 
					<?php	
				} else {
						echo "<tr><td>aucun fournisseur trouvée</td></tr>";
				} ?>		
				<tbody>	
			</table>

		</div> 
	</div>	
</div>

<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
