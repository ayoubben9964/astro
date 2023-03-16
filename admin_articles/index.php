<?php
/*
* Page qui appel la vue pour la gestion des articles
*/
session_start();
include '../inc/fonctions.php';

$limit = 10;
$offset = 0;

require '../view/admin_articles/index_view.php';
