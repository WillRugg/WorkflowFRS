/* -----------------------------------------------------------------------------------/
/  commencer tjs par $(document).ready(function() => faire quand la DOM est chargée   /
/ -----------------------------------------------------------------------------------*/
 $(document).ready(function() {

 	/* ---------------------------------------------------------------------------------------/
 	/	Affichage d une boite d'erreur si champ non saisis dans formulaire lors du "submit"  /
 	/----------------------------------------------------------------------------------------*/
 	// Formulaire de connexion  */
 	/* ------------------------ */
  

 	$('form.formCreate').on('submit', function(e) {
 		// initialisation de la variable erreur
		var erreur = false;
	 
 	 	// verif nomDemandeur
		var monNomDemandeur = $('#nomDemandeur');
		if (monNomDemandeur.val().length == 0 ) {
			erreur = true;
			monNomDemandeur.addClass('alert-danger');
		}  else {
			erreur = false;
			monNomDemandeur.removeClass('alert-danger');
		}

		//-------------  ADRESSE COMMANDE  -----------------------//

		// verif Rs commande
		var maRsCommande = $('#rsCommande');
		if (maRsCommande.val().length == 0 ) {
			erreur = true;
			maRsCommande.addClass('alert-danger');
		}  else {
			erreur = false;
			maRsCommande.removeClass('alert-danger');
		}

		// verif rue commande
		var maRueCommande = $('#rueCommande');		 
		if (maRueCommande.val().length == 0 ) {
			erreur = true;
			maRueCommande.addClass('alert-danger');
		}  else {
			erreur = false;
			maRueCommande.removeClass('alert-danger');
		}

			// verif rue commande
		var maRue2Commande = $('#rue2Commande');		 
		if (maRue2Commande.val().length == 0 ) {
			erreur = true;
			maRue2Commande.addClass('alert-danger');
		}  else {
			erreur = false;
			maRue2Commande.removeClass('alert-danger');
		}

		// verifc p commande
		var monCPCommande = $('#codePostal');
		if (monCPCommande.val().length == 0 ) {
			erreur = true;
			monCPCommande.addClass('alert-danger');
		} else {
			erreur = false;
			monCPCommande.removeClass('alert-danger');
		} 

		// verif villecommande
		var maVilleCommande = $('#villeCommande');
		if (maVilleCommande.val().length == 0 ) {
			erreur = true;
			maVilleCommande.addClass('alert-danger');
		}  else {
			erreur = false;
			maVilleCommande.removeClass('alert-danger');
		} 
		 
		// verif Payscommande
		var monPaysCommande = $('#paysCommande option:selected');
		if (monPaysCommande.val() == -1 ) {
			erreur = true;
			$('#paysCommande').addClass('alert-danger');
		}  else {
			erreur = false;
			$('#paysCommande').removeClass('alert-danger');
		} 

		//-------------  RIB ---------------------------//
		// Identité Bancaire
		var monIdBanq = $('#idBanq option:selected');
		if (monIdBanq.val() == -1 ) {
			erreur = true;
			$('#idBanq').addClass('alert-danger');
		}  else {
			erreur = false;
			$('#idBanq').removeClass('alert-danger');
		} 

		// verif code Banque
		var monCodeBanq = $('#codeBanq');
		if (monCodeBanq.val().length == 0 ) {
			erreur = true;
			monCodeBanq.addClass('alert-danger');
		}  else {
			erreur = false;
			monCodeBanq.removeClass('alert-danger');
		} 

		// verif nom Banque
		var monNomBanq = $('#nomBanq');
		if (monNomBanq.val().length == 0 ) {
			erreur = true;
			monNomBanq.addClass('alert-danger');
		}  else {
			erreur = false;
			monNomBanq.removeClass('alert-danger');
		} 
		
		// verif etab Banque
		var monEtabBanq= $('#etabBanq');
		if (monEtabBanq.val().length == 0 ) {
			erreur = true;
			monEtabBanq.addClass('alert-danger');
		}  else {
			erreur = false;
			monEtabBanq.removeClass('alert-danger');
		} 

		// verif numero compte
		var monNumCompte= $('#numCompte');
		if (monNumCompte.val().length == 0 ) {
			erreur = true;
			monNumCompte.addClass('alert-danger');
		}  else {
			erreur = false;
			monNumCompte.removeClass('alert-danger');
		} 

		// verif clé compte
		var maCleCompte= $('#cleCompte');
		if (maCleCompte.val().length == 0 ) {
			erreur = true;
			maCleCompte.addClass('alert-danger');
		}  else {
			erreur = false;
			maCleCompte.removeClass('alert-danger');
		} 

		// verif iban
		var monIban= $('#iban');
		if (monIban.val().length == 0 ) {
			erreur = true;
			monIban.addClass('alert-danger');
		}  else {
			erreur = false;
			monIban.removeClass('alert-danger');
		} 

		// verif clé compte
		var monSwift= $('#swift');
		if (monSwift.val().length == 0 ) {
			erreur = true;
			monSwift.addClass('alert-danger');
		}  else {
			erreur = false;
			monSwift.removeClass('alert-danger');
		} 


		// si frs indust => verif supplémentaire		
		/*var monOrigine = $('#origineHidden'); 
		if ($('#origineHidden').val() != 'gen') {
			// logistique 
			// fichiers 
		
			var fileRib = $("#rib").val();
    		if(fileRib.length != 0)
        	//On continue, l'input n'est pas vide
    	 	else
        	// Mets une claque à ton utilisateur, puis 
        	$("#rib").append('<span> Vous devez joindre le fichier Rib </span>'); 

        	var fileKbis = $("#kbis").val();
    		if(fileRib.length != 0)
        	//On continue, l'input n'est pas vide
    	 	else
        	// Mets une claque à ton utilisateur, puis 
        	$("#kbis").append('<span> Vous devez joindre le fichier Kbis </span>'); 

        	var fileRib = $("#bilan").val();
    		if(fileRib.length != 0)
        	//On continue, l'input n'est pas vide
    	 	else
        	// Mets une claque à ton utilisateur, puis 
        	$("#bilan").append('<span> Vous devez joindre le fichier Bilan </span>'); 

		} */

		// s'il y au moins une erreur 
		if (erreur) {
			e.preventDefault();
			$('.msgJs').text('Veuillez remplir tous les champs obligatoires');
		}
		
 	});

 

}); // FIN :  $(document).ready(function()

	

 
 
 
		
 