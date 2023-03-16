<?php
/*
* Page qui appel la vue pour la gestion des articles
*/


// Ce code sert à afficher la page d'index des articles pour l'interface d'administration. Voici ce que chaque ligne fait :

// session_start(); : Démarre une session PHP, permettant de stocker des variables de session pour maintenir l'état de l'utilisateur sur plusieurs pages. Les variables de session peuvent être utilisées pour stocker des informations telles que l'ID de l'utilisateur connecté.

// include '../inc/fonctions.php'; : Inclut le fichier de fonctions PHP fonctions.php qui contient des fonctions utilisées par le script pour interagir avec la base de données.

// $limit = 10; : Définit le nombre maximum d'articles à afficher par page.

// $offset = 0; : Définit l'offset pour la pagination, qui est initialement défini sur 0, ce qui signifie que la première page sera affichée.

// require '../view/admin_articles/index_view.php'; : Inclut le fichier de vue index_view.php qui contient le code HTML et PHP pour afficher la liste des articles dans l'interface d'administration.

session_start();
include '../inc/fonctions.php';

$limit = 10;
$offset = 0;

require '../view/admin_articles/index_view.php';
