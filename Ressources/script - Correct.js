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
			//alert('toto');
			monNomDemandeur.removeClass('alert-danger');
		}

		// verif Rs commande
		var maRsCommande = $('#rsCommande');
		if (maRsCommande.val().length == 0 ) {
			erreur = true;
			//alert('toto');
			maRsCommande.addClass('alert-danger');
		}  else {
			erreur = false;
			//alert('toto');
			maRsCommande.removeClass('alert-danger');
		}

		// verif rue commande
		var maRueCommande = $('#rueCommande');		 
		if (maRueCommande.val().length == 0 ) {
			erreur = true;
			maRueCommande.addClass('alert-danger');
		}  else {
			erreur = false;
			//alert('toto');
			maRueCommande.removeClass('alert-danger');
		}

		// verifcp commande
		var monCPCommande = $('#codePostal');
		if (monCPCommande.val().length == 0 ) {
			erreur = true;
			monCPCommande.addClass('alert-danger');
		} else {
			erreur = false;
			//alert('toto');
			monCPCommande.removeClass('alert-danger');
		} 

		// verif villecommande
		var maVilleCommande = $('#villeCommande');
		if (maVilleCommande.val().length == 0 ) {
			erreur = true;
			maVilleCommande.addClass('alert-danger');
		}  else {
			erreur = false;
			//alert('toto');
			maVilleCommande.removeClass('alert-danger');
		} 
		 
		// verif Payscommande
		var monPaysCommande = $('#paysCommande option:selected');
		if (monPaysCommande.val() == -1 ) {
			erreur = true;
			$('#paysCommande').addClass('alert-danger');
		}  else {
			erreur = false;
			//alert('toto');
			$('#paysCommande').removeClass('alert-danger');
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

	

 
 
 
		
 