<?php

ADD `statutEnAttente` INT(1) NULL AFTER `domaineValidation`, 
ADD `statutInitial` INT(1) NULL AFTER `statutEnAttente`, 
ADD `statutFinal` INT(1) NULL AFTER `stautInitial`, 
ADD `dateModification` DATE NULL DEFAULT CURRENT_TIMESTAMP AFTER `statutFinal`, 
ADD `timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP AFTER `dateModification`, 
ADD `nomChangement` CHAR(20) NULL AFTER `timestamp`;

// ce statut en attente signifiera que le formulaire est en attente de remplissage par un tiers
// si la fonction validationTiersExterne est utilisée et passée à 1 cela signifie que nous demandons la validation d'un tiers et donc que l'utilisateur n'est pas censé accéder en modification de nouveau à ce formulaire. Ainsi, dans le cas des Workflows Fournisseurs, cela signifie donc que le formulaire passe en attente mais le demandeur ne doit pas avoir la possibilité de rentrer en modification sur ce même formulaire. 
//ATTENTION : Si nous voulons utiliser cette fonctionnalité il est nécessaire de rajouter dans les requetes d'affichage des demandes en cours dans la clause du WHERE : 
// AND statutEnAttente=0

//Si afficher les formulaires en attente est souhaité, on peut donc totalement envisager un second tableau d'affichage en ne sélectionnant QUE les formulaires répondant à la requete précédente mais dont la valeur statutEnAttente=1
//Donc il est nécessaire d'ajouter AND statutEnAttente=1

if ($validationTiersExterne==0 && $this->post['envoiVersTiers'] /*Prévoir une modif à cet endroit la pour stipuler le submit qui nous intéresse*/) {	
$statutEnAttente=0; //On passe statut en attente à 0 si un formulaire (POST) est soumis, le GET n'est pas pris en considération car pour des problématiques évidentes de sécurité, nous n'aurons au niveau de notre organisation aucune écriture en BDD par un GET. On le passe à 0 aussi si la fonction dans le fichier de conf est désactivé. 
}
elseif ($validationTiersExterne==1 && $this->post['envoiVersTiers'] /*Prévoir une modif à cet endroit la pour stipuler le submit qui nous intéresse*/) {
$statutEnAttente=1;
//ATTENTION : Afin de rendre ce passage de variable à 0 le plus exhaustif possible, il serait intéressant de le combiner non pas avec l'action de soumettre un formulaire mais plutot au moment ou l'utilisateur clique sur le bouton qui nous intéresse à savoir : Envoyer à un tiers.
}
elseif ($this->post) {
$statutEnAttente=2; //Mis à 2 pour les tests, il sera pertinent de le laisser à 0, cependant, le laisser à deux de manière à savoir si la boucle passe par là uniquement si les conditions de dessus ne sont pas renseginées si c'est pas le cas il faudrait imaginer un this post complété par un NON $this->post['envoiVersTiers']
}







<?
