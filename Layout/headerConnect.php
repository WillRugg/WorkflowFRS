
<div class="container">
	<div class="center-block">
		<div class="col-md-12">
		
		<div class="col-md-4"><img id="logoTop" src="Ressources/logo.jpg" alt="logoTop" height="50"/></div>
		<div class="col-md-4" style="text-align: center;">
			<h3> 
		
			<?php 
			if(isset($_SESSION['ident']))
				{
					echo $_SESSION['ident'];
				}
				 else 
				 { 
				 	if(!isset($_SESSION['ident']))
					{

					} else{	
						?> Se connecter<?php 
					}
				} 
				?>
			 	
			 </h3></div>
	 	<div class="col-md-4" style="padding-top: 1.5em;"><?php echo $this->getVersion()." Biblio : ".$this->getBiblio(); ?>
	 	</div></div>	</div>
</div>

<?php
	 	if(isset($_SESSION['ident']))
{ ?>
		<div class="col-md-12" style="margin-top: 1%; margin-bottom: 1% ">
			<div class="col-md-12" >
				<div class="col-md-3 " >
					<a href="<?php echo $this->link($_SESSION['ident'],'accueil');?>"> <input type="submit" class="btn btn-success" value="En attente" name="Attente"> </a>

				 	<a href="<?php echo $this->link('Connecte','seDeconnecte');?>"> <input type="submit" class="btn btn-danger" value="Se déconnecter" name="Deconnexion"> </a>
				</div>
				<div class="col-md-2 col-md-offset-7" >
			 		<a href="http://maupiti/ReportServer/Pages/ReportViewer.aspx?%2fDirections%2fIndustrielle%2fAchats%2fRecherche+Fournisseurs&rs:Command=Render"> 
			 			<input type="submit" class="btn btn-warning" value="Recherche Fournisseur M3" name="Recherche Fournisseur M3"> 
			 		</a>
			 	</div>
		 	</div>
 		</div>

<?php } ?>



	 	





	
		