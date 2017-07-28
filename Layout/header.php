
<div class="container">
	<div class="center-block">
		<div class="col-md-12">
		
		<div class="col-md-2"><img id="logoTop" src="Ressources/logo.jpg" alt="logoTop" height="50"/></div>
		<div class="col-md-1"></div>
		<div class="col-md-5"><h3> Gestion des Fournisseurs M3 </h3></div>
	 	<div class="col-md-4" style="padding-top: 1.5em;"><?php echo $this->getVersion()." Biblio : ".$this->getBiblio(); ?> </div>
	 	
	 	</div>

	 	<div class="col-sm-4 col-sm-offset-8">
	 		<a href="http://mataiva/ReportServer/Pages/ReportViewer.aspx?%2fDirections%2fIndustrielle%2fAchats%2fRecherche+Fournisseurs&rs:Command=Render"> 
	 			<input type="submit" class="btn btn-success" value="Recherche Fournisseur M3" name="Recherche Fournisseur M3"> 
	 		</a>
	 		<a href="<?php echo $this->link('Connecte','');?>"><input type="submit" class="btn btn-info " value="Espace Validateurs" name="Espace Validateurs"></a>
	 	</div> 
	</div>
</div>


	
		