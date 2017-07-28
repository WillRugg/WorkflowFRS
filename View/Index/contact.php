<?php
$envoiMail = false;
 
if ($this->post) {

	if(empty($this->post['prenom'])){
		$prenomError = "Le prénom ne peut être vide";
	}
	if(empty($this->post['nom'])){
		$nomError = "Le nom ne peut être vide";
	}
	/*if(empty($this->post['tel'])){
		$telError = "Le tel ne peut être vide";
	}*/
	if(empty($this->post['mail'])){
		$mailError = "Le tel ne peut être vide";
	}
	if(empty($this->post['msg'])){
		$msgError = "Le message ne peut être vide";
	}
	// si error vide = pas d'erreur
	if(	empty($prenomError) && 
		empty($nomError) &&
		empty($telError) &&
		empty($mailError) &&
		empty($msgError)  ){

		//Chargement de la class
		require('Module/PHPMailer/class.phpmailer.php');
		//Instanciation de la class

		$phpMailer = new PHPmailer();

		//Configuration : 
		$phpMailer->IsHTML(true);

		//Destinataire :
		$phpMailer->AddAddress('nadine.noyer287@orange.fr'); 

		//Expéditeur 
		$phpMailer->From = $this->post['mail'];
		$phpMailer->FromName = 'Contact : '.$this->post['nom'];
		//Sujet
		$phpMailer->Subject = "Formulaire de contact pour EF_Elisabeth";
		//Contenu du  message en HTML : table  
	 	ob_start();
	 	
		?>
		<!-- envoi du mail en table pour générer du HTML -->
 		<table style="font-family:sans-serif">
			<tr>
				<th>Nom</th>
				<td><?php echo $this->post['nom']; ?></td>
			</tr>
			<tr>
				<th>Prénom</th>
				<td><?php echo $this->post['prenom']; ?></td>
			</tr>
			<tr>
				<th>mail</th>
				<td><?php echo $this->post['mail']; ?></td>
			</tr>
			<tr>
				<th>Numéro</th>
				<td><?php echo $this->post['tel']; ?></td>
			</tr>
			<tr>
				<th>Message</th>
				<td><?php echo nl2br($this->post['msg']); ?></td>
			</tr>
		</table>
			 
	<?php
		// concerne le HTML du contenu du mail 
		$phpMailer->Body = ob_get_contents();
		ob_end_clean();

		$envoiMail = $phpMailer->Send();
		}
	// FIN de : if ($_POST)
	}	
?>


	<div id="content">

		<figure class="bloc_presentation">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2891.297997975465!2d4.0897865!3d43.558673299999995
					!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b697f34eb67cf5%3A0x74909ab65d576662!2s90+Avenue+de+l&#39;
					Europe%2C+34280+La+Grande-Motte!5e0!3m2!1sfr!2sfr!4v1422001342472" 
					width="700" height="230" frameborder="0" style="border:0">
				</iframe>
			<figcaption>
				<p> Venez découvrir nos produit en boutique.
 			    </p>
 			</figcaption>
 		</figure>

		
	<form method="post" action="" class="formulaire">
		<ul>
			<li> <input type="text" name="prenom" maxlength="40" size="40" placeholder="Prénom" onfocus="this.value='' required" /></li>
			<li> <input type="text" name="nom" maxlength="40" size="40" placeholder="Nom"  /></li>
			<li> <input type="tel" name="tel" maxlength="10" placeholder="Téléphone"  /></li>
			<li> <input type="email" name="mail" placeholder="Email"  /></li>
			<li> <textarea name="msg" cols="50" rows="5" placeholder="Message" ></textarea></li>
		<?php
			if ($envoiMail) {
		?>
				<li><p>Votre message a bien été envoyé</p></li>
		<?php
			}
		?>
		</ul>
		<input id="valider" type="submit" name="" value="Envoyer" />
	</form>
	

</div>

<?php

	$app_html = ob_get_contents();
	ob_end_clean();
	require('Layout/main.php') ;

?>