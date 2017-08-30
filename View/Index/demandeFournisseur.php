<?php

ob_start();
 //var_dump($session);
//echo $this->get['idEnvoi'];
//echo $this->get['ID'];
 ?>

<legend class="scheduler-border">
       		<h2><span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp; Demander des informations complémentaires</h2>
</legend>	 

 <div style="text-align: center;">Adresse pour suivi fournisseur : </div></br>
<div style="text-align: center;"><i>http://private.comeca-group.com/SupplierExtranet/Supplier.php?action=updateByFournisseur&idEnvoi=<?php echo $this->get['idEnvoi'] ;?>&ID=<?php echo $this->get['ID'] ;?> </i></div>

&nbsp;
<form action = "" class='formCreate' method='post' enctype="multipart/form-data">
<fieldset class =  "thumbnail">
<label for="emailSupplier">Vous souhaitez l'envoyer par email</label></br>
&nbsp;
 <input type="email" name="emailSupplier" class="form-control" id="emailSupplier" placeholder="Email Fournisseur"  size="36" maxlength="36">
 <input type="hidden" name="Lien" value="http://private.comeca-group.com/SupplierExtranet/Supplier.php?action=updateByFournisseur&idEnvoi=<?php echo $this->get['idEnvoi'] ;?>&ID=<?php echo $this->get['ID'] ;?>">
 <div class="col-sm-offset-11"><input type="submit" class="btn btn-info" name="Envoi"></div>
</fieldset>
</form>

			
<?php
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;
?>
