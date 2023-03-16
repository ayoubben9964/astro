<?php
/*
* Suppression d'un article
*/

// Ce code sert à supprimer un article de la base de données en fonction de l'ID de l'article qui est passé en paramètre dans l'URL. Voici ce que chaque ligne fait :

// include '../inc/fonctions.php'; : Inclut le fichier de fonctions PHP fonctions.php qui contient des fonctions utilisées par le script pour interagir avec la base de données.

// $id = $_GET['id_utilisateur']; : Récupère l'ID de l'article à supprimer à partir des paramètres de l'URL.

// if (suppArticlesById($id)) : : Appelle la fonction suppArticlesById() qui supprime l'article correspondant à l'ID de la base de données. Si la suppression est réussie, la condition sera évaluée comme vraie et le script poursuivra son exécution.

// header('Location: ./index.php'); : Redirige l'utilisateur vers la page d'index des articles pour l'interface d'administration.

// exit(); : Arrête l'exécution du script après la redirection.

// else : exit('Erreur s\'est produite !'); : Si la suppression a échoué, la condition sera évaluée comme fausse et le script affichera un message d'erreur à l'utilisateur. Le script s'arrêtera également après l'affichage du message.


include '../inc/fonctions.php';

$id = $_GET['id_utilisateur'];

if (suppArticlesById($id)) :
   header('Location: ./index.php');
   exit();
else :
   exit('Erreur s\'est produite !');
endif;
