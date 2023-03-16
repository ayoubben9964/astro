<?php
session_start();
include './inc/fonctions.php';

// Ces lignes de code définissent des variables utilisées pour la pagination des résultats. $limit représente le nombre maximum d'éléments à afficher sur une page et $offset représente le nombre d'éléments à sauter avant de commencer à afficher les éléments. Par exemple, si $limit est défini à 10 et $offset à 20, cela signifie que les résultats affichés commenceront à partir du 21ème élément et afficheront jusqu'à 30 éléments. Ces variables sont souvent utilisées pour diviser les résultats d'une requête en plusieurs pages afin d'améliorer les performances et la navigation pour les utilisateurs.

$limit = 2;
$offset = 0;

include './view/index_view.php';