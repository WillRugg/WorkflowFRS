
<div class="container">
	<div class="center-block">
		<div class="col-md-12">
		
		<div class="col-md-2"><a href="<?php echo $this->link('','creeFournisseurs');?>"><img id="logoTop" src="Ressources/logo.jpg" alt="logoTop" height="50"/></a></div>
		<div class="col-md-2"></div>
		<div class="col-md-4"><h3> Gestion des Fournisseurs M3 </h3></div>
	 	<div class="col-md-4" style="padding-top: 1.5em;padding-bottom: 1%; "><?php echo $this->getVersion()." Biblio : ".$this->getBiblio(); ?> </div>
	 	
	 	</div>
	 	
	 	<div>
	 	<div class="col-md-2" style="padding-top: 1.5em;padding-bottom: 1%; text-align: left; "><a href="<?php echo $this->link('Connecte','');?>"><input type="submit" class="btn btn-default " value="Espace Validateurs" name="Espace Validateurs"></a></div>

	 	<div class="col-md-5 col-md-offset-5" style="padding-top: 1.5em;padding-bottom: 1%; text-align: right; ">
	 		
	 		<a href="<?php echo $this->link('Modif','');?>"><input type="submit" class="btn btn-info " value="Modification Fournisseurs" name="Demande Modification Fournisseurs"></a>

	 		<a href="http://mataiva/ReportServer/Pages/ReportViewer.aspx?%2fDirections%2fIndustrielle%2fAchats%2fRecherche+Fournisseurs&rs:Command=Render"> 
	 			<input type="submit" class="btn btn-warning" value="Liste Fournisseurs existants" name="Liste Fournisseurs existants"> 
	 		</a>
	 	</div>
	 	</div>


</div>
</div>


	
		