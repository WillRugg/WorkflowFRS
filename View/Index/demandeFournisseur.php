<?php

ob_start();
 //var_dump($session);

 

?>
<div id="container">

	<form method='post' enctype="multipart/form-data"> 

<!--<input type="hidden" name="controller" value="index" /> 
 		<input type="hidden" name="action" value="creeFournisseurs" />	 -->
		<legend class="scheduler-border">
       		<h2><span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp; Fiche fournisseur à compléter</h2>
		</legend>	 
	
		<fieldset class =  "thumbnail">
			<div class="col-sm-12 ">
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Entité</label>
				     	<select name="entiteDemandeur"  class="form-control " id="entiteDemandeur"  > 
							<?php
							foreach ($entite as $uneEntite) {
								/* value permet de récupérer la valeur pour le name  => on y met la divi*/
							?>  
								<option value=<?php  echo $uneEntite["CCDIVI"];?>
								<?php if($UnFournisseur['entite']==$uneEntite["CCDIVI"]) { ?> selected="selected" <?php } ?> > 
								<?php echo $uneEntite["CCDIVI"].'-'.$uneEntite["CCCONM"];?>  
								</option> 
					 		<?php
							}
							?>
                    </select> 

				</div>
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput">Nom du demandeur </label>
				    <input type="text" name="nomDemandeur" class="form-control" id="nomDemandeur"  
				    		value="<?php echo $UnFournisseur['nomDemandeur'];?>" size="36" maxlength="36" required>
				</div>
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Fonction</label>
				    <input type="text"  name ="fonctionDemandeur" class="form-control" id="fonctionDemandeur" size="36" maxlength="36" 
				           value=" <?php echo $UnFournisseur['fonction'] ;?>   " >
			    </div>
		    </div>
			 
	 		<div class="col-sm-12">
				<div class="form-group col-sm-3">
	 				<label for="formGroupExampleInput2">Date</label>
	 				<input type="text" name="dateJour" class="form-control" id="dateJour" value="<?php echo $UnFournisseur['dateDemande'];?>"  readonly  > 

	 			</div>       
	     	<div class="form-group col-sm-9">
	 			<label for="exampleTextarea">Raison de la demande</label>
	   			<textarea class="form-control" id="raisonDemande"  name="raisonDemande" rows="4" 
	   						 	size="255" maxlength="255" ><?php echo $UnFournisseur['raisonDemande'];?></textarea>
	   		</div>  
   		</div>
   		</fieldset>

 
   		<fieldset class="col-sm-12 control-label thumbnail">
 			<div class="col-sm-12">	<legend class="scheduler-border">Identification - Informations Fournisseur</legend>
	   			<div class="form-group col-sm-12">
			   		<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput2" >Siret</label>
					    <input type="text" class="form-control" id="siret" name ="siret" value="<?php echo $UnFournisseur['siret'];?>"  size="9" maxlength="9"  >
					</div>
					<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput"> Complément Siret </label>
					    <input type="text" class="form-control" id="complement"  name="complement"  size="5" maxlength="5" 
					    	 value="<?php echo $UnFournisseur['complementSiret'];?>" >
					</div>
					<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput2">TVA</label>
					    <input type="text" class="form-control" id="tvaIntra" name="tvaIntra" size="15" maxlength="15" 
					    		value="<?php echo $UnFournisseur['tva'];?>">
					</div> 
		    	</div>
 		
   			<div class="col-sm-12 "><legend class="scheduler-border">Adresse de commande</legend>
	   		 	<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Raison Sociale</label>
			    	<input type="text" class="form-control" id="rsCommande" name ="rsCommande" size="36" maxlength="36" 
			    			value="<?php echo $UnFournisseur['raisonSociale'];?>" required>
		    	</div>

		   		<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Voie/Rue</label>
			    	<input type="text" class="form-control" id="rueCommande" name="rueCommande" size="36" maxlength="36"
			    			value="<?php echo $UnFournisseur['voieRue'];?>" >
		    	</div>
	    	
		        <div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Code Postal</label>
			    	<input type="text" class="form-control" id="codePostal" name="codePostal" size="5" maxlength="5" 
			    			value="<?php echo $UnFournisseur['codePostal'];?>"  >
		    	</div>
		    	<div class="form-group col-sm-6">
			    	<label for="formGroupExampleInput2">Ville</label>
			    	<input type="text" class="form-control" id="villeCommande" name="villeCommande" size="36" maxlength="36"
			    			value="<?php echo $UnFournisseur['ville'];?>"  required>
		    	</div>
		    			    
		  		<div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Pays</label>
			    	<select name="paysCommande"  class="form-control " id="paysCommande"  > 
						<?php

						foreach ($pays as $unPays) {

							
							?>
								<option value=<?php  echo $unPays["CODE"];?>
									<?php if($UnFournisseur['pays']==$unPays["CODE"]) { ?> selected="selected" <?php } ?> > 
									<?php echo $unPays["CODE"].'- '.$unPays["TXT15"]; ?>		
								</option> 
							<?php 
							}	
							?>							
                    </select> 
			      </div>
		    	<div class="form-group col-sm-4">
		    		<label for="formGroupExampleInput2">Téléphone</label>
 				  	<input type="text" class="form-control" id="telephone" size="12" maxlength="12" name="telephone" 
 				  			value="<?php echo $UnFournisseur['telephone'];?>" >
 				</div>
 				<div class="form-group col-sm-4">
 					<label for="formGroupExampleInput2">Fax</label>
 				  	<input type="text" class="form-control"  id="fax" name="fax" size="12" maxlength="12" value="<?php echo $UnFournisseur['fax'];?>">
 				</div>
				<div class="form-group col-sm-4">
					<label for="formGroupExampleInput2">Site internet</label>
 				  	<input type="text" class="form-control"  id="site" name="site"  size="36" maxlength="36" 
 				  			value="<?php echo $UnFournisseur['siteInternet'];?>">
 				</div>
			</div>
 			</div>
	 		<div class="col-sm-12 ">
	   		<legend class="scheduler-border">Adresse de Paiement</legend> 
	   		 	<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Raison Sociale</label>
			    	<input type="text" class="form-control" id="rsPaiement" name="rsPaiement" size="36" maxlength="36" 
			    			value="<?php echo $UnFournisseur['raisonSocialePaiement'];?>">
		    	</div>
		   		<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Voie/Rue</label>
			    	<input type="text" class="form-control" id="ruePaiement" name="ruePaiement"  size="36" maxlength="36"  
			    			value="<?php echo $UnFournisseur['voieRuePaiement'];?>">
		    	</div>
	    	 
		        <div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Code Postal</label>
			    	<input type="text" class="form-control" id="cpPaiement"  name="cpPaiement" size="5" maxlength="5" 
			    			value="<?php echo $UnFournisseur['codePostalPaiement'];?>">
		    	</div>
		    	<div class="form-group col-sm-6">
			    	<label for="formGroupExampleInput2">Ville</label>
			    	<input type="text" class="form-control" id="villePaiement"  name="villePaiement" size="36" maxlength="36" 
			    			value="<?php echo $UnFournisseur['villePaiement'];?>">
		    	</div>
		  		<div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Pays</label>
			    	<select name="paysPaiement"  class="form-control " id="paysPaiement"  > 
				    	<?php
							foreach ($pays as $unPays) {
						?>
								<option value=<?php  echo $unPays["CODE"];?>
											<?php if($UnFournisseur['paysPaiement']==$unPays["CODE"]) { ?> selected="selected" <?php } ?> > 
											<?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
						<?php 
						}
						?>
                    </select> 
                </div>
		 		<div class="col-sm-4">
			    	<label for="formGroupExampleInput2">Groupe d'appartenance du Fournisseur</label>
			    	  	<select name="groupeFournisseur"  class="form-control " id="groupeFournisseur"  > 
							<option value ="" >Sélectionner une valeur</option>
							<?php
							foreach ($groupeFournisseur as $unGroupe) {
							?>
								<option value=<?php  echo $unGroupe["CODE"];?>
								<?php if($UnFournisseur['groupeAppartenance'] == $unGroupe['CODE'] ) { ?> selected="selected"	<?php } ?>	>
								<?php echo $unGroupe["CODE"].'- '.$unGroupe["TXT40"];?></option> 
							<?php 
							}
							?>
                    	</select> 
		    	</div>  
		    	<div class="col-sm-6">
		  			 <label for="formGroupExampleInput2">Nature du Fournisseur </label>
			    		<select  class="form-control " id="natureFournisseur" name="natureFournisseur"  > 
			    			<option value=" " 
			    				<?php  if ($UnFournisseur['natureFournisseur'] == " " ) { ?> selected="selected" <?php } ?> >Sélectionner une Nature</option>
			    			<option value="PRODUCTION" 
			    				<?php  if ($UnFournisseur['natureFournisseur'] == "PRODUCTION" ) { ?> selected="selected" <?php } ?> >Production</option>
			    		 	<option value ="FRAISGEN"
			    		 	<?php  if ($UnFournisseur['natureFournisseur'] == "FRAISGEN" ) { ?> selected="selected" <?php } ?> >Achat de frais généraux</option>
						</select>		    	
		   	</div>
 		 </div>

 		</fieldset>

 		<fieldset class="col-sm-12 control-label thumbnail">
 			<div class="col-sm-12">		 
		   		<legend class="scheduler-border">Conditions Logistiques</legend>
		   		<div class="col-sm-12">	
			   		<div class="form-group col-sm-6">
			   			<label for="formGroupExampleInput2"> Règles Groupe </label>	
					</div>
					
    			</div>
    			<div class="col-sm-offset-2 col-sm-8" > <label for="incoterm ">Incoterm (Conditions Livraison)</label>	</div>
				<div class="form-group col-sm-12">
				    <div class="col-sm-6"> 
				   		<select name="incotermGroupe"  class="form-control" id="incotermGroupe"  >
				   			
						<?php
						foreach ($conditionLivraison as $uneConditionLivraison) {
						?> 
							<option value=<?php  echo $uneConditionLivraison['CODE'] ;?>
							<?php  if ($uneConditionLivraison['CODE'] == $UnFournisseur['incoterm'] ) {?> selected="selected" <?php } ?> >
							<?php echo utf8_encode($uneConditionLivraison["CODE"]).'- '.utf8_encode($uneConditionLivraison["TXT15"]);?>
							</option> 
						<?php 
						}
						?>
		   		    	</select>
		   		    </div>
		     	</div>
	     	
		     	<div class="col-sm-12">
		    	 	<div class="form-group col-sm-6">
					    <label for="formGroupExampleInput2" >Lieu(ville) </label>	
			   		    <input type="text"  class="form-control" id="lieu" name="lieu" size="36" maxlength="36" 
			   		    		value="<?php echo $UnFournisseur['lieuVilleRegleGroupe'];?>"> 
					    <label for="formGroupExampleInput2" >Franco de Port (à partir de) </label>	
			   		    <input type="text"  class="form-control" id="montant" name="montant" size="15" maxlength="15" 
			   		    		value="<?php echo $UnFournisseur['francoDePortRegleGroupe'];?>"> 
		    		</div>
	    	 		<div class="form-group col-sm-6">
		     			<textarea class="form-control" id="motifDero" rows="2" name="motifDero" size="255" maxlength="255"  
		     						value="<?php echo $UnFournisseur['motifDerogationHorsGroupe'];?>"><?php echo $UnFournisseur['motifDerogationHorsGroupe'];?> </textarea>
	    	 		</div>
    	 		</div>
    	 	</div>
    	</fieldset>

    	<fieldset class="col-sm-12 control-label thumbnail">
	 	<div class="col-sm-12">

	   		<legend class="scheduler-border">Type de produits</legend>	
	   	   	<div class="col-sm-4">
	     		<select name="typeProduit"  class="form-control " id="typeProduit" > 
			   		<option value = "">Sélectionner une valeur</option>
			   		<option value = "Bien" <?php  if ($UnFournisseur['BSSTypeProduit'] == "Bien" ) { ?> selected="selected" <?php } ?>>Biens</option>
			   		<option value = "Serv" <?php  if ($UnFournisseur['BSSTypeProduit'] == "Serv" ) { ?> selected="selected" <?php } ?>> Service  </option>
			   		<option value = "Stva" <?php  if ($UnFournisseur['BSSTypeProduit'] == "Stva" ) { ?> selected="selected" <?php } ?>> Sans TVA (ex: auto entrepreneur) </option>
 		   	   	</select>  		

	     	</div>
			
    		<div class="col-sm-offset-2 col-sm-8" >
    			<label for="formGroupExampleInput2" >Mode règlement  </label>
    		</div>

    		<div class="col-sm-12">
        	
	    		  <div class="col-sm-6"> 
			
			   		
	  					<select name="modeReglement"  class="form-control " id="modeReglement"  > 
					<?php
					foreach ($modeReglement as $unModeReglement) {
					?>
						<option value=<?php  echo $unModeReglement["CODE"];?>
						<?php if($UnFournisseur['modeReglement'] == $unModeReglement['CODE'] ) { ?> selected="selected"	<?php } ?>	>
							<?php echo $unModeReglement["CODE"].'- '.$unModeReglement["TXT15"];?>
						</option> 
					<?php 
					}
					?>
	   		    	</select>
	   		    </div>
			</div>	

			<div class="col-sm-offset-2 col-sm-8" >
				<label for="formGroupExampleInput2" >Délai de règlement  </label> 
			</div>

			<div class="col-sm-12">
	    	    <div class="col-sm-6"> 
			   		<select name="conditionReglementHG"  class="form-control " id="conditionReglementHG" > 
			   			<option value="">Sélectionner une valeur</option>
						<?php
						foreach ($conditionReglement as $uneConditionReglement) {
						?>
							<option value=<?php  echo $uneConditionReglement["CODE"];?>
								<?php if($UnFournisseur['conditionReglement'] == $uneConditionReglement['CODE'] ) { ?> selected="selected"	<?php } ?>	>
								<?php echo utf8_encode($uneConditionReglement["CODE"]).'- '.utf8_encode($uneConditionReglement["TXT15"]);?>
							</option> 
						<?php 
						}
						?>
	   		    	</select>
	   		    </div>
	   		</div>

	   		<div class="col-sm-offset-2 col-sm-8" >
	   			<label for="formGroupExampleInput2" >Devise</label>	
	   		</div>

	   		<div class="col-sm-12">	 
			 	<div class="form-group col-sm-8">
				 	<div class="col-sm-6">
				 		<select name="deviseHG"  class="form-control " id="deviseHG" > 
					 		<option value="">Sélectionner une valeur</option>
							<?php
							 
							foreach ($devise as $uneDevise) {
							?>
								<option value=<?php  echo $uneDevise["CODE"];?>
								<?php if($UnFournisseur['devise'] == $uneDevise['CODE'] ) { ?> selected="selected"	<?php } ?>	>
								<?php echo $uneDevise["CODE"].'- '.$uneDevise["TXT40"];?></option> 
							<?php 
							}
							?>
		   		    	</select> 
		   		    </div>
    	 		</div>
	    		<div class="form-group col-sm-12">	
	    		   	<p class="col-sm-4"> * Joindre un RIB pour les fornisseurs étrangers  </p>	
	    		    <p class="col-sm-8"> * Accord nécéssaire du DAF si mode de règlement non standard(Traite à 45JFDM) </p>	
	    		</div>	
	   		</div>
		     	 
    	</div>
    	</fieldset>
    	<fieldset class="col-sm-12 control-label thumbnail">
	 		<div class="form-group col-sm-12">
		   		<legend class="scheduler-border">Informations Suplémentaires</legend>
		   		<div class="form-group col-sm-4">
			        <input type="text"  class="form-control" id="ca" value=" <?php echo $UnFournisseur['ca'];?>" name="ca" size="20" maxlength="20" placeholder="	C.A. "> 	
			    </div>	
			    <div class="form-group col-sm-4">
			        <input type="text"  class="form-control" id="nbreEmployes" name="nbreEmployes"  value="<?php echo $UnFournisseur['nbEmployes'];?>" size="5"   
			        	maxlength="5" placeholder="Nbre employés"> 	
			    </div>	
		   		<div class="form-group col-sm-4">
		   			<select name="iso"  class="form-control " id="iso" > 
		   		 		<option value =""   <?php  if ($UnFournisseur['iso'] == "" )    { ?> selected="selected" <?php } ?>> </option>
						<option value="oui" <?php  if ($UnFournisseur['iso'] == "oui" ) { ?> selected="selected" <?php } ?>> ISO </option>
						<option value="non" <?php  if ($UnFournisseur['iso'] == "non" ) { ?> selected="selected" <?php } ?>> Pas ISO </option>
					</select>		     		   
		     	</div>		
		    </div>   
		  	<div class="form-group  col-sm-12">
			 	<div class="col-sm-12">	
			   		<div class="form-group col-sm-6">
			   			<label for="formGroupExampleInput2"> Bilan </label>	<?php if(!empty($UnFournisseur['bilan'])){
			  	 		?>	<a href="Ressources/files/<?php echo $UnFournisseur['bilan']; ?>"> - Ouvrir le fichier </a>
				  	 	<?php } else{ ?> - Aucun fichier chargé <?php } ?>
					</div>
					<div class="col-sm-6">
				   	 	<label for="formGroupExampleInput2" >  Kbis </label>	<?php if(!empty($UnFournisseur['kbis'])){
				 		?>	<a href="Ressources/files/<?php echo $UnFournisseur['kbis']; ?>"> - Ouvrir le fichier </a>
				  	 	<?php }else{ ?> - Aucun fichier chargé <?php }?>
				    </div>
	    		</div>
	 		</div>
	    </fieldset>
	  	<!-- champ caché pour passer la valeur du domaine => compta pour validation par compta-->
	  	<input type="hidden" class="form-control" id="domaine" name="domaine" value="<?php  echo $session;?>"    >  
	  	<input type="hidden" class="form-control" id="idUpdate" name="idUpdate"  value ="<?php  echo $UnFournisseur["ID"];?>"  >  

	  	
		<a href="" onclick="<?php 
			if($session=='achats')
		 	{?> 
		 		return(confirm('Confirmer la mise à jour ?'))
		 	<?php } 
		 	elseif($session=='compta')
		 	{?> 
		 		return(confirm('Envoyer vers M3 ?')) 
		 	<?php } ?> 		 ;">   
			<INPUT TYPE="submit" class="btn btn-info col-sm-5" value="Valider" name="Valider"/>
		</a>

		<a href="" onclick="return(confirm('Mettre à jour et mettre en attente ?'));">   
			<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 col-sm-5" name="Attente" value="Mettre en attente"/>
		</a>
	   
	</form>
   		 	
	<div class="col-md-8">&nbsp; </div>
</div> 
 	

<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/mainConnect.php') ;
 ?>