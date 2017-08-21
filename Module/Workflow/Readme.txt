Bienvenue dans le dossier relatif au moteur du Workflow.
1ere version : 
Utilisation d'un fichier conf.php afin de définir les variables qui vont être utilsées durant le déroulement du workflow.

Le problème de raisonnement a soulevé que le problème a été mis à l'envers. Plutôt que de voir le moteur de Workflow comme un .... moteur, voyons le comme un lecteur. 
Grosso modo, le workflow va être construit de manière à regarder les modifications qu'il y a eu et de les interpréter. Nous n'allons pas demander au Workflow de réaliser des actions.

Ainsi, nous allons construire un formulaire qui répond à différents critères de manière totalement indépendantes de la construction du formulaire mais sur des variables standards que nous définirons dans la BDD en dur. Nous aurons la possibilité de ne pas utiliser toutes les variables définies dans la table de réception du formulaire. 

Bref, place aux explications.

Il est nécessaire de construire deux tables : 
Une table classique de réception du dernier formulaire : Méthode INSERT INTO + UPDATE lorsque des modifications sont réalisées. 

On peut imaginer des noms de variable type : 
statutEnAttente
nbModifications
statutInit
statutFinal
datePost
heurePost
nomChangement
dateDerniereRelance
heureDernierRelance
timestamp
id

Il est aussi nécessaire de créer une seconde table dans la base de données qui comporte les mêmes données que la table initiale en ayant comme clé primaire non pas l'id de la demande mais plutot l'id du log.

Amélioration : Peut être la porte d'entrée pour un système de versionning pour les admins. 

Ainsi, si on comprend bien au moment du post : Deux tables sont tapées une est mise à jour et l'autre se boit ajoutée une ligne. 

Une fois le post réalisé, nous lancerons le "programme Workflow" qui viendra analyser les différentes modifications réalisées qui les interprétera et qui du coup réalisera des actions en conséquence. 

Pour les relances, réfléchir à un script sur le serveur qui tournera avec un crontab et qui regardera où en sont les différentes demandes et enverra des relances le cas échéant. 

On tient le bon bout.

