<?php
/*
* Fonctions utiles au fonctionnnent du projet
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Cette fonction sert à afficher les informations de débogage dans un format structuré et facile à lire pour les développeurs.

// Plus précisément, la fonction "dbug" accepte une variable en entrée et utilise la fonction "var_dump" pour afficher le type et la valeur de la variable. La fonction ajoute également un style CSS pour rendre l'affichage plus lisible avec un arrière-plan noir et une couleur de texte blanche.

// Cela peut être utile pour déboguer des erreurs dans le code ou comprendre le contenu des variables lors de l'exécution du programme. En affichant le contenu d'une variable, le développeur peut vérifier si la variable contient les données attendues ou s'il y a des erreurs dans le code.

function dbug($valeur)
{
   echo "<pre style='background-color:black;color:white;padding: 15px;overflow: auto;'>";
   var_dump($valeur);
   echo "</pre>";
}


// Cette fonction sert également à afficher les informations de débogage dans un format structuré et facile à lire pour les développeurs, mais elle ajoute également l'instruction "die()" qui arrête l'exécution du script après avoir affiché les informations de débogage.

// Plus précisément, la fonction "dd" accepte une variable en entrée et utilise la fonction "var_dump" pour afficher le type et la valeur de la variable. La fonction ajoute également un style CSS pour rendre l'affichage plus lisible avec un arrière-plan noir et une couleur de texte blanche, ainsi qu'un paramètre "height" pour définir la hauteur de la zone d'affichage.

// L'instruction "die()" arrête l'exécution du script après l'affichage des informations de débogage, ce qui peut être utile pour trouver des erreurs ou des problèmes dans le code en arrêtant l'exécution du script à un certain point.

// En somme, la fonction "dd" peut être utilisée pour afficher les informations de débogage de manière claire et arrêter l'exécution du script à un certain point pour faciliter le débogage.
function dd($valeur)
{
   echo "<pre style='background-color:black;color:white;padding: 15px;overflow: auto;height: 500px;'>";
   var_dump($valeur);
   // print_r($valeur);
   echo "</pre>";
   die();
}

// Cette fonction sert à nettoyer et valider les données d'entrée d'un utilisateur dans un formulaire ou une autre source d'entrée de données.

// Plus précisément, la fonction "cleanData" accepte une variable en entrée et utilise la fonction "strip_tags" pour supprimer toutes les balises HTML et la fonction "trim" pour supprimer les espaces inutiles en début et fin de chaîne. Ensuite, la fonction retourne la valeur nettoyée si elle n'est pas vide et est définie, sinon elle retourne false.

// Cela peut être utile pour prévenir les attaques XSS (cross-site scripting) en supprimant toutes les balises HTML et pour s'assurer que les données entrées par l'utilisateur sont bien formatées et valides. La fonction peut être utilisée avant de stocker les données dans une base de données ou de les utiliser dans un autre contexte pour éviter les erreurs ou les attaques potentielles.

// En somme, la fonction "cleanData" peut être utilisée pour nettoyer et valider les données entrées par l'utilisateur avant de les utiliser dans un contexte plus large, pour améliorer la sécurité et la fiabilité de l'application.

function cleanData($valeur)
{
   if (!empty($valeur) && isset($valeur)) :
      $valeur = strip_tags(trim($valeur));
      return $valeur;
   else :
      return false;
   endif;
}

// Cette fonction sert à valider si une chaîne de caractères ne contient que des lettres alphabétiques, c'est-à-dire si elle ne contient pas de chiffres, de caractères spéciaux ou d'espaces.

// Plus précisément, la fonction "textData" accepte une variable en entrée et utilise la fonction "preg_match" pour vérifier si la chaîne de caractères ne contient que des lettres alphabétiques (majuscules et/ou minuscules). Si la chaîne de caractères ne contient que des lettres alphabétiques, la fonction retourne true, sinon elle retourne false.

// Cela peut être utile pour valider les données entrées par l'utilisateur dans un formulaire qui nécessite des informations de texte telles que le nom ou le prénom, ou pour limiter les types de caractères acceptables dans certaines parties d'une application.

// Cependant, il est important de noter que cette fonction ne prend pas en compte les accents ou les caractères spéciaux utilisés dans certaines langues, ce qui peut entraîner des problèmes si la validation est appliquée dans un contexte multilingue.

// En somme, la fonction "textData" peut être utilisée pour valider si une chaîne de caractères ne contient que des lettres alphabétiques, mais elle doit être utilisée avec précaution en fonction du contexte et de la langue utilisée.

function textData($valeur)
{
   $valeur = preg_match('/^[a-z-A-Z]*$/', $valeur);
   return $valeur;
}

// Cette fonction sert à vérifier si l'ID d'un utilisateur passé en paramètre dans une requête HTTP GET est valide, c'est-à-dire s'il est défini et s'il est numérique.

// Plus précisément, la fonction "isGetIdValid" ne prend aucun paramètre d'entrée et utilise la superglobale $_GET pour vérifier si l'ID d'utilisateur est défini dans la requête GET avec la clé "id_utilisateur". Si cette clé existe et que la valeur associée est numérique, la fonction retourne true, sinon elle retourne false.

// Cela peut être utile pour s'assurer que les paramètres de la requête sont valides et éviter les erreurs ou les comportements inattendus du code. En particulier, cette fonction peut être utilisée pour éviter les attaques par injection de code SQL en vérifiant que l'ID de l'utilisateur est numérique et donc ne peut pas contenir de code malveillant.

// En somme, la fonction "isGetIdValid" peut être utilisée pour vérifier si l'ID d'un utilisateur passé en paramètre dans une requête HTTP GET est valide et éviter les erreurs de sécurité potentielles.

function isGetIdValid(): bool
{
   if (isset($_GET['id_utilisateur']) && is_numeric($_GET['id_utilisateur'])):
      return true;
   else:
      return false;
   endif;
}

// La fonction "getArticlesLimitHome" permet de récupérer un nombre limité d'articles depuis la base de données en utilisant une requête SQL avec une clause LIMIT et OFFSET.

// Les paramètres de la fonction sont les suivants :

// $limit : Le nombre maximum d'articles à récupérer.
// $offset : Le décalage à partir duquel la récupération d'articles doit commencer.
// En utilisant la clause LIMIT, la requête SQL ne retournera que les $limit premiers résultats de la table "articles" dans l'ordre décroissant des identifiants des utilisateurs qui ont créé ces articles. En utilisant la clause OFFSET, la requête SQL commencera à retourner les résultats à partir de la position $offset dans la table.

// La fonction utilise également l'extension PDO (PHP Data Objects) pour se connecter à la base de données, préparer et exécuter la requête SQL, puis retourner les résultats sous forme de tableau à deux dimensions.

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

// Cette fonction sert à récupérer un certain nombre d'articles à partir d'un certain offset (décalage) de la table "articles" dans une base de données. Les paramètres $limit et $offset définissent le nombre d'articles à récupérer et l'endroit à partir duquel commencer la récupération, respectivement.

// La fonction utilise PDO (PHP Data Objects) pour se connecter à la base de données et récupérer les données en utilisant une requête SQL préparée avec des paramètres liés pour éviter les attaques par injection SQL. La requête SQL sélectionne tous les articles dans la table "articles" triés par ordre décroissant d'id_utilisateur (l'identifiant de l'utilisateur qui a créé l'article), limité par le paramètre $limit et décalé par le paramètre $offset.

// La fonction retourne un tableau contenant les résultats de la requête SQL, qui peuvent ensuite être utilisés pour afficher les articles sur une page web, par exemple.

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

// Cette fonction sert à récupérer un article à partir de son identifiant dans la table "articles" d'une base de données. Le paramètre $idArticles correspond à l'identifiant de l'article à récupérer.

// La fonction utilise PDO (PHP Data Objects) pour se connecter à la base de données et récupérer les données en utilisant une requête SQL préparée avec un paramètre lié pour éviter les attaques par injection SQL. La requête SQL sélectionne tous les articles dans la table "articles" où l'identifiant de l'utilisateur est égal à celui fourni dans le paramètre $idArticles.

// La fonction retourne un tableau contenant les résultats de la requête SQL, qui contiendra un seul enregistrement car l'identifiant de l'article est unique. Cet enregistrement peut ensuite être utilisé pour afficher les détails de l'article sur une page web, par exemple.

function getarticlesById(int $idArticles): array
{
   require '../inc/pdo.php';
   $sqlRequest = "SELECT * FROM articles WHERE id_utilisateur = :idArticles";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':idArticles', $idArticles, PDO::PARAM_INT);
   $resultat->execute();
   return $resultat->fetch();
}

// Cette fonction sert à supprimer un article de la table "articles" dans une base de données à partir de son identifiant. Le paramètre $idArticles correspond à l'identifiant de l'article à supprimer.

// La fonction utilise PDO (PHP Data Objects) pour se connecter à la base de données et exécuter une requête SQL préparée avec un paramètre lié pour éviter les attaques par injection SQL. La requête SQL supprime l'enregistrement de la table "articles" où l'identifiant de l'article est égal à celui fourni dans le paramètre $idArticles.

// La fonction retourne une valeur booléenne indiquant si la requête SQL a été exécutée avec succès ou non. Si la requête a été exécutée avec succès, la fonction retourne TRUE, sinon elle retourne FALSE. Cette fonction peut être utilisée pour supprimer un article de la base de données lorsqu'un utilisateur décide de le supprimer sur une page web, par exemple.

function suppArticlesById(int $idArticles): bool
{
   require '../inc/pdo.php';
   $sqlRequest = "DELETE FROM articles WHERE id = :idArticles";
   $resultat = $conn->prepare($sqlRequest);
   $resultat->bindValue(':idArticles', $idArticles, PDO::PARAM_INT);
   return $resultat->execute();
}

// Cette fonction sert à insérer un nouvel article dans la table "articles" d'une base de données. Les paramètres $titre, $id_utilisateur, $contenu, $image_url et $created_at correspondent aux différentes informations de l'article à insérer.

// La fonction utilise PDO (PHP Data Objects) pour se connecter à la base de données et exécuter une requête SQL préparée avec des paramètres liés pour éviter les attaques par injection SQL. La requête SQL insère un nouvel enregistrement dans la table "articles" avec les valeurs fournies pour les différents champs.

// La fonction retourne l'identifiant (ID) du nouvel enregistrement inséré en utilisant la méthode lastInsertId() de l'objet PDO.

// Cette fonction peut être utilisée pour ajouter un nouvel article à la base de données lorsqu'un utilisateur publie un nouveau contenu sur un site web, par exemple.

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

// Cette fonction sert à mettre à jour les informations d'un article existant dans la table "articles" d'une base de données. Les paramètres $titre, $id_utilisateur, $contenu, $image_url et $created_at correspondent aux nouvelles valeurs des différents champs de l'article à mettre à jour.

// La fonction utilise PDO pour se connecter à la base de données et exécuter une requête SQL préparée avec des paramètres liés pour éviter les attaques par injection SQL. La requête SQL utilise la clause UPDATE pour modifier les valeurs de l'article avec les nouvelles valeurs fournies pour les différents champs.

// La fonction retourne un booléen indiquant si la mise à jour a été effectuée avec succès ou non.

// Cette fonction peut être utilisée pour permettre aux utilisateurs de mettre à jour le contenu de leurs articles publiés sur un site web, par exemple.

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

// Cette fonction sert à vérifier si un utilisateur est connecté à un site web. Elle utilise la variable de session "nom" pour déterminer si un utilisateur est connecté ou non.

// Si la variable de session "nom" est définie et sa valeur est vraie (true), la fonction retourne true, sinon elle retourne false.

// Cette fonction peut être utilisée pour limiter l'accès à certaines pages ou fonctionnalités du site uniquement aux utilisateurs connectés, en vérifiant si la fonction retourne true ou false.

function isUserLogin(): bool
{
   if (isset($_SESSION['nom']) && $_SESSION['nom'] == true) :
      return true;
   else :
      return false;
   endif;
}

// Cette fonction sert à rechercher un utilisateur dans une base de données en fonction de son adresse e-mail. Elle prend en paramètre l'adresse e-mail de l'utilisateur recherché.

// La fonction utilise une requête SQL pour sélectionner tous les enregistrements de la table "utilisateurs" où l'adresse e-mail correspond à celle passée en paramètre.

// Si la requête retourne un enregistrement correspondant, la fonction renvoie les données de cet utilisateur sous forme de tableau. Sinon, elle renvoie false.

// Cette fonction peut être utilisée pour vérifier si un utilisateur est déjà enregistré avec l'adresse e-mail fournie lors de l'inscription ou de la connexion à un site web.

function findEmail(string $email): array|bool
{
   require '../inc/pdo.php';

   $requete = 'SELECT * FROM utilisateurs where email = :email';
   $resultat = $conn->prepare($requete);
   $resultat->bindValue(':email', $email, PDO::PARAM_STR);
   $resultat->execute();
   return $resultat->fetch();
}

// La fonction insertUser permet d'insérer un nouvel utilisateur dans la table utilisateurs de la base de données. Elle prend en paramètres le nom, l'email et le mot de passe de l'utilisateur, et utilise la fonction password_hash pour hacher le mot de passe avant de l'insérer dans la base de données. La fonction retourne l'identifiant de l'utilisateur nouvellement créé.

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

// La fonction getUserAll permet de récupérer tous les utilisateurs stockés dans la base de données. Elle exécute une requête SQL pour sélectionner toutes les colonnes de toutes les lignes de la table utilisateurs et renvoie les résultats sous forme d'un tableau multidimensionnel. Cette fonction peut être utilisée pour afficher la liste complète des utilisateurs dans une application.

function getUserAll(): array
{
   require '../inc/pdo.php';
   $sqlRequest = "SELECT * FROM utilisateurs";

   $resultat = $conn->prepare($sqlRequest);
   $resultat->execute();
   return $resultat->fetchAll();
}

// Cette fonction est appelée lorsqu'une page demandée n'est pas trouvée sur le serveur, ce qui génère une erreur 404 (page non trouvée). Elle définit le code de réponse HTTP à 404, inclut une vue spécifique pour l'erreur 404 et termine le script en utilisant la fonction die(). Ainsi, l'utilisateur qui tente d'accéder à une page inexistante sera redirigé vers la vue 404, plutôt que de voir une page vide ou une erreur générique.

function error404(): void
{
   http_response_code(404);
   include('../view/404.php');
   die();
}


// La fonction redirectUrl permet de rediriger l'utilisateur vers une autre page web. Elle construit une URL en fonction du chemin passé en paramètre, ajoute le nom de domaine et la racine du site, et envoie une en-tête HTTP de redirection avec l'URL construite. Cela permet à l'utilisateur d'être redirigé automatiquement vers la nouvelle page web sans avoir besoin de cliquer sur un lien ou de saisir l'URL manuellement.

function redirectUrl(string $path = ''): void
{
   $homeUrl = 'http://' . $_SERVER['HTTP_HOST']. '/ceppic' ;
   $homeUrl .= '/'. $path;
   header("Location: {$homeUrl}");
   exit();
}