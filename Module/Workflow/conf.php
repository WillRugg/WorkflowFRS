<?php


//Le Worflow peut être de deux types, "transactionnel" ou "decisionnel"
//Valeurs : transactionnel ou decisionnel
$typeDeWorkflow="transactionnel";

//Un Workflow peut naître de la demande de plusieurs personnes pour un investissement par exemple, ou on peut imaginer la gestion de rapports d'étonnement ou de génération de rapports d'activité d'un groupe de travail qui peut être réalisé par plusieurs personnes. 
//Valeurs : 0(absence de demandes conjointes) ou 1(demandes conjointes)
$demandeConjointe=0;

//En cas d'absence d'un collaborateur est-ce que le workflow laisse la possibilité à un autre utilisateur du même groupe ou qui aura été défini au préalable de réaliser la validation en lieu et place du premier approbateur
//Valeurs : 0(absence de délégation) ou 1(délégation possible)
$delegationPossible=0;

//Groupe de demandeur possible en relation avec les unités organisationnelles ou les groupes qui sont définis dans l'active directory du groupe
// Valeurs : se référer à l'active Directory.
$demandeursPossible=0;

//Autoriser ou non l'autovalidation 
// Valeurs 0 ou 1
$autovalidationPossible=0;

//Definir le type de validation Responsable Hierarchique ou autre 
// Valeurs RespHier ou Personnalise
$typeValidation='Personnalise';

//Définir la fréquence à laquelle les informés auront accès à l'information 
// Valeurs 0 absence d'informations, 1 informés à la création et à la validation, 2 informés à chaque nouvelle étape (attention aux nombres de mails reçus)
$typeInformation=1;

//Définir si au niveau de ce Workflow une validation par un tiers externe est systématique ou non 
// Valeurs : 0 non systématique, 1 systématique
$validationTiersExterne=0;

//Définir si en cas de refus, la demande reste en attente au même poste (note : la compta n'approuve pas une demande, est-ce que cela reste en compta avec un statut en attente car refusé), ou si on redescend d'un degré de demande, ou de deux degrés. Exemple : sur une validation avec un demandeur et deux approbateurs, le deuxième approbateur refuse et le retour se fait au demandeur initial
//Valeurs : 0 reste au même degré de validaton, 1 descend de un degré, 2 descend de deux degrés
$retourRefus=1;



?>