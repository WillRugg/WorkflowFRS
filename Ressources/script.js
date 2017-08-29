/* -----------------------------------------------------------------------------------/
/  commencer tjs par $(document).ready(function() => faire quand la DOM est chargée   /
/ -----------------------------------------------------------------------------------*/
 $(document).ready(function() {

 	/* ---------------------------------------------------------------------------------------/
 	/	Affichage d une boite d'erreur si champ non saisis dans formulaire lors du "submit"  /
 	/----------------------------------------------------------------------------------------*/
 	// Formulaire de connexion  */
 	/* ------------------------ */
 	$('.formCreate.validateCreate').on('submit', function(e) {
 		// initialisation de la variable erreur
		var erreur = false;
		// formulaire de connection 
		// verif le nom 
		var monEntite = $('#entiteDemandeur');
		if (monEntite.val().length == 0 ) {
			erreur = true;
			//alert('toto');
			monEntite.addClass('errorJs');
		}
		 
		// s'il y au moins une erreur 
		if (erreur) {
			e.preventDefault();
			$('.msgJs').text('Veuillez remplir tous les champs de saisie');
		}
 	});

 	

}); // FIN :  $(document).ready(function()

	

 
 
 
		
 