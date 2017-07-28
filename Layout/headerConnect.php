
<div class="container">
	<div class="center-block">
		<div class="col-md-12">
		
		<div class="col-md-4"><img id="logoTop" src="Ressources/logo.jpg" alt="logoTop" height="50"/></div>
		<div class="col-md-4" style="text-align: center;"><h3> 
		
		<?php 
		if(isset($_SESSION['ident']))
			{
				echo $_SESSION['ident'];
			}
			 else 
			 { 
			 	if(!isset($_SESSION['ident']))
{} else{	
	?> Se connecter<?php }
			 } 
			 ?>
			 	
			 </h3></div>
	 	<div class="col-md-4" style="padding-top: 1.5em;"><?php echo $this->getVersion()." Biblio : ".$this->getBiblio(); ?>
	 	</div></div>	</div>
</div>

<?php
	 	if(isset($_SESSION['ident']))
{ ?>
		<div style="margin-top: 1%;">
			<a href="<?php echo $this->link($session,'accueil');?>"> <input type="submit" class="btn btn-success" value="En attente" name="Attente"> </a>

		 	<a href="<?php echo $this->link('Connecte','seDeconnecte');?>"> <input type="submit" class="btn btn-danger" value="Se déconnecter" name="Deconnexion"> </a>
	 		<a href="http://mataiva/ReportServer/Pages/ReportViewer.aspx?%2fDirections%2fIndustrielle%2fAchats%2fRecherche+Fournisseurs&rs:Command=Render"> 
	 			<input type="submit" class="btn btn-success" value="Recherche Fournisseur M3" name="Recherche Fournisseur M3"> 
	 		</a>
 		</div>

<?php } ?>



	 	





	
		