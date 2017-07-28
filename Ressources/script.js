/* -----------------------------------------------------------------------------------/
/  commencer tjs par $(document).ready(function() => faire quand la DOM est chargée   /
/ -----------------------------------------------------------------------------------*/

 $(document).ready(function() {

 // datepicker
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
 
	 
	 
 var $table = $('#monGrandLivre').tablesorter({
		 
	    headerTemplate: '{content} {icon}',
		theme : 'bootstrap',
		headers: 
				{
					0: { sorter : false },
					1: { sorter : false },
					2: { sorter : false },
					3: { sorter : false },
					4: { sorter : false }
				}  ,
		widgets: ['zebra','columns', 'uitheme'] 
	 
	}) // $('#monGrandLivre').tablesorter

 	
 	 /* Fonction qui lors du clic du bouton bolquer ou debloquer fait la maj
 	  * en appelant une action 
 	  */
 
	 $('.updateStat').on('click',function(e){
			// supprime ce qui il est cense faire
			e.preventDefault();
			// closest pour retourner l'ensemble d'élements contenant le parent "tr" le plus proche
			// find pour chercher dans le parent du Td la classe statNew pour changer le statut
			
			var monStatut = $(this).closest('tr').find('.statNew');
			
			var monBouton= $(this).closest('tr').find('.updateStat');
			
			var monId = $(this).closest('tr').find('.id');
			
						
				// appel ajax pour lancer la maj en bdd crÃ©er la fonction statutAjaxAction
				$.ajax('index.php', {
					method:'GET',
					data:{	controller:'index',
							action:'statutAjax',
							id:monId.data('id'),
							ajax:1
						 },
					dataType: 'json',
				    success: function(data) {
				    	if (data.result) {
				    		monStatut.text(data.statutUpdate);
				    	 
				    		
				    		 if (data.statutUpdate === '10')
				    	        {
 
				    			 	monBouton.removeClass('btn-warning');
				    			 	monBouton.addClass('btn-info');
				    			 	monBouton.val("Bloquer");
				    	     }  else {
 
					    	    	 monBouton.removeClass('btn-info');
					    	    	 monBouton.addClass('btn-warning');
					    	    	 monBouton.val("Debloquer");
				    	     }
				  
						} else {
							alert("Modification impossible");
						}
				    }
				}); // Fin : $.ajax('index.php', {
				
							
		});  // Fin : $('.updateStat').on('click',function(e){
   
 
 		$('.exportCsv').on('click',function(e){
 			
 			e.preventDefault();
 			// je crée le tableau qui sera envoyé à exportAjax
 			var donnees = [];
 			
 			$("#monGrandLivre tbody > tr").each(function() {
 				
 				donnees.push({
	 					typPiece : $(this).find('td.typPiece').text(),
	 					cliPiece : $(this).find('td.cliPiece').text(),
	 					numCliPiece : $(this).find('td.numCliPiece').text(),
	 					numPiece : $(this).find('td.numPiece').text(),
	 					soldPiece : $(this).find('td.soldPiece').text(),
	 					devPiece : $(this).find('td.devPiece').text(),
	 					soldEuroPiece:$(this).find('td.soldEuroPiece').text(),
	 					dtFactPiece:$(this).find('td.dtFactPiece').text(),
	 					dtEchPiece:$(this).find('td.dtEchPiece').text(),
	 					jrnlPiece:$(this).find('td.jrnlPiece').text(),
	 					piece:$(this).find('td.piece').text(),
	 					dtcptPiece:$(this).find('td.dtcptPiece').text(),
	 					flagPiece:$(this).find('td.flagPiece').text(),
	 					statPiece:$(this).find('td.statPiece').text(),
	 					dateCessPiece:$(this).find('td.dateCessPiece').text()
 						})
 					
  					})  
  			
  			console.log(donnees);
 		 
 			$.ajax('index.php' , {
 				 method : 'POST',
 				 data:{	
 					controller:'index',
					action:'exportAjax',
					d:donnees,
					ajax:1
				 },
				 dataType: 'json',
                 success: function(data) {
                	 console.log(data.result);
                	 if (data.result) {
                		 alert(data.array);
                	 } 
                	 else {
                		 alert("Problème");
                	 }
                } 		

 			}); // Fin $.ajax('index.php' 
 		}); // Fin $('.exportCsv').on('click',function(e){
 		

}); // FIN :  $(document).ready(function()



 
		
 