<?php

ob_start();

// si pas connecté on affiche l'erreur
if(isset($boolConf['idConnecte'])) {
	if  (!$boolConf['idConnecte']) 
	{ 
		echo '<SCRIPT language="Javascript">alert(\''.$boolConf['0'].'\', \'Information !\');</SCRIPT>' ;	
	}		
}
?>

<form class="formAdmin adminConnecte col-sm-offset-3 col-sm-6" style="margin-top: 10%" method="post" action="">
	<fieldset class="fieldAdmin">
		<label> <h5 class="col-sm-12">Saisissez votre identifiant et votre mot de passe </h3></label>
			<ul class="list-group ">
				<li style="list-style-type:none"><input class="list-group-item col-sm-12" type="text" name='ident' id="ident" placeholder="  Identifiant " size="60"/></li>
				
				<li style="list-style-type:none"><input class="list-group-item col-sm-12" type="password" name='password' id="password" placeholder="  Mot de passe" size="60"/></li>
		
				<li style="list-style-type:none"><input class="list-group-item btn-success col-sm-offset-8 col-sm-4" type="submit" name="valider" value="Se connecter" maxlenght="40"/></li>
			
				<li style="list-style-type:none"><div class="msgJs"> </div></li>
			</ul>
	</fieldset>
</form>
<!-- pour afficher l'erreur JS-->

<?php
 
$app_html = ob_get_contents();
ob_end_clean();

require('Layout/mainConnect.php') ;



?>