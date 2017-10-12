/* -----------------------------------------------------------------------------------/
/  commencer tjs par $(document).ready(function() => faire quand la DOM est chargée   /
/ -----------------------------------------------------------------------------------*/
 $(document).ready(function() {

 	/* ---------------------------------------------------------------------------------------/
 	/	Affichage d une boite d'erreur si champ non saisis dans formulaire lors du "submit"  /
 	/----------------------------------------------------------------------------------------*/
 	// Formulaire de connexion  */
 	/* ------------------------ */
 	$('.validateCreate').on('submit', function(e) {
 		// initialisation de la variable erreur
		var erreur = false;
		 
		// verif entité sélectionnee
		var monEntite = $('#entiteDemandeur');
		if (monEntite.val().length == 0 ) {
			erreur = true;
			//alert('toto');
			monEntite.addClass('alert-danger');
		}
		 
		// s'il y au moins une erreur 
		if (erreur) {
			e.preventDefault();
			$('.alert-danger').alert('Veuillez remplir tous les champs obligatoires');
		}
 	});

 	



}); // FIN :  $(document).ready(function()

	

 
 
 
		
 