<?php

ob_start();

?>
  	

	<form action = "" class='formCreate' method='post' enctype="multipart/form-data">

		<!--<input type="hidden" name="controller" value="index" /> 
 		<input type="hidden" name="action" value="creeFournisseurs" />	 -->
		<legend class="scheduler-border">
       		<div class="well" >
       			<h2><span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp; Fiche fournisseur  de Frais Généraux à compléter</h2>
       		</div>
		</legend>	 
	
		<fieldset class =  "thumbnail">

			<!-- ligne 1 -->
			<div class="col-sm-12 ">
				<!-- Entite -->
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
				    <label for="formGroupExampleInput"> Adresse Mail du Demandeur </label>
				    <input type="text" name="nomDemandeur" class="form-control" id="nomDemandeur" placeholder="Votre adresse mail" data-toggle="tooltip" 
				    		title="saisie obligatoire de votre adresse mail" size="36" maxlength="36" required > 
				</div>
				<!-- Fonction -->
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Fonction</label>
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
		   			<textarea class="form-control" id="raisonDemande"  name="raisonDemande" rows="4" placeholder="Détail du besoin" size="255" maxlength="255" ></textarea>
		   		</div>  
   			</div>
   		</fieldset>

 		<!-- Pavé  Identification -->
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
				    	<input type="text" class="form-control" id="rsCommande" name ="rsCommande" size="36" maxlength="36" 
				    		   placeholder="Raison sociale" data-toggle="tooltip"  title="saisie obligatoire du Nom de la société" required>
			    	</div>
					<!-- RUE -->			   		
			   		<div class="form-group col-sm-10">
				    	<label for="formGroupExampleInput2">Voie/Rue</label>
				    	<input type="text" class="form-control" id="rueCommande" name="rueCommande" size="36" maxlength="36" 
				    		   placeholder="Complement Rue Voie" data-toggle="tooltip"  title="saisie obligatoire de la rue" required>
			    	</div>
		    		<!-- Complément Rue -->
		    		<div class="form-group col-sm-10">
				    	<label for="formGroupExampleInput2"> Complément Voie/Rue </label>
				    	<input type="text" class="form-control" id="rue2Commande" name="rue2Commande" size="36" maxlength="36"
				    	       placeholder="Voie rue" data-toggle="tooltip"  title="saisie obligatoire de la rue 2"  >
			    	</div>
			    	<!-- C.P -->
			        <div class="form-group col-sm-3">
				    	<label for="formGroupExampleInput2">Code Postal</label>
				    	<input type="text" class="form-control" id="codePostal" name="codePostal" size="5" maxlength="5" 
				    		   placeholder="Code Postal" data-toggle="tooltip"  title="saisie obligatoire du code postal" required>
			    	</div>
			    	<!-- Ville -->
			    	<div class="form-group col-sm-6">
				    	<label for="formGroupExampleInput2">Ville</label>
				    	<input type="text" class="form-control" id="villeCommande" name="villeCommande" size="36" maxlength="36" 
				    		   placeholder="Ville" data-toggle="tooltip"  title="saisie obligatoire de la ville" required>
			    	</div>
			    	<!-- Pays -->				    
			  		<div class="form-group col-sm-3">
				    	<label for="formGroupExampleInput2">Pays</label>
				    	<select name="paysCommande"  class="form-control " id="paysCommande"  data-toggle="tooltip"  
				    		    title="saisie obligatoire du pays"  required> 
							<option value ="" > Sélection Obligatoire du pays </option>
							<?php
							foreach ($array['pays'] as $unPays) {
							?>
								<option value=<?php  echo $unPays["CODE"];?>><?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
							<?php 
							}
							?>
	                    </select> 
				    </div>
				    <!-- Tel -->
			    	<div class="form-group col-sm-4">
			    		<label for="formGroupExampleInput2">Téléphone</label>
	 				  	<input type="text" class="form-control" id="telephone" size="15" maxlength="15" name="telephone" placeholder="Tel">
	 				</div>

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
			    	<input type="text" class="form-control" id="ruePaiement" name="ruePaiement" size="36" maxlength="36" placeholder="Voie rue">
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
			    	<input type="text" class="form-control" id="villePaiement" name="villePaiement" size="36" maxlength="36" 
			    	       placeholder="Ville">
		    	</div>
		    	<!-- Pays Paiement -->
		  		<div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Pays</label>
			    	<select name="paysPaiement"  class="form-control " id="paysPaiement"  > 
						<option value ="" > SANS par défaut ou Sélection autre pays </option>
							<?php
							foreach ($array['pays'] as $unPays) {
							?>
								<option value=<?php  echo $unPays["CODE"];?>><?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
							<?php 
							}
							?>
                    </select> 
                </div>
                <div class="col-sm-12">&nbsp;</div>
                <div class="col-sm-12">&nbsp;</div>
		 		<!-- Groupe -->
		  	    <div class="col-sm-6">
		  			<label for="formGroupExampleInput2">Groupe Fournisseur </label>
		    		<select name="groupeFournisseur"  class="form-control " id="groupeFournisseur" data-toggle="tooltip"  title="saisie obligatoire du groupe Frs" required> 
						<option value ="F4#" > F4# par defaut ou Sélectionner une valeur</option>
						<?php
						foreach ($array['groupeFournisseur'] as $unGroupe) {
						?>
							<option value=<?php  echo $unGroupe["CODE"];?>><?php echo $unGroupe["CODE"].'- '.$unGroupe["TXT40"];?>
							</option> 
						<?php 
						}
						?>
                	</select>		    	
			   	</div>
			   	<!-- Langue -->
			   	<div class="col-sm-6">
		  		    <label for="formGroupExampleInput2">Langue (Fr ou Gb ) </label>
		    		<select name="groupeFournisseur"  class="form-control " id="groupeFournisseur" data-toggle="tooltip"  
		    		        title="saisie obligatoire du groupe Frs" required> 
						<option value ="FR" > FR- Français par Défaut</option>
						<option value ="GB" > GB- Anglais</option> 
                	</select>		    	
			   	</div>
			   	<div class="col-sm-12">&nbsp;</div>
 		 	</div>

 		</fieldset>

 		
    	<fieldset class="col-sm-12 control-label thumbnail">
	 	<div class="col-sm-12">
	   		<legend class="scheduler-border">Type de produits</legend>	
	   		<div class="form-group col-sm-6">
				<label class="scheduler-border"> Type de produit  </label>
			   	<input type="text"  class="form-control" id="typeProduit"  name="typeProduit"  value='07- TVA à 20% sur encaissement'  
			   			placeholder = " 07- TVA à 20% sur encaissement" readonly> 
	     	</div>
	     	<!-- Objet Comptable -->
	     	<div class="form-group col-sm-6">
	     		<label class="scheduler-border">Objet Comptable </label>
	     		<select name="typeProduit"  class="form-control " id="typeProduit" required> 
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
				<div class=" col-sm-4" style="text-align: center;">
	    			<label for="formGroupExampleInput2" >Mode règlement  </label>
	    		</div>
				<div class="form-group col-sm-4" style="text-align: center;">
		     	 	<label for="form-group formGroupExampleInput2" >  Hors Règles Groupe </label>	
	    		</div>
	    	</div>

	    		<div class="col-sm-12">&nbsp;</div>
	    		<div class="col-sm-12">
	        		<div class="form-group col-sm-6">     
		    		    <input type="text"  class="form-control" id="reglementGroupe"  name="reglementGroupe"  value='BOR Billet à ordre' 	  		   readonly>
		    		</div>  
		    		  <div class="form-group col-sm-6"> 
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
				<div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
					<label for="formGroupExampleInput2" >Délai de règlement  </label> 
				 	<i style="font-size: 12px ; "> * Accord nécéssaire du DAF si mode de règlement non standard(Traite à 45JFDM) </i> 
				</div>
			</div>
			
			<div class="col-sm-12">
				<div class="form-group col-sm-6"> 
	   		   		<input type="text"  class="form-control" id="conditionReglementG" value="45F- 45 jours Fin de Mois"  name="conditionReglementG" placeholder="45 Jour Fin de Mois" readonly> 
	   		   	</div>  
	    	     <div class="form-group col-sm-6"> 
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
	   		<div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
	   			<label for="formGroupExampleInput2" >Devise</label>	
	   		</div>
		   	<div class="col-sm-12">&nbsp;</div>
	   		<div class="col-sm-12">	 
		   		 <div class="form-group col-sm-6">
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
 		 		<div class="col-sm-6 "> &nbsp;    	   	 	</div>

				<div class="col-sm-12">
			   		<div class="form-group  col-sm-2" style="text-align: center;">
			   			<label for="formGroupExampleInput2"> Code Banque </label>	
			   			<input type="text"  class="form-control" id="codeBanq" name="codeBanq"  size="5" maxlength="5"  placeholder="Code Banque" > 
			   		</div>
					<div class="form-group col-sm-3" style="text-align: center;">
			     	 	<label for="formGroupExampleInput2" >  Code Etablissement </label>	
		    			<input type="text"  class="form-control" id="etabBanq" name="etabBanq"  size="5" maxlength="5"  placeholder="Etablissement Banque" > 
		    		</div>
	    			<div class="form-group col-sm-4" style="text-align: center;">
	    				<label for="formGroupExampleInput2" > N° Compte </label>
	    				<input type="text"  class="form-control" id="numCompte" name="numCompte"  size="11" maxlength="11"  placeholder="Numero de Compte" > 
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

    	
	  	<!-- champ caché pour passer la valeur du domaine => achats pour validation par achats-->
	  	<!-- <input type="hidden" class="form-control" id="domaine" name="domaine" value="achats" placeholder="Domaine"> -->
	  	<div class="col-sm-12" >
		  	 <a class="col-sm-offset-4 col-sm-8" href="" onclick="return(confirm('Confirmer la création de la fiche fournisseur'));">   
				<INPUT TYPE="submit" class="btn btn-info col-sm-5 validateCreate" name="Valider" value="Envoyer en validation - Achats"/>
			 </a>
		</div>
		 
	</form>
   		 	
	<div class="col-md-8">&nbsp; </div>
</div> 
 	


<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
