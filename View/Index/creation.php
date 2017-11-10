<?php

ob_start();

if (isset($this->get['FRS'])) {
	$origine = $this->get['FRS'];
} else {
		$origine = null;
}
?>
 
 	
	<form action = "" class='formCreate' id="formCreate" method='post' enctype="multipart/form-data">

		<!--<input type="hidden" name="controller" value="index" /> 
 		<input type="hidden" name="action" value="creeFournisseurs" />	 -->
		<legend class="scheduler-border">
			<div class="well" >

       			<h2><span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp; 
       				<?php if ($origine == 'ind' ) { echo "Fiche fournisseur Industriel à compléter" ; }
       				else { echo "Fiche fournisseur  de Frais Généraux à compléter";  } ?>
       			</h2>
       		</div>
		</legend>	 
	
		<fieldset class =  "thumbnail">
			<!-- ligne 1 -->
			<div class="col-sm-12 ">
				<input type="hidden" name="origine" id="origineHidden" value="<?php echo $origine ?>" />
				<!-- Entité -->
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Entité</label>

			     	<select name="entiteDemandeur"  class="form-control " id="entiteDemandeur" data-toggle="tooltip" 
			     	        title="saisie obligation d'une entité du groupe" placeholder="Votre entité" > 
						
						<option value ="" > Sélection une entité </option>
						<option value='060'> 060- COMECA SAS</option>
						<?php
						foreach ($array['entite'] as $uneEntite) {
							/* value permet de récupérer la valeur pour le name  => on y met la divi*/
						?>  
							<option value=<?php  echo $uneEntite["CODE"]?>><?php echo $uneEntite["CODE"].'-'.$uneEntite["TXT40"];?></option> 
						<?php 
						}
						?>
                    </select>  
                </div>
                <!-- Mail -->
				<div class="form-group col-sm-4">
				    <label for=" "> Adresse Mail du Demandeur </label>
				    <input type="text" name="nomDemandeur" class="form-control" id="nomDemandeur" placeholder="Votre adresse mail" data-toggle="tooltip" title="saisie obligatoire de votre adresse mail" size="36" maxlength="36"  > 
				</div>
				<!-- Fonction -->
				<div class="form-group col-sm-4">
				    <label for=" ">Fonction</label>
				    <input type="text"  name ="fonctionDemandeur" class="form-control" id="fonctionDemandeur" size="36" maxlength="36" placeholder="Votre fonction">
			    </div>
		    </div>
			
			<!-- ligne 2 -->  
	 		<div class="col-sm-12">
	 			<!-- Date -->
				<div class="form-group col-sm-3">
	 				<label for="formGroupExampleInput2">Date</label>
	 				<input type="text" name="dateJour" class="form-control" id="dateJour" value=<?php echo $array['today']; ?> 
	 				       placeholder="Date" readonly > 
	 			</div> 
	 			<!-- Raison-->       
	     		<div class="form-group col-sm-9">
		 			<label for="exampleTextarea">Raison de la demande</label>
		   			<textarea class="form-control" id="raisonDemande"  name="raisonDemande" rows="4" placeholder="Détail du besoin" 
		   			          size="255" maxlength="255" >
		   			</textarea>
	   			</div>  
   			</div>
   		</fieldset>

 		<!-- Pavé Identification -->
   		<fieldset class="col-sm-12 control-label thumbnail">
 			<div class="col-sm-12">	<legend class="scheduler-border">Identification - Informations Fournisseur</legend>
 				
 				<!-- ligne 3 --> 
	   			<div class="form-group col-sm-12">
	   				<!-- Siren -->
			   		<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput2" >Siren</label>
					    <input type="text" class="form-control" id="siret" name ="siret"  size="9" maxlength="9" placeholder="Siren" >
					</div>
					<!-- Complément -->
					<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput"> Complément Siret </label>
					    <input type="text" class="form-control" id="complement"  name="complement"  size="5" maxlength="5" 
					           placeholder="Complément Siret">
					</div>
					<!-- Tva Intra -->
					<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput2">TVA</label>
					    <input type="text" class="form-control" id="tvaIntra" name="tvaIntra" size="15" maxlength="15" 
					           placeholder="Tva Intracommunautaire">
			    	</div> 
		    	</div>
 				
 				<!-- Adresse Commande --> 
	   			<div class="col-sm-12 "><legend class="scheduler-border">Adresse de commande</legend>
	   				<!-- RS -->
		   		 	<div class="form-group col-sm-10">
				    	<label for="formGroupExampleInput2">Raison Sociale</label>
				    	<input type="text" class="form-control"  id="rsCommande" name ="rsCommande" size="36" maxlength="36"
				    	       placeholder="Raison sociale" data-toggle="tooltip"  title="saisie obligatoire du Nom de la société"  >
			    	</div>
			    	<!-- RUE -->
			   		<div class="form-group col-sm-10">
				    	<label for="formGroupExampleInput2">Voie/Rue</label>
				    	<input type="text" class="form-control" id="rueCommande" name="rueCommande" size="36" maxlength="36" 
				    	       placeholder="Voie rue" data-toggle="tooltip"  title="saisie obligatoire de la rue" >
			    	</div>
			    	<!-- Complément Rue -->
		    		<div class="form-group col-sm-10">
				    	<label for="formGroupExampleInput2"> Complément Voie/Rue </label>
				    	<input type="text" class="form-control" id="rue2Commande" name="rue2Commande" size="36" maxlength="36"
				    	       placeholder="Voie rue" data-toggle="tooltip"  title="saisie falcutative du complément adresse"  >
			    	</div>
		    		<!-- C.P -->
			        <div class="form-group col-sm-3">
				    	<label for="formGroupExampleInput2">Code Postal</label>
				    	<input type="text" class="form-control" id="codePostal" name="codePostal" size="5" maxlength="5" 
				    		   placeholder="Code Postal" data-toggle="tooltip"  title="saisie obligatoire du code postal"  >
			    	</div>
			    	<!-- Ville -->
			    	<div class="form-group col-sm-6">
				    	<label for="formGroupExampleInput2">Ville</label>
				    	<input type="text" class="form-control" id="villeCommande" name="villeCommande" size="36" maxlength="36"
				    		   placeholder="Ville" data-toggle="tooltip"  title="saisie obligatoire de la ville"  >
			    	</div>
			    	<!-- Pays -->		    
			  		<div class="form-group col-sm-3">
				    	<label for="formGroupExampleInput2">Pays</label>
				    	<select name="paysCommande"  class="form-control " id="paysCommande"  data-toggle="tooltip" 
				    	        title="saisie obligatoire du pays"  > 
							<option value = "-1"  selected disabled> Sélection un pays </option>
								<?php
								foreach ($array['pays'] as $unPays) {
								?>
									<option value=<?php  echo $unPays["CODE"];?>><?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
								<?php 
								}
								?>
	                    </select> 
				    	<!--<input type="text" class="form-control" id="paysCommande" name="paysCommande" placeholder="Pays"  required> -->
				    </div>
				    <!-- Tel -->
			    	<div class="form-group col-sm-4">
			    		<label for="formGroupExampleInput2">Téléphone</label>
	 				  	<input type="text" class="form-control" id="telephone" size="15" maxlength="15" name="telephone" placeholder="Tel">
	 				</div>
	 		<!--  suppression David
	 				<div class="form-group col-sm-4">
	 					<label for="formGroupExampleInput2">Fax</label>
	 				  	<input type="text" class="form-control"  id="fax" name="fax" size="15" maxlength="15" placeholder="Fax">
	 				</div>
					<div class="form-group col-sm-4">
						<label for="formGroupExampleInput2">Site internet</label>
	 				  	<input type="text" class="form-control"  id="site" name="site"  size="36" maxlength="36" placeholder="Site internet" 
	 				  		data-toggle="tooltip"  title="saisie obligatoire de l'url" required>
	 				</div>
			-->
				</div>
 			</div>

 		<!-- Adresse Paiement --> 
	 	<div class="col-sm-12 ">
	   		<legend class="scheduler-border">Adresse de Paiement</legend> 
	   			<!-- RS Paiement -->
	   		 	<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Raison Sociale</label>
			    	<input type="text" class="form-control" id="rsPaiement" name="rsPaiement" size="36" maxlength="36" placeholder="Raison sociale" >
		    	</div>
		    	<!-- Rue Paiement -->
		   		<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Voie/Rue</label>
			    	<input type="text" class="form-control" id="ruePaiement" name="ruePaiement"  size="36" maxlength="36" placeholder="Voie rue">
		    	</div>
		    	<!-- Complément Rue Paiement -->
	    	 	<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2"> Complément Voie/Rue</label>
			    	<input type="text" class="form-control" id="rue2Paiement" name="rue2Paiement"  size="36" maxlength="36" 
			    		   placeholder="Complement Adresse">
		    	</div>
	    	 	<!-- C.P Paiement -->
		        <div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Code Postal</label>
			    	<input type="text" class="form-control" id="cpPaiement"  name="cpPaiement" size="5" maxlength="5" placeholder="Code Postal">
		    	</div>
		    	<!-- Ville Paiement -->
		    	<div class="form-group col-sm-6">
			    	<label for="formGroupExampleInput2">Ville</label>
			    	<input type="text" class="form-control" id="villePaiement"  name="villePaiement" size="36" maxlength="36" placeholder="Ville">
		    	</div>
		    	<!-- Pays Paiement -->
		  		<div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Pays</label>
			    	<select name="paysPaiement"  class="form-control " id="paysPaiement"  > 
						<option value ="" > SANS par défaut ou Sélection un pays </option>
							<?php
							foreach ($array['pays']as $unPays) {
							?>
								<option value=<?php  echo $unPays["CODE"];?>><?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
							<?php 
							}
							?>
                    </select> 
                </div>
                <div class="col-sm-12">&nbsp;</div>
                 
                <!--  <div> pour fournisseur industriel -->
                
                <!-- Groupe d'appartenance -->
	            <div <?php  if ($origine == 'gen'){ ?> style="display: none" <?php } ?> >
	            	<div   class="col-sm-6">
				    	<label for="formGroupExampleInput2">Groupe d'appartenance du Fournisseur</label>
				    	  	<select name="groupeAppartenance"  class="form-control " id="groupeAppartenance"   > 
								<option value ="" > Sans ou Sélectionner une valeur</option>
								<?php
								foreach ($array['groupeAppartenance'] as $unGroupeAppartenance) {
								?>
									<option value=<?php  echo $unGroupeAppartenance["CODE"];?>><?php echo $unGroupeAppartenance["CODE"].'- '.$unGroupeAppartenance["NOM"];?></option> 
							
	                <?php } ?>
	                    	</select> 
			    	</div>
		    	
			    	<div class="col-sm-6" <?php  if ($origine == 'gen'){ ?> style="display: none" <?php } ?> >
				    	<label for="formGroupExampleInput2">Si autre préciser</label>
				    	<input type="text" class="form-control" id="autreGroupeFournisseur" name="autreGroupeFournisseur"  size="20" maxlength="20" placeholder=" à préciser">
				   	</div>
			   	</div>
			   	<!-- Nature  : Type de cde -->   
		  		<div class="col-sm-6" <?php  if ($origine == 'gen'){ ?> style="display: none" <?php } ?> >
		  			 <label for="formGroupExampleInput2">Nature du Fournisseur </label>
			    		<select  class="form-control " id="natureFournisseur" name="natureFournisseur"  > 
			    			<option value ="">Sans ou Sélectionner une valeur</option>
			    			<option value ="100"> 100- Achats de Production</option>
			    			<option value ="200"> 200- Achat sur projet</option>
						</select>		    	
			   	</div>

			<div   class="col-sm-12">
			   	<!-- Groupe --> 
			    <div class="col-sm-6">
		  			 <label for="formGroupExampleInput2">Groupe Fournisseur </label>
			    			<select name="groupeFournisseur"  class="form-control " id="groupeFournisseur" data-toggle="tooltip"  title="saisie obligatoire du groupe Frs" required> 
								<option value ="F4#" > F4# par defaut ou Sélectionner une valeur</option>
								<?php
								foreach ($array['groupeFournisseur'] as $unGroupe) {
								?>
									<option value=<?php  echo $unGroupe["CODE"];?>><?php echo $unGroupe["CODE"].'- '.$unGroupe["TXT40"];?></option> 
								<?php 
								}
							?>
                    	</select>		    	
			   	</div>
			   	<!-- Langue -->
			   	<div class="col-sm-6">
		  		    <label for="formGroupExampleInput2">Langue (Fr ou Gb ) </label>
			    		<select name="langue"  class="form-control " id="langue" data-toggle="tooltip"  
			    		        title="saisie obligatoire du groupe Frs" required> 
							<option value ="FR" > FR- Français par Défaut</option>
							<option value ="GB" > GB- Anglais</option> 
                    	</select>		    	
			   	</div>
			</div>
			<div class="col-sm-12">&nbsp;</div>
 		</div>
 		</fieldset>

 		<!-- Logistique -->
 		<fieldset class="col-sm-12 control-label thumbnail" <?php  if ($origine == 'gen'){ ?> style="display: none" <?php } ?> >
 			<div class="col-sm-12">		 
		   		<legend class="scheduler-border">Conditions Logistiques</legend>
		   		<div class="col-sm-12">	
			   		<div class="form-group col-sm-6">
			   			<label for="formGroupExampleInput2"> Règles Groupe </label>	
					</div>
					<div class="col-sm-6">
			     	 <label for="formGroupExampleInput2" >  Hors Règles Groupe </label>	
			    	</div>
    			</div>

    			<div class="col-sm-offset-2 col-sm-8" > <label for="incoterm ">Incoterm (Conditions Livraison)</label>	</div>

				<div class="form-group col-sm-12">
				    <!-- incoterm -->
				    <div class="col-sm-6">
				    	<select name="incoterm"  class="form-control " id="incoterm" >  
				    		<option value ="EXW"> EXW - A l'usine ou Sélectionner une valeur</option> 
							<option value="DDU"> DDU - Rendu droits acquités</option>
						</select> 	
					</div>
					<!-- Condition -->
				    <div class="col-sm-6"> 
				   		<select name="incotermHorsGroupe"  class="form-control " id="incotermHorsGroupe"  > 
				   			<option value = "" >Sélectionner une valeur</option> 
						<?php
						foreach ($array['condition'] as $uneCondition) {
						?>
							<option value=<?php  echo $uneCondition["CODE"];?>><?php echo $uneCondition["CODE"].'- '.$uneCondition["TXT15"];?>
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
			   		   	<input type="text"  class="form-control" id="lieu" name="lieu" size="36" maxlength="36" placeholder="Lieu"> 
					    <label for="formGroupExampleInput2" >Franco de Port (à partir de) </label>	
			   		    <input type="text"  class="form-control" id="montant" name="montant" size="15" maxlength="15" placeholder="Montant"> 
		    		</div>
	    	 		<div class="form-group col-sm-6">
		     			<textarea class="form-control" id="motifDero" rows="2" name="motifDero" size="255" maxlength="255" placeholder="Motif Derogation"></textarea>
	    	 		</div>
    	 		</div>
    	 	</div>
    	</fieldset>

    	<fieldset class="col-sm-12 control-label thumbnail">
	 	<div class="col-sm-12">
	   		<legend class="scheduler-border">Type de produits</legend>	
			<!-- Type de produits -->
	   	   	<div class="col-sm-6" >
	   	   		<label class="scheduler-border">Type de produit </label>
	     		<select name="typeProduit"  class="form-control " id="typeProduit" required <?php  if ($origine == 'gen'){ ?> style="display: none" <?php } ?> > 
			   		<option  >Biens ? Services ? Sans TVA ?</option>
			   		<option value = "01 "> Biens   </option>
			   		<option value = "08 "> Frais Généraux Européen  </option>
			   		<option value = "17 "> Fournisseur Espagne  </option>
			   		<option value = "?? "> Service  </option>
			   		<option value = "12 "> Exonere  </option>
			   		<option value = "00 "> Sans TVA (ex: auto entrepreneur) : 00 </option>
 		   	   	</select>  		
				<input type="text"  class="form-control" id="typeProduit"  name="typeProduit"  value='07 - TVA à 20% sur encaissement'  
			   			 readonly <?php  if ($origine == 'ind'){ ?> style="display: none" <?php } ?>> 
	     	</div>
	     	<!-- Objet Comptable -->
	     	<div class="form-group col-sm-6">
	     		<label class="scheduler-border">Objet Comptable </label>
	     		<select name="objetComptable"  class="form-control " id="objetComptable" required> 
			   		<option value = "HG " selected="selected" >  HG - Frs France ou Frs Etranger Succursale </option>
			   		<option value = "HGE">  HGE- Frs Européen hors France </option>
			   		<option value = "HGX">  HGX- Frs hors Europe </option>		 
 		   	   	</select>  		
	     	</div>
	     	<div class="col-sm-12">&nbsp;</div>
			<div class="col-sm-12">
		   		<div class="form-group  col-sm-4" style="text-align: center;">
		   			<label for="formGroupExampleInput2"> Règles Groupe standard </label>	
				</div>
					<div class="col-sm-4" style="text-align: center;">
	    			<label for="formGroupExampleInput2" > Mode règlement  </label>
	    		</div>
				<div class="form-group col-sm-4" style="text-align: center;">
		     	 	<label for="form-group formGroupExampleInput2" >  Hors Règles Groupe </label>	
	    		</div>
	    	</div>
	    	
	    		<div class="col-sm-12">&nbsp;</div>
	    		<!-- Mode Règlement -->
	    		<div class="col-sm-12">
	        		<div class="form-group col-sm-6">     
		    		    <input type="text"  class="form-control" id="reglementGroupe"  name="reglementGroupe"  value='BOR'  readonly> 
		    		</div>  
		    		
		    		<div class=" col-sm-6"> 
				   		<select name="modeReglementHG"  class="form-control " id="modeReglementHG" > 
				   		<option value = "">Sélectionner un mode de règlement</option>
						<?php
						foreach ($array['modeReglement'] as $unModeReglement) {
						?>
							<option value=<?php  echo $unModeReglement["CODE"];?>><?php echo $unModeReglement["CODE"].'- '.$unModeReglement["TXT15"];?>
							</option> 
						<?php 
						}
						?>
		   		    	</select>
		   		    </div>
				</div>	
				<!-- Délai Règlement --> 
				<div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
					<label for="formGroupExampleInput2" >Délai de règlement  </label> 
				 	<i style="font-size: 12px ; "> * Accord nécéssaire du DAF si mode de règlement non standard(Traite à 45JFDM) </i> 
				</div>
			
				<div class="col-sm-12">
					<div class="form-group col-sm-6"> 
		   		   		<input type="text"  class="form-control" id="conditionReglementG" value="45F"  name="conditionReglementG" placeholder="45 Jour Fin de Mois" readonly> 
		   		   	</div>  
		    	     <div class="col-sm-6"> 
				   		<select name="conditionReglementHG"  class="form-control " id="conditionReglementHG" > 
				   		<option value="">Sélectionner une condition de règlement</option>
						<?php
						foreach ($array['conditionReglement'] as $uneConditionReglement) {
						?>
							<option value=<?php  echo $uneConditionReglement["CODE"];?>><?php echo $uneConditionReglement["CODE"].'- '.$uneConditionReglement["TXT15"];?>
							</option> 
						<?php 
						}
						?>
		   		    	</select>
		   		    </div>
		   		</div>
		   		<!-- Devise -->
		   		<div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
		   			<label for="formGroupExampleInput2" >Devise</label>	
		   		</div>
		   		<div class="col-sm-12">&nbsp;</div>
		   		<div class="col-sm-12">	 
			   		 <div class="col-sm-6">
		   		 		<select name="devise"  class="form-control " id="devise" > 
		   		 			<option value="EUR" selected="selected" > EUR - EURO</option>
							<option value="GBP"> GBP - LIVRE </option>
							<option value="USD"> USD - DOLLARD </option>
						</select>
				 	</div>
				 	<div class="form-group col-sm-6">
					 	<div class="">
					 		<select name="deviseHG"  class="form-control " id="deviseHG" > 
					 		<option value="">Sélectionner une devise hors groupe</option>
							<?php
							 
							foreach ($array['devise'] as $uneDevise) {
							?>
								<option value=<?php  echo $uneDevise["CODE"];?>><?php echo $uneDevise["CODE"].'- '.$uneDevise["TXT40"];?></option> 
							<?php 
							}
							?>
			   		    	</select> 
			   		     </div>
	    	 		 </div>
		    		<div class="form-group col-sm-12">	
		    		   	<p class="col-sm-4"><i> * Joindre un RIB pour les fournisseurs étrangers  </i></p>	
		    		</div>	
		   		</div>
    	 	</div>
    	</fieldset>

    
    	<!-- ajout RIB -->
    	<fieldset class="col-sm-12 control-label thumbnail">
	 		<div class="col-sm-12">
		   		<legend class="scheduler-border"> R I B </legend>	
	   			<div class="col-sm-12">
		   	   	 	<div class="col-sm-5 "> 
		   	   	 		<label for="form-control">Identite Bancaire par pays</label>	
				   		<select class="form-control" name="idBanq"  id="idBanq"  > 
				   			<option value = "" >Sélectionner une valeur</option> 
						<?php
						foreach ($array['idBanq'] as $uneIdBanq) {
						?>
							<option value=<?php  echo $uneIdBanq["CODE"];?>><?php echo $uneIdBanq["CODE"].'- '.$uneIdBanq["TXT40"];?>
							</option> 
						<?php 
						}
						?>
		   		    	</select>
		   		    </div>
		   		    <div  class="col-sm-6" style="text-align: center;">
			   			<label for="formGroupExampleInput2"> Nom de la Banque </label>	
			   			<input type="text"  class="form-control" id="nomBanq" name="nomBanq"  size="36" maxlength="36"  placeholder="Nom Banque" > 
			   		</div>
     		 	</div>
 		 		<div class="col-sm-6 "> &nbsp;   	</div>

				<div class="col-sm-12">
			   		<div class="form-group  col-sm-2" style="text-align: center;">
			   			<label for="formGroupExampleInput2"> Code Banque </label>	
			   			<input type="text"  class="form-control" id="codeBanq" name="codeBanq"  size="5" maxlength="5" 
			   			       placeholder="Code Banque" > 
			   		</div>
					<div class="form-group col-sm-3" style="text-align: center;">
			     	 	<label for="formGroupExampleInput2" >  Code Etablissement </label>	
		    			<input type="text"  class="form-control" id="etabBanq" name="etabBanq"  size="5" maxlength="5"  
		    			       placeholder="Etablissement Banque" > 
		    		</div>
	    			<div class="form-group col-sm-4" style="text-align: center;">
	    				<label for="formGroupExampleInput2" > N° Compte </label>
	    				<input type="text"  class="form-control" id="numCompte" name="numCompte"  size="11" maxlength="11"  
	    				       placeholder="Numero de Compte" > 
	    			</div>
			   		<div class="form-group  col-sm-2" style="text-align: center;">
			   			<label for="formGroupExampleInput2" > Clé </label>	
			   			<input type="text"  class="form-control" id="cleCompte" name="cleCompte"  size="2" maxlength="2"  placeholder="Clé" > 
			   		</div>
		   		</div>

		   		<div class="col-sm-6 "> &nbsp;		   	</div>

			   	<div class="col-sm-12">
			   		<div class="form-group col-sm-7" style="text-align: center;">
			     	 	<label for="formGroupExampleInput2" > IBAN </label>	
		    			<input type="text"  class="form-control" id="iban" name="iban"  size="27" maxlength="27"  placeholder="code IBAN" > 
		    		</div>
				   	<div class="form-group  col-sm-4" style="text-align: center;">
			   			<label for="formGroupExampleInput2"> SWIFT </label>	
			   			<input type="text"  class="form-control" id="swift" name="swift"  size="11" maxlength="11"  placeholder="Swift" > 
			   		</div>
					
				</div>
		     	 
    	 	</div>
    	</fieldset>

    	<fieldset class="col-sm-12 control-label thumbnail" <?php  if ($origine == 'gen'){ ?> style="display: none" <?php } ?> >
	 		<div class="form-group col-sm-12">
		   		<legend class="scheduler-border">Informations Supplémentaires</legend>
		   		 <div class="form-group col-sm-4">
			        <input type="text"  class="form-control" id="ca" name="ca" size="20" maxlength="20" placeholder="C.A. "> 	
			    </div>	
			    <div class="form-group col-sm-4">
			        <input type="text"  class="form-control" id="nbreEmployes" name="nbreEmployes"  size="5" maxlength="5" placeholder="Nbre employés"> 	
			    </div>	
		   		<div class="form-group col-sm-4">
		   			<select name="iso"  class="form-control " id="iso" > 
		   		 		<option value ="">ISO ?</option>
						<option value="oui"> ISO </option>
						<option value="non"> Pas ISO </option>
					</select>		     		   
		     	</div>		
		     	</div>   
		  	 	<div class="form-group  col-sm-12">
			  	 	<div class="col-sm-12">	
				   		<div class="form-group col-sm-4">
							<label class="control-label"> Joindre Bilan </label>
							<input id="bilan" name="bilan" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
						</div>
						<div class="form-group col-sm-4">
							<label class="control-label"> Joindre Rib </label>
							<input id="rib" name="rib" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
						</div>
						<div class="form-group col-sm-4 ">
							<label class="control-label"> Joindre kbis </label>
							<input id="kbis" name="kbis" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
						</div>
		    	</div>
	    </fieldset>
	    <div class="col-md-12 msgJs" style="color: red">&nbsp; </div>
	  	<!-- champ caché pour passer la valeur du domaine => achats pour validation par achats-->
	  	<!-- <input type="hidden" class="form-control" id="domaine" name="domaine" value="achats" placeholder="Domaine"> -->
	  	<div   >
	  	 	 <a href="" onclick="return(confirm('Confirmer la création de la fiche fournisseur'));" >   
		 	
			 	<INPUT TYPE="submit" class="btn btn-info col-sm-5 "   name="Valider" value="Envoyer en validation - Achats"/>
			</a>
		</div>
		<div <?php  if ($origine == 'gen'){ ?> style="display: none" <?php } ?> >
		 	<a href="" onclick="return(confirm('Envoyer au fournisseur pour complétion'));">   
				<INPUT TYPE="submit" class="btn btn-info col-sm-offset-2 col-sm-5" name="EnvoiFour" value="Demander informations au fournisseur"/>
		 	</a>
	    </div>
  
	</form>
   		 	
	<div class="col-md-8  ">&nbsp; </div>
</div> 
 	


<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
