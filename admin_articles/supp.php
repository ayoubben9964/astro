<?php
/*
* Suppression d'un article
*/
include '../inc/fonctions.php';

$id = $_GET['id_utilisateur'];

if (suppArticlesById($id)) :
   header('Location: ./index.php');
   exit();
else :
   exit('Erreur s\'est produite !');
endif;
