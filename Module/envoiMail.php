<?php
//Code PHP :

 //inclusion du fichier si le dossier "phpmailer" se trouve dans le même dossier que notre page web
include_once 'lib/libphp-phpmailer/PHPMailerAutoload.php';

//function envoiMail($adresseMail, $sujet, $message) {     
function envoiMail($mail) {     


    $mail = new PHPmailer();
    $mail->IsSMTP();
    //$mail->SMTPDebug=true;    //permet de voir les erreurs si ça ne fonctionne pas    
   
    
    // Connexion au serveur SMTP
    $mail->Host= 'smtp2.comeca-group.com';   
    $mail->Port = 25;
    
    // Cette partie est optionnelle si le serveur SMTP n'a pas besoin d'authentification
    $mail->SMTPAuth = false; 
    // mettre l'adresse email que founit l'hébergeur
    //$mail->Username = 'postmaster[at]monsite.e4y.fr'; 
    // le mot de passe pour se connecter à votre boite mail sur l'hébergeur
    //$mail->Password = 'monMotDePasse'; 


    // Permet d'écrire un mail en HTML (=> conversion des balises
    $mail->IsHTML(true); 
    // évite d'avoir des caractères chinois :)
    $mail->CharSet = 'UTF-8';
    // adresse mail du compte qui envoi 
    $mail->From ='accueil@comeca-group.com'; 
    // remplace le nom du destinateur lors de la lecture d'un email        
    $mail->FromName = "Workflow Fournisseur"; 

    /*
     // adresse du destinataire, plusieurs adresses possibles en même temps !
    $mail->AddAddress($adresseMail);
     // renvoi une copie de l'email au destinateur, fonctionnalité pas toujours opérationnelle
    // $mail->AddReplyTo('postmaster[at]monsite.e4y.fr');
    // l'entête = nom du sujet
    $mail->Subject=$sujet; 
    // le corps = le message en lui-même, codé en HTML si vous voulez
    $mail->Body=$message; 
    //$mail->AltBody="This is text only alternative body."; 
    // corps du message à afficher si le HTML n'est pas accepter par celui qui lit le message

    // affiche une erreur => pas toujours explicite
    if(!$mail->Send()) {
        $_REQUEST['error'] = $mail->ErrorInfo; 
    }
    $mail->SmtpClose(); */
    // ferme la connexion smtp et désalloue la mémoire...
    return $mail;
}   
// unset($mail); 