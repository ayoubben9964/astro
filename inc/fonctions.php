<?php
/*
* Fonctions utiles au fonctionnnent du projet
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');

function dbug($valeur)
{
   echo "<pre style='background-color:black;color:white;padding: 15px;overflow: auto;'>";
   var_dump($valeur);
   echo "</pre>";
}

function dd($valeur)
{
   echo "<pre style='background-color:black;color:white;padding: 15px;overflow: auto;height: 500px;'>";
   var_dump($valeur);
   // print_r($valeur);
   echo "</pre>";
   die();
}

function cleanData($valeur)
{
   if (!empty($valeur) && isset($valeur)) :
      $valeur = strip_tags(trim($valeur));
      return $valeur;
   else :
      return false;
   endif;
}

function textData($valeur)
{
   $valeur = preg_match('/^[a-z-A-Z]*$/', $valeur);
   return $valeur;
}

function isGetIdValid(): bool
{
   if (isset($_GET['id_utilisateur']) && is_numeric($_GET['id_utilisateur'])):
      return true;
   else:
      return false;
   endif;
}

function getArticlesLimitHome(int $limit, int $offset): array
{
   require './inc/pdo.php';
   $sqlRequest = "SELECT * FROM articles ORDER BY id_utilisateur DESC LIMIT :limit OFFSET :offset";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':limit', $limit, PDO::PARAM_INT);
   $resultat->bindValue(':offset', $offset, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetchAll();
}

function getArticlesLimit(int $limit, int $offset): array
{
   require '../inc/pdo.php';
   $sqlRequest = "SELECT * FROM articles ORDER BY id_utilisateur DESC LIMIT :limit OFFSET :offset";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':limit', $limit, PDO::PARAM_INT);
   $resultat->bindValue(':offset', $offset, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetchAll();
}

function getarticlesById(int $idArticles): array
{
   require '../inc/pdo.php';
   $sqlRequest = "SELECT * FROM articles WHERE id_utilisateur = :idArticles";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':idArticles', $idArticles, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetch();
}

function suppArticlesById(int $idArticles): bool
{
   require '../inc/pdo.php';
   $sqlRequest = "DELETE FROM articles WHERE id = :idArticles";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':idArticles', $idArticles, PDO::PARAM_INT);
   return $resultat->execute();
}

function insertArticles(string $titre, int $id_utilisateur, string $contenu, string $image_url, string $created_at): int
{
   require '../inc/pdo.php';
   $requete = 'INSERT INTO articles (titre,id_utilisateur,contenu,image_url,created_at) VALUES (:titre, :id_utilisateur, :contenu, :image_url, :created_at, now(), now())';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':titre', $titre, PDO::PARAM_STR);
   $resultat->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
   $resultat->bindValue(':contenu', $contenu, PDO::PARAM_STR);
   $resultat->bindValue(':image_url', $image_url, PDO::PARAM_STR);
   $resultat->bindValue(':created_at', $created_at, PDO::PARAM_STR);
   $resultat->execute();
   return $conn->lastInsertId();
}

function updateArticles(string $titre, int $id_utilisateur, string $contenu, string $image_url, string $created_at): bool
{
   require '../inc/pdo.php';
   $requete = 'UPDATE articles SET titre = :titre, id_utilisateur = :id_utilisateur,contenu = :contenu, contenu = :contenu,image_url = :image_url, created_at = :created_at; modified = now() WHERE id = :id';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':titre', $titre, PDO::PARAM_STR);
   $resultat->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
   $resultat->bindValue(':contenu', $contenu, PDO::PARAM_STR);
   $resultat->bindValue(':image_url', $image_url, PDO::PARAM_STR);
   $resultat->bindValue(':created_at', $created_at, PDO::PARAM_STR);
   $resultat->execute();
   return $resultat->execute();
}

function isUserLogin(): bool
{
   if (isset($_SESSION['nom']) && $_SESSION['nom'] == true) :
      return true;
   else :
      return false;
   endif;
}

function findEmail(string $email): array|bool
{
   require '../inc/pdo.php';

   $requete = 'SELECT * FROM utilisateurs where email = :email';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':email', $email, PDO::PARAM_STR);
   $resultat->execute();
   return $resultat->fetch();
}

function insertUser(string $nom, string $email, string $pwd): int
{
   require '../inc/pdo.php';
   $pwd = password_hash($pwd, PASSWORD_DEFAULT);

   $requete = 'INSERT INTO utilisateurs (nom,prenom,email,pwd,created_at) VALUES (:nom, :email, :pwd, now())';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':nom', $nom, PDO::PARAM_STR);
   $resultat->bindValue(':email', $email, PDO::PARAM_STR);
   $resultat->bindValue(':pwd', $pwd, PDO::PARAM_STR);
   $resultat->execute();
   dd($conn->lastInsertId());
   return $conn->lastInsertId();
}

function getUserAll(): array
{
   require '../inc/pdo.php';
   $sqlRequest = "SELECT * FROM utilisateurs";

   $resultat = $conn->prepare($sqlRequest);
   $resultat->execute();
   return $resultat->fetchAll();
}

function error404(): void
{
   http_response_code(404);
   include('../view/404.php');
   die();
}

function redirectUrl(string $path = ''): void
{
   $homeUrl = 'http://' . $_SERVER['HTTP_HOST']. '/ceppic' ;
   $homeUrl .= '/'. $path;
   header("Location: {$homeUrl}");
   exit();
}