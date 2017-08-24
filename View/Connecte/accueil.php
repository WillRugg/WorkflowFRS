<?php
ob_start();


// echo "test";
// echo $_SESSION['appel_auth']['environnement'];
// var_dump($_SESSION['appel_auth']['environnement']);
// var_dump($_SESSION);
// echo $this->tamere;
// var_dump($this->tamere);

if(!isset($_SESSION['ident']))
{
	?>

	<div class="col-sm-12" style="text-align: center;"><h2>Vous n'êtes pas autorisés à accéder à cette page</h2></div>
	<div class="col-sm-offset-5 col-sm-2" style="margin-top: 15%;"><a href="<?php echo $this->link('connecte');?>"><input type="submit" class="btn btn-info" value="Page de connexion" name=""> </a></div>

	<?php 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/mainConnect.php') ;
}
else
{

	

?>

<h4> <?php  

	if  (isset($this->get['succes'])) 
		{ echo "bravo"; 


		}
		elseif (isset($this->get['transa'])) {
				echo $this->get['transa'] ;				
		}
		else {
			echo "echec connexion"; 
		} 
		
		?>
		


	</h4>


<div class='bootstrap-table' style="margin-top: 3%;" id="">
	<div class="fixed-table-container">
		<form method="get"> 
			<table id="monGrandLivre"  class="tablesorter table table-striped table-bordered " >
				<thead> 
					
						<tr>
							<th> Id </th>	
							<th> Entité</th>
							<th> Nom du demandeur </th>
							<th> Fonction </th>
							<th> Date Demande </th>
							<th> Raison Sociale </th>
							<th> Ville</th>
							<!--<th> Prendre en validation </th> -->
							<?php if($_SESSION['ident']=='admin'){ ?> <th> Stade : </th> <?php } ?>
						</tr>
				 </thead> 
				
				 	<?php 
				 		 foreach ($ListeAttente as $uneListe) {	
				 ?> 
				 <tbody>
				 	<td class="text-center Id"><?php echo $uneListe['ID'];?></td>
				 	<td class="text-center Entite"><?php echo $uneListe['entite'];?></td> 
				 	<td class="text-center nomDemandeur"><?php echo $uneListe['nomDemandeur'];?></td> 
				 	<td class="text-center Fonction"><?php echo $uneListe['fonction'];?></td> 
				 	<td class="text-center dateDemande"><?php echo $uneListe['dateDemande'];?></td> 
				 	<td class="text-center raisonSociale"><a href="<?php echo $this->link('','update',array('id'=> $uneListe['ID']));?>"><?php echo $uneListe['raisonSociale'];?></a></td> 
				 	<td class="text-center Pays"><?php echo $uneListe['ville'];?></td> 
				 	<!-- <td class="text-center Validation"> <a href="<?php echo $this->link('','update',array('id'=> $uneListe['ID']));?>">aze </a></td> -->
				 	<?php if($_SESSION['ident']=='admin'){ ?> <td class="text-center Domaine"> <?php echo $uneListe['domaineValidation'];?> </td> <?php } ?>
	 			 </tbody>

	<?php } ?>
				 </table>
			 </form>
		</div>
	</div>
			 <?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/mainConnect.php') ;


}




?>