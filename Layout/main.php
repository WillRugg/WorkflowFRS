<?php
	$admin = false;
	$session = 0;

?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo  $app_title?> - Comeca </title>
		
		<!-- pour etre trouvé sur google -->
		<meta name="descriptif" content="comeca" <?php echo  $app_desc?> />
		<meta name="Author" content="nadine noyer">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
		
		<!-- pour bootstrap -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!--<link rel="stylesheet" type="text/css" href="Ressources/style.css"/> -->
		 
		 <!-- Latest compiled and minified CSS -->
		<!--		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

		<!-- Optional theme  -->
	 	<!--	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 	integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

		<!-- Latest compiled and minified JavaScript -->
		<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->


		<!-- on charge le fichier de ressources pour serveur vairoa -->
 		<link rel="stylesheet" href="Ressources/bootstrap/css/bootstrap-theme.min.css"> 
		<link rel="stylesheet" href="Ressources/bootstrap/css/bootstrap.min.css">
	
	  	<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	  
		 
	</head>

	<body id="<?php echo $app_body;?>">
		
		<div class="container" >
			<?php	
			//-- include header --
			require("Layout/header.php");	
			?>
			<div>
				<?php echo $app_html; ?>
			</div>
	 
		
		<!-- script JS si le fichier est chargé  
		<script type="text/javascript" src="Ressources/bootstrap/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="Ressources/jquery-ui.js"></script>
	    <script src="Ressources/script.js"> </script>    -->
		 
	  	<script type="text/javascript" src="Ressources/jquery-2.1.3.js"></script>  
	  	<script type="text/javascript" src="Ressources/jquery-ui.js"> </script> 
	  	<script type="text/javascript" src="Ressources/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="Ressources/script.js"> </script>   



		</div>
		 
	</body>
		
</html>