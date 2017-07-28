<?php

ob_start();

?>

<div id="container">
	<!-- Société -->
	<div class="form-group" >
		<form class="formSearch" method="get">	
			<input type="hidden" name="controller" value="index" />
			<input type="hidden" name="action" value="index"/>
			<label for="diviSelect">Société :</label> 
				<div class="row"> 
					<div class="col-sm-6"> 
						<input name="diviSelect" id="diviSelect" class="form-control" value="<?php echo $this->get['divi'];?>" disabled="disabled" /> 
					</div> 
					<INPUT TYPE="submit" class="btn btn-info" value="Changer de sociéte"/> 
				</div> 
		</form>		
	</div>
 	

<!-- Zones de filtre  -->
<div class= "row bootstrap-table"> 
 
	<!-- 		Filtrer :  -->
  	<table class="table bootstrap-table">  
		<tr>
		 <form  method="get" id="filtrer"> 
			 <td>		 
				<input type="hidden" name="controller" value="index" /> 
 				<input type="hidden" name="action" value="afficheLivre" />	 
				<input type="hidden" name="divi" value="<?php echo $this->get['divi'];?>"/> 
			</td>
			<td>		
				<select name="searchType" id="type"  > 
					<option value="" <?php if (isset($this->get['searchType']) && $this->get['searchType'] == "") {
						echo  "selected=selected" ; } ?> > Type </option>  
 					<option value="01" <?php if (isset($this->get['searchType']) && $this->get['searchType'] == "01") {
						echo  "selected=selected" ; } ?> >01-Fact</option>  
					<option value="21" <?php if (isset($this->get['searchType']) && $this->get['searchType'] == "21") {
						echo  "selected=selected" ; } ?> >21-Avoir </option>  
					<option value="22" <?php if (isset($this->get['searchType']) && $this->get['searchType'] == "22") {
						echo  "selected=selected" ; } ?> >22-Reglt</option>  
					<option value="06"  <?php if (isset($this->get['searchType']) && $this->get['searchType'] == "06") {
						echo  "selected=selected" ; } ?> >06-OD Deb</option>  
					<option value="26" <?php if (isset($this->get['searchType']) && $this->get['searchType'] == "26") {
						echo  "selected=selected" ; } ?> >26-OD Créd</option>  
				</select> 
			</td>			 
			<td>   <!-- num cli : on recharge la valeur de filtre pr�cedente -->	
  				<input class="searchNumeroCli" type="text"  name="searchNumeroCli" id="searchNumeroCli" placeholder="Numéro Client " size="15" 
  				       <?php if (isset($this->get['searchNumeroCli']) && $this->get['searchNumeroCli'] != "") 
  				       			{ echo "value=".$this->get['searchNumeroCli'] ; }
  				       ?>  />  
				 
			</td>	  <!-- nom cli -->		 
  			<td>		 
  				<input type="text" name="searchNom" id="searchNom" placeholder="Nom Client" size="15" 
					  <?php if (isset($this->get['searchNom']) && $this->get['searchNom'] != "") 
  				       			{ echo "value=".$this->get['searchNom'] ; }
  				       ?>  />  
  			</td>			   
 			<td>	  <!-- facture -->	 
				<input type="text" name="searchFact" id="searchFact" placeholder="Numéro Facture " size="12"  
				 	   <?php if (isset($this->get['searchFact']) && $this->get['searchFact'] != "") 
  				       			{ echo "value=".$this->get['searchFact'] ; }
  				       ?>   />
			</td>			 
			<td>	 <!-- devise --> 	 
				<input type="text" name="searchDev" id="searchDev" placeholder="Devise" size="15"  
					<?php if (isset($this->get['searchDev']) && $this->get['searchDev'] != "") 
  				       			{ echo "value=".$this->get['searchDev'] ; }
  				       ?>  />
			</td>			 
			<td> 	 <!--   CGA  -->
				<select name="searchCga" id="Statut"  >
					<option value=""   <?php if (isset($this->get['searchCga']) && $this->get['searchCga'] == "") {
						echo  "selected=selected" ; } ?> > Champ CGA </option> 
					<option value="00"  <?php if (isset($this->get['searchCga']) && $this->get['searchCga'] == "00") {
						echo  "selected=selected" ; } ?> > Vide </option> 
					<option value="01"  <?php if (isset($this->get['searchCga']) && $this->get['searchCga'] == "01") {
						echo  "selected=selected" ; } ?> > Non vide </option>		
				</select> 				 
			</td>
			<td>      <!-- Statut -->
				<select name="searchStatut" id="Statut"  > 
						<option value=""   <?php if (isset($this->get['searchStatut']) && $this->get['searchStatut'] == "") {
						echo  "selected=selected" ; } ?> > Statut </option>  
						<option value="00" <?php if (isset($this->get['searchStatut']) && $this->get['searchStatut'] == "00") {
						echo  "selected=selected" ; } ?> >00-Nouveau</option>
						<option value="09" <?php if (isset($this->get['searchStatut']) && $this->get['searchStatut'] == "09") {
						echo  "selected=selected" ; } ?> >09-Bloque</option>  
						<option value="10" <?php if (isset($this->get['searchStatut']) && $this->get['searchStatut'] == "10") {
						echo  "selected=selected" ; } ?> >10-Pret </option>  
						<option value="20" <?php if (isset($this->get['searchStatut']) && $this->get['searchStatut'] == "20") {
						echo  "selected=selected" ; } ?> >20-Cede</option>  
						<option value="80" <?php if (isset($this->get['searchStatut']) && $this->get['searchStatut'] == "80") {
						echo  "selected=selected" ; } ?> >80-Lettre</option>  
				</select> 
			</td>
			<td>	
 				<input type="submit"  value="Rechercher"/>
 			</td>
 		</form>
 		<form   method="get">
			<td> 
				<input type="hidden" name="controller" value="index" /> 
 				<input type="hidden" name="action" value="afficheLivre" />	 
				<input type="hidden" name="divi" value="<?php echo $this->get['divi'];?>"/> 
				<input type="submit" class="razFiltre" value="RaZ Filtre"/>
			</td>			 
		</form>
		<!--  
			<td>
		<form method="get">		 	 
			<input type="submit" class="exportCsv" value="Export en csv"/>
		</form>
			</td> -->
		</tr>
	  </table>  
	 
</div>

 
	
<!-- Affiche grand Livre -->
<div class='bootstrap-table' id="">
	<div class="fixed-table-container">
		 
		<table id="monGrandLivre"  class="tablesorter table table-striped table-bordered " >
			<thead> 
					<tr  class=".noExl"> 
						<th>   </th>
						<th colspan="2" style="text-align:center"> C l i e n t </th>
						<th colspan="6" style="text-align:center"> F a c t u r e </th>
						<th colspan="3"  style="text-align:center"> C o m p t a </th>
						<th colspan="4" style="text-align:center" >  C G A  </th>
				 	</tr>	
				
					<tr >	
						<th> Tp</th>
						<th> Code </th>
						<th> Nom </th>
						<th> No </th>
						<th> Solde </th>
						<th> Dev </th>
						<th> Solde € </th>
						<th> Dt Fact </th>
						<th> Dt Ech. </th>
						<th> Jrn</th>
						<th> Pce </th>
						<th> Date  </th>
						<th> CGA </th>
						<th> Stt </th>
						<th> Date</th>
						<th> Action </th>
					</tr>
			 </thead> 
			<tbody>
	<?php

	if (isset($this->get["divi"]) && !empty($this->get["divi"]) ) 
	{
		if(!empty($GrdLivre)) {
		
	?>		
		
		<?php
		foreach ($GrdLivre as $unePiece) {	
		 
		?>	
		
			<tr>	
				<!--td><form class="formBloq" method="get"> <input type="checkbox" name="statut[]" value="statut[]" class="statut"> </form></td--> 
				<td class="text-center typPiece"><?php echo $unePiece["ZZTYPEPIECE"];?></td> 
				<td  class="numCliPiece"><?php echo $unePiece["ESCUNO"];?> </td> 
				<td  class="cliPiece"><?php echo $unePiece["ESCUNM"];?></td>
				<td  class="numPiece" title="<?php echo $unePiece["ZZTEXTE"];?>"><?php echo $unePiece["ESCINO"];?></td> 
				<td class="soldPiece text-right"><?php echo $unePiece["ZZSOLDE"];?></td> 
				<td class="devPiece"><?php echo $unePiece["ESCUCD"];?></td> 
				<td class="soldEuroPiece text-right"><?php echo $unePiece["ZZSOLDEEUR"];?></td> 
				<td class="dtFactPiece"><?php echo $unePiece["ESIVDT"];?></td> 
				<td class="dtEchPiece"><?php echo $unePiece["ESDUDT"];?></td> 
				<td class="jrnlPiece"><?php echo $unePiece["ESVSER"];?></td> 
				<td class="piece"><?php echo $unePiece["ESVONO"];?></td> 
				<td class="dtcptPiece"><?php echo $unePiece["ESACDT"];?></td> 
				<td class="flagPiece text-center"><?php echo $unePiece["ZZFLAGCGA"];?></td> 
				<td class="statPiece text-center statNew"><?php echo $unePiece["ZZSTATUT"];?></td> 
				<td class="dateCessPiece text-center"><?php echo $unePiece["ZZCESSDAT"];?></td> 
				<td>
    				<!--pour passer la cle a ajax -->															 
					<input type="hidden"  class="id" data-id="<?php echo $unePiece['ZZSOURCE']
					                                        ."|".$unePiece['ESJRNO']											 
					 										."|".$unePiece['ESJSNO'] 
					                                        ."|".$unePiece['ESYEA4'] 	
															."|".$unePiece['ESDIVI'];?>" 	/>						
				<?php if ($unePiece["ZZSTATUT"] == '10') { ?>
					<INPUT TYPE="submit" class="btn-info center-block updateStat" value="Bloquer"/>
				<?php } else if ($unePiece["ZZSTATUT"] == '09') { ?>
					<INPUT TYPE="submit" class="btn-warning center-block updateStat" value="Debloquer"/>
				<?php }  ?>
				 
				</td>
			</tr>
			
	<?php	} ?>	  
	
 
	<?php			} else {
			echo "<tr><td>aucune pièce du grand livre trouvée</td></tr>";
		} 		
		
	 } 
	?>		
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
