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
	<!-- afficher les erreurs -->
 <?php  
  
	if  (isset($this->get['succes'])) 
	{ 
		echo '<SCRIPT language="Javascript">alert(\''.$this->get['succes'].'\', \'Information !\');</SCRIPT>' ;			
	}

	elseif (isset($this->get['transa'])) 
	{
		echo '<SCRIPT language="Javascript">alert(\''.$this->get['transa'].'\', \'Information !\');</SCRIPT>' ;				
	}
	elseif (isset($this->get['connexion']))
	{
		echo '<SCRIPT language="Javascript">alert(\''.$this->get['connexion'].'\', \'Information !\');</SCRIPT>' ;		
	} 

	if (isset($this->get['errorMail'])) {
		echo $this->get['errorMail'] ;
	}
	elseif (isset($this->get['okMail'])) {
		echo $this->get['okMail'];
	}
		
?>
		


<div class='bootstrap-table' style="margin-top: 3%;" id="">
	<div class="fixed-table-container">
		<form method="get"> 
			<table id="mesFichesFrs"  class=" table table-bordered table-hover" >
				<thead> 					
					<tr>
						<th> Id </th>	
						<th> Entité</th>
						<th> Nom du demandeur </th>
						<th> Fonction </th>
						<th> Date Demande </th>
						<th> Genre Fournisseur </th>
						<th> Raison Sociale </th>
						<th> Ville</th>
						<th> Type Demande </th>
						<th> Code M3 </th>
						<!--<th> Prendre en validation </th> -->
						<?php if($_SESSION['ident']=='admin'){ ?> <th> à Valider par </th> <?php } ?>
					</tr>
				</thead> 
				
				 		<?php 
				 		 foreach ($ListeAttente as $uneListe) {	
						 ?> 
						<tbody>
						<?php 
							// array('id'=> )
							$idMd5=$uneListe['ID']; ?>

							<!-- si  domaien Validation de la fiche = Movex alors pas possiblilité de cliquer -->
							<?php if($uneListe['domaineValidation'] != 'Movex'){ ?> 
							<tr class='clickable-row' style="cursor: pointer;" 
							    data-href='<?php echo $this->link('','update',array('ID'=>$idMd5,'genre'=>$uneListe['genreFournisseur'],'typeDde'=>$uneListe['typeDemande']));?>'>
							<?php	 } else { ?> 
							<tr>
							<?php	} ?> 
							 	<td class="text-center Id"><?php echo $uneListe['ID'];?></td>
							 	<td class="text-center Entite"><?php echo $uneListe['entite'];?></td> 
							 	<td class="text-center nomDemandeur"><?php echo $uneListe['nomDemandeur'];?></td> 
							 	<td class="text-center Fonction"><?php echo $uneListe['fonction'];?></td> 
							 	<td class="text-center dateDemande"><?php echo $uneListe['dateDemande'];?></td> 
							 	<td class="text-center genreFournisseur"><?php if ($uneListe['genreFournisseur'] == 'G') {echo "Frs Frais Généraux"; } 
							 												   elseif ($uneListe['genreFournisseur'] == 'I') { echo "Fournisseur Industriel"; } ?></td> 
							 	<td class="text-center raisonSociale"><?php echo $uneListe['raisonSociale'];?></td> 
							 	<td class="text-center Ville"><?php echo $uneListe['ville'];?></td> 
							 	<td class="text-center typeDemande"><?php if ($uneListe['typeDemande'] == 'C') {echo "Création";} 
							 												   elseif ($uneListe['typeDemande'] == 'M') { echo "Modification"; } ?></td> 
							 	<!-- <td class="text-center Validation"> <a href="<?php echo $this->link('','update',array('id'=> $uneListe['ID'],
							 																							   'genre'=>$uneListe['genreFournisseur'],
							 																							   'typeDde'=>$uneListe['typeDemande']));?>">aze </a></td> -->
							 	<td class="text-center codeM3"><?php echo $uneListe['codeM3'];?></td> 
							 	<?php if($_SESSION['ident']=='admin'){ ?> <td class="text-center Domaine"> <?php echo $uneListe['domaineValidation'];?> </td> <?php } ?>
							 </tr>

							<script type="text/javascript">jQuery(document).ready(function($) {
				  				$(".clickable-row").click(function() {
				        		window.location = $(this).data("href");
								});
								});
							</script>
			 			</tbody>

	<?php } ;?>
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