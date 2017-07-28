<?php

ob_start();

?>

<<<<<<< HEAD
=======
<div id="col-lg-12" style="visibility: hidden;"> Page choix fournisseur  </div>
<div id="container">
>>>>>>> 7222b92384fedc6688745ff2bfcac53b3b1f6824

	
	<!-- liste déroulante -->

		<form class="formSearch" method="get">	
			<input type="hidden" name="controller" value="" />
			<input type="hidden" name="action" value="afficheLivre"/>
			<!--input type="hidden" name="page" value="1"/-->
<<<<<<< HEAD
	        <label for="divi">Rechercher par :</label> 

	            <div class="col-sm-12"> 
	            <div class="col-sm-2"> </div>
	                <div class="col-sm-10"> 
=======
	        
	            <div class="row"> 
            		<div class="col-sm-3" style="padding-top: 0.5em; padding-left: 10%;"><label for="divi">Rechercher par :</label> </div> 
	                <div class="col-sm-6"> 
>>>>>>> 7222b92384fedc6688745ff2bfcac53b3b1f6824
	                	 
	                    <select name="divi" id="divi" class="form-control"> 
				 
							<option value="nom" > Nom </option> 
							<option value="ville" > Ville </option> 
							<option value="siret" > Siret </option> 
							<option value="cp" > C.P. </option> 
						 
	                    </select> 
<<<<<<< HEAD
					</div> 
					</div>
					<INPUT TYPE="submit" class="btn btn-info" value="Valider"/>

=======
					</div>
					<div class="col-sm-3"></div> 
		
					<INPUT TYPE="submit" class="btn btn-primary" value="Valider"/>
				</div> 
>>>>>>> 7222b92384fedc6688745ff2bfcac53b3b1f6824
		</form>		




<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>