<?php
/*
 * Page de deconnexion
 */

//  Ce code sert à déconnecter l'utilisateur en cours en détruisant sa session et en redirigeant vers la page d'accueil. Voici ce que chaque ligne fait :

// session_start(); : Démarre une session PHP pour l'utilisateur en cours.

// session_unset(); : Supprime toutes les variables de session actuellement définies.

// session_destroy(); : Détruit la session en cours.

// require '../inc/fonctions.php'; : Inclut le fichier de fonctions PHP fonctions.php qui contient des fonctions utilisées par le script.

// redirectUrl(); : Appelle la fonction redirectUrl() qui redirige l'utilisateur vers la page d'accueil.


session_start();
session_unset();
session_destroy();
require '../inc/fonctions.php';
redirectUrl();
