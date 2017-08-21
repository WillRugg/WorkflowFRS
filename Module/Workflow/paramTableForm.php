<?php

/*Ajout des nouvelles colonnes qui serviront à injecter les variables nécessaires au Workflow
Le but de cette opération est de créer les variables que nous utiliserons
Exemple : 
statutEnAttente
nbModifications (à y repenser celui ci sera créé après en réalisant une analyse)
statutInit
statutFinal
datePost
heurePost
nomChangement
dateDerniereRelance
heureDernierRelance
timestamp
id*/

//Chaque nouvelle variable utilisée au niveau du Workflow doit être renseignée ici

ALTER TABLE `tablefrs` 
ADD `statutEnAttente` INT(1) NULL AFTER `domaineValidation`, 
ADD `statutInitial` INT(1) NULL AFTER `statutEnAttente`, 
ADD `statutFinal` INT(1) NULL AFTER `stautInitial`, 
ADD `dateModification` DATE NULL DEFAULT CURRENT_TIMESTAMP AFTER `statutFinal`, 
ADD `timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP AFTER `dateModification`, 
ADD `nomChangement` CHAR(20) NULL AFTER `timestamp`;

?>