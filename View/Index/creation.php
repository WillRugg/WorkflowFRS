<?php

ob_start();

?>
 

<div id="container">
	

	<form action = "" method='post' enctype="multipart/form-data">

		<!--<input type="hidden" name="controller" value="index" /> 
 		<input type="hidden" name="action" value="creeFournisseurs" />	 -->
		<legend class="scheduler-border">
       		<h2><span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp; Fiche fournisseur à compléter</h2>
		</legend>	 
	
		<fieldset class =  "thumbnail">
			<div class="col-sm-12 ">
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Entité</label>

			     	<select name="entiteDemandeur"  class="form-control " id="entiteDemandeur"  placeholder="Votre entité"> 
						<?php
						foreach ($entite as $uneEntite) {
							/* value permet de récupérer la valeur pour le name  => on y met la divi*/
						?>  
							<option value=<?php  echo $uneEntite["CCDIVI"]?>><?php echo $uneEntite["CCDIVI"].'-'.$uneEntite["CCCONM"];?></option> 
						<?php 
						}
						?>
                    </select> 

				</div>
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput">Nom du demandeur </label>
				    <input type="text" name="nomDemandeur" class="form-control" id="nomDemandeur" placeholder="Votre Nom"  size="36" maxlength="36" required>
				</div>
				<div class="form-group col-sm-4">
				    <label for="formGroupExampleInput2">Fonction</label>
				    <input type="text"  name ="fonctionDemandeur" class="form-control" id="fonctionDemandeur" size="36" maxlength="36" placeholder="Votre fonction">
			    </div>
		    </div>
			 
	 		<div class="col-sm-12">
				<div class="form-group col-sm-3">
	 				<label for="formGroupExampleInput2">Date</label>
	 				<input type="text" name="dateJour" class="form-control" id="dateJour" value=<?php echo $today; ?> readonly placeholder="Date"> 

	 			</div>       
	     	<div class="form-group col-sm-9">
	 			<label for="exampleTextarea">Raison de la demande</label>
	   			<textarea class="form-control" id="raisonDemande"  name="raisonDemande" rows="4" placeholder="Détail du besoin" size="255" maxlength="255" ></textarea>
	   		</div>  
   		</div>
   		</fieldset>

 
   		<fieldset class="col-sm-12 control-label thumbnail">
 			<div class="col-sm-12">	<legend class="scheduler-border">Identification - Informations Fournisseur</legend>
	   			<div class="form-group col-sm-12">
			   		<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput2" >Siret</label>
					    <input type="text" class="form-control" id="siret" name ="siret"  size="9" maxlength="9" placeholder="Siret" >
					</div>
					<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput"> Complément Siret </label>
					    <input type="text" class="form-control" id="complement"  name="complement"  size="5" maxlength="5" placeholder="Complément Siret">
					</div>
					<div class="form-group col-sm-4">
					    <label for="formGroupExampleInput2">TVA</label>
					    <input type="text" class="form-control" id="tvaIntra" name="tvaIntra" size="15" maxlength="15" placeholder="Tva Intracommunautaire">
			    	</div> 
		    	</div>
 		
   			<div class="col-sm-12 "><legend class="scheduler-border">Adresse de commande</legend>
	   		 	<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Raison Sociale</label>
			    	<input type="text" class="form-control" id="rsCommande" name ="rsCommande" size="36" maxlength="36" placeholder="Raison sociale"  required>
		    	</div>

		   		<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Voie/Rue</label>
			    	<input type="text" class="form-control" id="rueCommande" name="rueCommande" size="36" maxlength="36" placeholder="Voie rue">
		    	</div>
	    	
		        <div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Code Postal</label>
			    	<input type="text" class="form-control" id="codePostal" name="codePostal" size="5" maxlength="5" placeholder="Code Postal">
		    	</div>
		    	<div class="form-group col-sm-6">
			    	<label for="formGroupExampleInput2">Ville</label>
			    	<input type="text" class="form-control" id="villeCommande" name="villeCommande" size="36" maxlength="36" placeholder="Ville"  required>
		    	</div>
		    			    
		  		<div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Pays</label>
			    	<select name="paysCommande"  class="form-control " id="paysCommande"  > 
						<option value ="FR" > FR ou Sélection autre pays </option>
							<?php
							foreach ($pays as $unPays) {
							?>
								<option value=<?php  echo $unPays["CODE"];?>><?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
							<?php 
							}
							?>
                    </select> 
			    	<!--<input type="text" class="form-control" id="paysCommande" name="paysCommande" placeholder="Pays"  required> -->
			    </div>
		    	<div class="form-group col-sm-4">
		    		<label for="formGroupExampleInput2">Téléphone</label>
 				  	<input type="text" class="form-control" id="telephone" size="12" maxlength="12" name="telephone" placeholder="Tel">
 				</div>
 				<div class="form-group col-sm-4">
 					<label for="formGroupExampleInput2">Fax</label>
 				  	<input type="text" class="form-control"  id="fax" name="fax" size="12" maxlength="12" placeholder="Fax">
 				</div>
				<div class="form-group col-sm-4">
					<label for="formGroupExampleInput2">Site internet</label>
 				  	<input type="text" class="form-control"  id="site" name="site"  size="36" maxlength="36" placeholder="Site internet">
 				</div>
 				 				

			</div>
 			</div>
	 		<div class="col-sm-12 ">
	   		<legend class="scheduler-border">Adresse de Paiement</legend> 
	   		 	<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Raison Sociale</label>
			    	<input type="text" class="form-control" id="rsPaiement" name="rsPaiement" size="36" maxlength="36" placeholder="Raison sociale" >
		    	</div>
		   		<div class="form-group col-sm-10">
			    	<label for="formGroupExampleInput2">Voie/Rue</label>
			    	<input type="text" class="form-control" id="ruePaiement" name="ruePaiement"  size="36" maxlength="36" placeholder="Voie rue">
		    	</div>
	    	 
		        <div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Code Postal</label>
			    	<input type="text" class="form-control" id="cpPaiement"  name="cpPaiement" size="5" maxlength="5" placeholder="Code Postal">
		    	</div>
		    	<div class="form-group col-sm-6">
			    	<label for="formGroupExampleInput2">Ville</label>
			    	<input type="text" class="form-control" id="villePaiement"  name="villePaiement" size="36" maxlength="36" placeholder="Ville">
		    	</div>
		  		<div class="form-group col-sm-3">
			    	<label for="formGroupExampleInput2">Pays</label>
			    	<select name="paysPaiement"  class="form-control " id="paysPaiement"  > 
						<option value ="FR" > FR ou Sélection autre pays </option>
							<?php
							foreach ($pays as $unPays) {
							?>
								<option value=<?php  echo $unPays["CODE"];?>><?php echo $unPays["CODE"].'- '.$unPays["TXT15"];?></option> 
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
								<option value=<?php  echo $unGroupe["CODE"];?>><?php echo $unGroupe["CODE"].'- '.$unGroupe["TXT40"];?></option> 
							<?php 
							}
							?>
                    	</select> 
		    	</div>
		    	<div class="col-sm-4">
			    	<label for="formGroupExampleInput2">Si autre préciser</label>
			    	<input type="text" class="form-control" id="autreGroupeFournisseur" name="autreGroupeFournisseur"  size="20" maxlength="20" placeholder=" à préciser">
			   	</div>
		  		<div class="col-sm-6">
		  			 <label for="formGroupExampleInput2">Nature du Fournisseur </label>
			    		<select  class="form-control " id="natureFournisseur" name="natureFournisseur"  > 
			    			<option value ="">Sélectionner une valeur</option>
			    			<option value ="PRODUCTION">Achats de Production</option>
			    			<option value ="FRAISGEN">Achat de frais généraux</option>
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
					<div class="col-sm-6">
			     	 <label for="formGroupExampleInput2" >  Hors Règles Groupe </label>	
			    	</div>
    			</div>

    			<div class="col-sm-offset-2 col-sm-8" > <label for="incoterm ">Incoterm (Conditions Livraison)</label>	</div>

				<div class="form-group col-sm-12">
				   
				    <div class="col-sm-6">
				    	<select name="incoterm"  class="form-control " id="incoterm" >
				    		<option value ="">Sélectionner une valeur</option> 
							<option value="EXW"> EXW - A l'usine</option>
							<option value="DDU"> DDU - Rendu droits acquités</option>
						</select> 	
					</div>
				    <div class="col-sm-6"> 
				   		<select name="incotermHorsGroupe"  class="form-control " id="incotermHorsGroupe"  >
				   			<option value = "" >Sélectionner une valeur</option> 
						<?php
						foreach ($condition as $uneCondition) {
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
	   	   	<div class="col-sm-offset-4 col-sm-4">
	     		<select name="typeProduit"  class="form-control " id="typeProduit" > 
			   		<option value = "">Biens ? Services ? Sans TVA ?</option>
			   		<option value = "Bien"> Biens</option>
			   		<option value = "Serv"> Service  </option>
			   		<option value = "Stva"> Sans TVA (ex: auto entrepreneur) </option>
 		   	   	</select>  		
	     	</div>
	     	<div class="col-sm-12">&nbsp;</div>
			<div class="col-sm-12">
		   		<div class="form-group  col-sm-4" style="text-align: center;">
		   			<label for="formGroupExampleInput2"> Règles Groupe standard </label>	
				</div>
				<div class="form-group col-sm-offset-4 col-sm-4" style="text-align: center;">
		     	 	<label for="form-group formGroupExampleInput2" >  Hors Règles Groupe </label>	
	    		</div>
	    	</div>
	    		<div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
	    			<label for="formGroupExampleInput2" >Mode règlement  </label>
	    		</div>
	    		<div class="col-sm-12">&nbsp;</div>
	    		<div class="col-sm-12">
	        		<div class="form-group col-sm-4">     
		    		    <input type="text"  class="form-control" id="reglementGroupe"  name="reglementGroupe"  value='BOR'  readonly> 
		    		</div>  
		    		  <div class="col-sm-offset-4 col-sm-4"> 
				   		<select name="modeReglementHG"  class="form-control " id="modeReglementHG" > 
				   		<option value = "">Sélectionner un mode de règlement</option>
						<?php
						foreach ($modeReglement as $unModeReglement) {
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
				</div>
				<p class="col-sm-12" style="text-align: right;"><i> * Accord nécéssaire du DAF si mode de règlement non standard(Traite à 45JFDM) </i></p>
			
				<div class="col-sm-12">
					<div class="form-group col-sm-4"> 
		   		   		<input type="text"  class="form-control" id="conditionReglementG" value="45F"  name="conditionReglementG" placeholder="45 Jour Fin de Mois" readonly> 
		   		   	</div>  
		    	     <div class="col-sm-offset-4 col-sm-4"> 
				   		<select name="conditionReglementHG"  class="form-control " id="conditionReglementHG" > 
				   		<option value="">Sélectionner une condition de règlement</option>
						<?php
						foreach ($conditionReglement as $uneConditionReglement) {
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
			   		 <div class="col-sm-4">
		   		 		<select name="devise"  class="form-control " id="devise" > 
		   		 			<option value="">Sélectionner une devise</option>
							<option value="EUR"> EUR - EURO</option>
							<option value="GBP"> GBP - LIVRE </option>
							<option value="USD"> USD - DOLLARD </option>
						</select>
				 	</div>
				 	<div class="form-group col-sm-offset-4 col-sm-4">
					 	<div class="">
					 		<select name="deviseHG"  class="form-control " id="deviseHG" > 
					 		<option value="">Sélectionner une devise hors groupe</option>
							<?php
							 
							foreach ($devise as $uneDevise) {
							?>
								<option value=<?php  echo $uneDevise["CODE"];?>><?php echo $uneDevise["CODE"].'- '.$uneDevise["TXT40"];?></option> 
							<?php 
							}
							?>
			   		    	</select> 
			   		     </div>
	    	 		 </div>
		    		<div class="form-group col-sm-12">	
		    		   	<p class="col-sm-4"><i> * Joindre un RIB pour les fornisseurs étrangers  </i></p>	
		    		   	
		    		</div>	
		   		</div>
		     	 
    	 	</div>
    	</fieldset>
    	<fieldset class="col-sm-12 control-label thumbnail">
	 		<div class="form-group col-sm-12">
		   		<legend class="scheduler-border">Informations Suplémentaires</legend>
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
				   		<div class="form-group col-sm-4" style="text-align: center;">
				   			<label for="formGroupExampleInput2"> Joindre Bilan </label>	
						</div>
						<div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
				     	 	<label for="formGroupExampleInput2" >  Joindre Kbis </label>	
				    	</div>
	    			</div>
	    			<div class="col-sm-12">	
				  	 	<div class="form-group col-sm-4">
			  	 	   		<input class="form-control" type="file" id="bilan" name='bilan'    >  
				  	 	</div>
				  	 	<div class="form-group col-sm-offset-4 col-sm-4">
				  	 		<input class="form-control" type="file" id="kbis" name='kbis'    >  
						</div>
					</div>
		    	</div>
	    </fieldset>
	  	<!-- champ caché pour passer la valeur du domaine => achats pour validation par achats-->
	  	<input type="hidden" class="form-control" id="domaine" name="domaine" value="achats" placeholder="Domaine"  >  

	  	 <a href="" onclick="return(confirm('Confirmer la création de la fiche fournisseur'));">   
			<INPUT TYPE="submit" class="btn btn-info col-sm-offset-3 col-sm-6" value="Valider"/>
		 </a>
	   
	  
	    
	  
	</form>
   		 	
	<div class="col-md-8">&nbsp; </div>
</div> 
 	


<?php
	 
	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>
