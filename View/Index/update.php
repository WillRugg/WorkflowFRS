<?php

ob_start();
  	
 
	if  (isset($this->get['succes'])) 
	{ 
		echo $this->get['succes'];
		echo '<SCRIPT language="Javascript">alert(\''.$this->get['succes'].'\', \'Information !\');</SCRIPT>' ;			
	}

	elseif (isset($this->get['transa'])) 
	{
		echo $this->get['transa'];
		echo '<SCRIPT language="Javascript">alert(\''.$this->get['transa'].'\', \'Information !\');</SCRIPT>' ;				
	}
	elseif (isset($this->get['connexion']))
	{
		echo $this->get['connexion'];
		echo '<SCRIPT language="Javascript">alert(\''.$this->get['connexion'].'\', \'Information !\');</SCRIPT>' ;		
	} 

?>
 

	<form action = "" class='formUpdate' id="formUpdate" method='post' enctype="multipart/form-data"> 
	<div>  &nbsp;&nbsp; </div>

<!--<input type="hidden" name="controller" value="index" /> 
 		<input type="hidden" name="action" value="creeFournisseurs" />	 -->
		<legend class="scheduler-border">
			<div class="well" >

       		
       		<h2><span class="glyphicon glyphicon-pencil"></span> <?php if(isset($session) && $session=='fournisseur'){ ?> Bonjour, veuillez remplir les informations relatives à <?php echo $UnFournisseur['raisonSociale'];?> <?php } else { ?> &nbsp;&nbsp; 
       				<?php if($this->get['genre'] == 'G')  { echo "Fiche Fournisseur Frais Généraux à compléter"; } 
       				elseif ($this->get['genre'] == 'I')  { echo "Fiche Fournisseur Industriel à compléter"; }  
       				elseif ($this->get['genre'] == 'M')  {  echo "Fournisseur M3 à modifier "; } } ?> </h2>
			</div>
		</legend>	 
	
		<fieldset class = "thumbnail" <?php if(isset($session) && $session=='fournisseur'){ ?>style="display: none;"<?php }else{	}?>>
			
		<!-- partie user non modifiable -->	
			<div class="col-sm-12 ">
				<!--<input type="hidden" name="origine" id="origineHidden" value="<?php echo $origine ?>" /> -->
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Entité</label>
				 	<!-- afficher nom entite -->
                	 <input type="text" name ="entiteDemandeur" class="form-control" id="entiteDemandeur" 
			           	value="<?php echo $UnFournisseur['entite'] ?> " readonly >
				</div>

				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput"> Adresse Mail du Demandeur</label>
				    <input type="text" name="nomDemandeur" class="form-control" id="nomDemandeur"  
				    		value="<?php echo $UnFournisseur['nomDemandeur'];?>" size="36" maxlength="36" readonly>
				</div>

				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Fonction</label>
				    <input type="text"  name ="fonctionDemandeur" class="form-control" id="fonctionDemandeur" size="36" maxlength="36" 
				           value=" <?php echo $UnFournisseur['fonction'] ;?>   " readonly >
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
		   						size="255" maxlength="255" readonly><?php echo $UnFournisseur['raisonDemande'];?></textarea>
		   		</div>  
   			</div>

   		</fieldset>

 
   		<fieldset class="col-sm-12 control-label thumbnail">
 			<div class="col-sm-12">	<legend class="scheduler-border">Identification - Informations Fournisseur</legend>
	   			
	   			<div class="form-group col-sm-12">
			   		<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput2" >Siren</label>
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
				    	<input type="text" class="form-control" id="rueCommande" name="rueCommande" size="36" maxlength="36f"
				    			value="<?php echo $UnFournisseur['voieRue'];?>" >
			    	</div>
		    		<!-- Complément Rue -->
		    		<div class="form-group col-sm-10">
				    	<label for="formGroupExampleInput2"> Complément Voie/Rue </label>
				    	<input type="text" class="form-control" id="rue2Commande" name="rue2Commande" size="36" maxlength="36"
				    	        value="<?php echo $UnFournisseur['voieRueComplement'];?>">
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
						foreach ($array['pays'] as $unPays) {
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
	 				  	<input type="text" class="form-control" id="telephone" size="15" maxlength="15" name="telephone" 
	 				  			value="<?php echo $UnFournisseur['telephone'];?>" >
	 				</div>
	 				<!--
	 				<div class="form-group col-sm-4">
	 					<label for="formGroupExampleInput2">Fax</label>
	 				  	<input type="text" class="form-control"  id="fax" name="fax" size="15" maxlength="15" value="<?php echo $UnFournisseur['fax'];?>">
	 				</div>
					<div class="form-group col-sm-4">
						<label for="formGroupExampleInput2">Site internet</label>
	 				  	<input type="text" class="form-control"  id="site" name="site"  size="36" maxlength="36" 
	 				  			value="<?php echo $UnFournisseur['siteInternet'];?>">
	 				</div> -->
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
		    	<!-- Complément Rue Paiement -->
	    	 	<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2"> Complément Voie/Rue</label>
			    	<input type="text" class="form-control" id="rue2Paiement" name="rue2Paiement"  size="36" maxlength="36" 
			    		   value="<?php echo $UnFournisseur['voieRuePaiementComplement'];?>">
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
			    		<option value ="" >  Sélection un pays </option>
				    	<?php
							foreach ($array['pays'] as $unPays) {
						?>
							<option value=<?php  echo $unPays["CODE"];?>
								<?php if($UnFournisseur['paysPaiement']==$unPays["CODE"]) { ?> selected="selected" <?php } ?> > 
								<?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
						<?php 
						}
						?>
                    </select> 
                </div>
                <div cl lass="form-group col-sm-12">
			 		<div <?php if(isset($session) && $session=='fournisseur' || $this->get['genre'] == 'G'){ ?>style="display: none;"<?php }else{	}?> class="col-sm-6">
				    	<label for="formGroupExampleInput2">Groupe d'appartenance du Fournisseur</label>
				    	  	<select name="groupeAppartenance"  class="form-control " id="groupeAppartenance"  > 
								<option value ="" > Sans ou Sélectionner une valeur</option>
								<?php
								foreach ($array['groupeAppartenance'] as $unGroupeAppartenance) {
								?>
									<option value=<?php  echo $unGroupeAppartenance["CODE"];?>
									<?php if($UnFournisseur['groupeAppartenance'] == $unGroupeAppartenance['CODE'] ) { ?> selected="selected"	<?php } ?>	>
									<?php echo $unGroupeAppartenance["CODE"].'- '.$unGroupeAppartenance["NOM"];?></option> 
								<?php 
								}
								?>
	                    	</select> 
			    	</div>  
			    	<div <?php if(isset($session) && $session=='fournisseur' || $this->get['genre'] == 'G'){ ?>style="display: none;"<?php }else{	}?> class="col-sm-4">
			  			 <label for="formGroupExampleInput2">Nature du Fournisseur </label>
				    		<select  class="form-control " id="natureFournisseur" name="natureFournisseur"  > 
				    			<option value="100" 
				    				<?php  if ($UnFournisseur['natureFournisseur'] == "100" ) { ?> selected="selected" <?php } ?> > Achats de Production </option>
				    			<option value ="200"
				    		 		<?php  if ($UnFournisseur['natureFournisseur'] == "200" ) { ?> selected="selected" <?php } ?> > Achat sur projet </option>
				    		 	</select>		    	
			   		</div>
		   		</div>
		   		<div class="col-sm-12">&nbsp;</div>
		   		<div class="col-sm-12">
			   		<div class="col-sm-6" <?php if(isset($session) && $session=='fournisseur'){ ?>style="display: none;"<?php }else{	}?>>
				    	<label for="formGroupExampleInput2">Groupe Fournisseur</label>
				    	  	<select name="groupeFournisseur"  class="form-control " id="groupeFournisseur"  > 
								<?php
								foreach ($array['groupeFournisseur'] as $unGroupe) {
								?>
									<option value=<?php  echo $unGroupe["CODE"];?>
									<?php if($UnFournisseur['groupeFournisseur'] == $unGroupe['CODE'] ) { ?> selected="selected"	<?php } ?>	>
									<?php echo $unGroupe["CODE"].'- '.$unGroupe["TXT40"];?></option> 
								<?php 
								}
								?>
	                    	</select> 
			    	</div> 
			    	<div class="col-sm-6" <?php if(isset($session) && $session=='fournisseur'){ ?>style="display: none;"<?php }else{	}?>>
		  		    <label for="formGroupExampleInput2">Langue (Fr ou Gb ) </label>
			    		<select name="langue"  class="form-control " id="langue" > 
							<option value ="FR" <?php  if ($UnFournisseur['langue'] == "FR" ) { ?> selected="selected" <?php } ?> > FR- Français  </option>
							<option value ="GB" <?php  if ($UnFournisseur['langue'] == "GB" ) { ?> selected="selected" <?php } ?> > GB- Anglais   </option> 
                    	</select>		    	
			   	</div>
			    </div>
 		 	</div>

 		</fieldset>

 		<fieldset <?php if(isset($session) && $session=='fournisseur' || $this->get['genre'] == 'G'){ ?>style="display: none;"<?php }else{	}?> class="col-sm-12 control-label thumbnail">
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
						foreach ($array['conditionLivraison'] as $uneConditionLivraison) {
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
		     					  value="<?php echo $UnFournisseur['motifDerogationHorsGroupe'];?>"><?php echo $UnFournisseur['motifDerogationHorsGroupe'];?> 
		     			</textarea>
	    	 		</div>
    	 		</div>
    	 	</div>
    	</fieldset>


    	<!-- Type produits -->
    	<fieldset class="col-sm-12 control-label thumbnail" <?php if(isset($session) && $session=='fournisseur'){ ?>style="display: none;"<?php }else{	}?>>
	 	<div class="col-sm-12">

	   		<legend class="scheduler-border">Type de produits</legend>	
	   		
	   		<div class="col-sm-12">
   				<div class="col-sm-12">
			   
		   		<div class="col-sm-12">
			   	   	<div class="col-sm-6"><label class="scheduler-border">Type Produit </label>
			     		<select name="typeProduit"  class="form-control " id="typeProduit" required <?php  if ($this->get['genre'] == 'G'){ ?> style="display: none" <?php } ?> > > 
					   		<option value = "01" <?php  if ($UnFournisseur['BSSTypeProduit'] == "01" ) { ?> selected="selected" <?php } ?> > Biens </option>
					   		<option value = "08" <?php  if ($UnFournisseur['BSSTypeProduit'] == "08" ) { ?> selected="selected" <?php } ?> > Frais Généraux Européen  </option>
					   		<option value = "17" <?php  if ($UnFournisseur['BSSTypeProduit'] == "17" ) { ?> selected="selected" <?php } ?>  Fournisseur Espagne  </option>
					   		<option value = "??" <?php  if ($UnFournisseur['BSSTypeProduit'] == "??" ) { ?> selected="selected" <?php } ?> > Service  </option>
					   		<option value = "12" <?php  if ($UnFournisseur['BSSTypeProduit'] == "12" ) { ?> selected="selected" <?php } ?> > Exonere  </option>
					   		<option value = "00" <?php  if ($UnFournisseur['BSSTypeProduit'] == "00" ) { ?> selected="selected" <?php } ?> > Sans TVA (ex: auto entrepreneur) </option>
		 		   	   	</select>
		 		   	   	<input type="text"  class="form-control" id="typeProduit"  name="typeProduit"  value='07 - TVA à 20% sur encaissement'  
			   			 readonly <?php  if  ($this->get['genre'] == 'I' ){ ?> style="display: none" <?php } ?>>   		
			     	</div>

					<!-- Objet Comptable -->
			     	<div class="form-group col-sm-6">
			     		<label class="scheduler-border">Objet Comptable </label>
			     		<select name="objetComptable"  class="form-control " id="objetComptable" required> 
					   		<option value = "HG " <?php  if ($UnFournisseur['objetComptable'] == "HG " ) { ?> selected="selected" <?php } ?>  > 
					   						 HG - Frs France ou Frs Etranger Succursale </option>
					   		<option value = "HGE" <?php  if ($UnFournisseur['objetComptable'] == "HGE" ) { ?> selected="selected" <?php } ?>  > 
					   						 HGE- Frs Européen hors France </option>
					   		<option value = "HGX" <?php  if ($UnFournisseur['objetComptable'] == "HGX" ) { ?> selected="selected" <?php } ?>  > 
					   						 HGX- Frs hors Europe </option>		 
		 		   	   	</select>  		
			     	</div>
			    </div>
			    <div class="col-sm-12" >
			    	<div class="col-sm-6" >
			   			<label for="formGroupExampleInput2" > Mode de règlement  </label> 	
			   		</div>
		    	 	<div class="col-sm-6" >
			   			<label for="formGroupExampleInput2" >Délai de règlement  </label> 	
			   		</div>
			   	</div>
			   	<div class="col-sm-12" >
		    		<div class="col-sm-6"> 
						<select name="modeReglement"  class="form-control " id="reglementGroupe"  > 
							<?php
							foreach ($array['modeReglement'] as $unModeReglement) {
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
			   		<div class="col-sm-6"> 
				   		<select name="conditionReglementHG"  class="form-control " id="conditionReglementG" > 
				   			<?php
							foreach ($array['conditionReglement'] as $uneConditionReglement) {
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
		  		<div class="col-sm-12"> &nbsp;	 </div>
				<div class="col-sm-12">
			   		<div class="col-sm-6" >
			   			<label for="formGroupExampleInput2" >Devise</label>
			   		</div>
			   		 <p class="col-sm-6" style="font-size: 12px"> * Accord nécéssaire du DAF si mode de règlement non standard(Traite à 45JFDM) </p>		
			   	</div>
				 

		   		<div class="col-sm-12">	 
				 	<div class="col-sm-6">
				 		<select name="deviseHG"  class="form-control " id="devise" > 
					 		<?php
					 		  
							foreach ($array['devise'] as $uneDevise) {
							?>
							<option value=<?php  echo $uneDevise["CODE"];?>	<?php if($UnFournisseur['devise'] == $uneDevise['CODE'] ) { ?> selected="selected" <?php } ?> >
								<?php echo $uneDevise["CODE"].'- '.$uneDevise["TXT40"];?>
							</option> 
							<?php 
							}
							?>
		   		    	</select> 
		   		    		 
		   		    </div>
    	 		 	<p class="col-sm-6" style="font-size: 12px"> * Joindre un RIB pour les fornisseurs étrangers  </p>	
			   	</div>

	   		</div>

    	</div>
    	</fieldset>

    	<!-- RIB -->
    	<fieldset class="col-sm-12 control-label thumbnail" >
	 		<div class="col-sm-12">
		   		<legend class="scheduler-border">R I B</legend>	
		   		<div class="col-sm-12">

			   	   	<div class="col-sm-5">
			     		
			     			<label for="form-control">Identite Bancaire par pays</label>	
					   		<select class="form-control" name="idBanq"  id="idBanq"  >   
								<?php
								foreach ($array['idBanq'] as $uneIdBanq) {
								?>
								<option value=<?php  echo $uneIdBanq["CODE"];?><?php if($UnFournisseur['identiteBanquePays'] == $uneIdBanq['CODE']) { ?> selected="selected" <?php } ?> >
									<?php echo $uneIdBanq["CODE"].'- '.$uneIdBanq["TXT40"];?>
								</option> 
							<?php 
							}
							?>
			   		    </select>		   		    
	 		   		</div>
	 		   		<div  class="col-sm-6" style="text-align: center;">
				   		<label for="formGroupExampleInput2"> Nom de la Banque </label>	
				   		<input type="text"  class="form-control" id="nomBanq" name="nomBanq"  size="36" maxlength="36" 
				   			   value="<?php echo $UnFournisseur['nomBanque'];?>" > 
				   	</div>
				</div>
    	 		<div class="col-sm-6 "> &nbsp;    	   	 	</div>
    	 		<div class="col-sm-12">
			   		<div class="form-group  col-sm-2" style="text-align: center;">
			   			<label for="formGroupExampleInput2"> Code Banque </label>	
			   			<input type="text"  class="form-control" id="codeBanq" name="codeBanq"  size="5" maxlength="5"  value="<?php echo $UnFournisseur['codeBanque'];?>" > 
			   		</div>
					<div class="form-group col-sm-3" style="text-align: center;">
			     	 	<label for="formGroupExampleInput2" >  Code Etablissement </label>	
		    			<input type="text"  class="form-control" id="etabBanq" name="etabBanq"  size="5" maxlength="5"  value="<?php echo $UnFournisseur['etablissementBanque'];?>" > 
		    		</div>
	    			<div class="form-group col-sm-4" style="text-align: center;">
	    				<label for="formGroupExampleInput2" > N° Compte </label>
	    				<input type="text"  class="form-control" id="numCompte" name="numCompte"  size="11" maxlength="11"  value="<?php echo $UnFournisseur['numeroCompteBanque'];?>"  > 
	    			</div>
			   		<div class="form-group  col-sm-2" style="text-align: center;">
			   			<label for="formGroupExampleInput2" > Clé </label>	
			   			<input type="text"  class="form-control" id="cleCompte" name="cleCompte"  size="2" maxlength="2"  value="<?php echo $UnFournisseur['cleCompteBanque'];?>" > 
			   		</div>
		   		</div>

				<div class="col-sm-6 "> &nbsp;		   	</div>
				<div class="col-sm-12">
			   		<div class="form-group col-sm-7" style="text-align: center;">
			     	 	<label for="formGroupExampleInput2" > IBAN </label>	
		    			<input type="text"  class="form-control" id="iban" name="iban"  size="27" maxlength="27"  value="<?php echo $UnFournisseur['iban'];?>" >  
		    		</div>
				   	<div class="form-group  col-sm-4" style="text-align: center;">
			   			<label for="formGroupExampleInput2"> SWIFT </label>	
			   			<input type="text"  class="form-control" id="swift" name="swift"  size="11" maxlength="11"  value="<?php echo $UnFournisseur['swift'];?>" >  
			   		</div>
				</div>
	   

    	</fieldset>
 
    	<fieldset class="col-sm-12 control-label thumbnail" <?php if(isset($session) && $session=='fournisseur' || $this->get['genre'] == 'G'){ ?>style="display: none;"<?php }else{	}?>>
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
			   		<div class="form-group col-sm-4">
			   			<label for="formGroupExampleInput2"> Bilan </label>	<?php if(!empty($UnFournisseur['bilan'])){
			  	 		?>	<a href="Ressources/files/<?php echo $UnFournisseur['bilan']; ?>"> - Ouvrir le fichier </a>
				  	 	<?php } else{ ?> - Aucun fichier chargé <?php } ?>
					</div>
					<div class="form-group col-sm-4">
							<label class="formGroupExampleInput2">  Rib </label> <?php if(!empty($UnFournisseur['fileRib'])){
							?>	<a href="Ressources/files/<?php echo $UnFournisseur['fileRib']; ?>"> - Ouvrir le fichier </a>
							<?php } else{ ?> - Aucun fichier chargé <?php } ?>
					</div>
					<div class="form-group col-sm-4">
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
	    
	  	
		<a href="" onclick="<?php if($session=='admin') {?> return(confirm('Envoyer vers M3 ?')) <?php } else { ?> return(confirm('Confirmer la mise à jour ?')) <?php } ?>  ;">   
			<INPUT TYPE="submit" class="btn btn-info <?php if(isset($session) && $session=='fournisseur'){?> col-sm-offset-4 col-sm-4  <?php }else{?>  col-sm-offset-1 col-sm-5 <?php	}?>" 
			value="Valider" name="Valider"/>
		</a>

		<a href="" onclick="return(confirm('Mettre à jour et mettre en attente ?'));">   
			<INPUT <?php if(isset($session) && $session=='fournisseur'){ ?>style="display: none;"<?php }else{	}?> TYPE="submit" class="btn btn-info col-sm-offset-1 col-sm-5" name="Attente" value="Mettre en attente"/>
		</a>
	   
	</form>
   		 	
	<div class="col-md-8">&nbsp; </div>
 
 	

<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/mainConnect.php') ;
 ?>