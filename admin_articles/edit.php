<?php
/*
* Mise à jour d'un article
*/
include '../inc/fonctions.php';

// Le code que vous avez fourni est un script PHP qui sert à mettre à jour les données d'un article existant dans une base de données. Voici une brève explication de ce que fait chaque ligne de code :

// (isGetIdValid()) ? $id = $_GET['id_utilisateur'] : error404(); : Vérifie si la valeur de l'ID de l'article à mettre à jour est valide en appelant une fonction isGetIdValid(). Si l'ID est valide, il est récupéré à partir de $_GET['id_utilisateur'] et stocké dans la variable $id. Sinon, une fonction error404() est appelée pour afficher une erreur 404 et arrêter l'exécution du script.

// $titreDb = getArticlesById($id)['titre']; : Récupère le titre de l'article à partir de la base de données en utilisant la fonction getArticlesById() et l'ID stocké dans la variable $id. Le titre récupéré est stocké dans la variable $titreDb.

// $contenuDb = getArticlesById($id)['contenu']; : Récupère le contenu de l'article à partir de la base de données en utilisant la fonction getArticlesById() et l'ID stocké dans la variable $id. Le contenu récupéré est stocké dans la variable $contenuDb.

// $image_urlDb = getArticlesById($id)['image_url']; : Récupère l'URL de l'image de l'article à partir de la base de données en utilisant la fonction getArticlesById() et l'ID stocké dans la variable $id. L'URL de l'image récupérée est stockée dans la variable $image_urlDb.

// $created_atDb = getArticlesById($id)['created_at']; : Récupère la date de création de l'article à partir de la base de données en utilisant la fonction getArticlesById() et l'ID stocké dans la variable $id. La date de création récupérée est stockée dans la variable $created_atDb.

// if ($_SERVER['REQUEST_METHOD'] === 'POST') : : Vérifie si la méthode HTTP utilisée pour envoyer les données est POST. Si c'est le cas, cela signifie que les données du formulaire ont été envoyées et qu'elles peuvent être récupérées.

// $titre = cleanData($_POST['titre']); : Récupère le nouveau titre de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// $contenu = cleanData($_POST['contenu']); : Récupère le nouveau contenu de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// $image_url = cleanData($_POST['image_url']); : Récupère la nouvelle URL de l'image de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// $created_at = cleanData($_POST['created_at']); : Récupère la nouvelle date de création de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// `updateArticles($id_utilisateur, $titre, $contenu, $image_url, $created_at);: Utilise la fonctionupdateArticles()pour mettre à jour les données de l'article dans la base de données. Les nouvelles valeurs du titre, du contenu, de l'URL de l'image et de la date de création sont transmises à la fonction, ainsi que l'ID de l'utilisateur. La fonctionupdateArticles()` effectue la mise à jour dans la base de données en utilisant une requête SQL appropriée.

// header('Location: ./index.php'); : Redirige l'utilisateur vers la page d'accueil après que les données ont été mises à jour dans la base de données. La fonction header() est utilisée pour envoyer une en-tête HTTP de redirection.

// exit(); : Arrête l'exécution du script après la redirection. Cela empêche tout code supplémentaire d'être exécuté après la redirection.

(isGetIdValid()) ? $id = $_GET['id_utilisateur'] : error404();

$titreDb = getArticlesById($id)['titre'];
$contenuDb = getArticlesById($id)['contenu'];
$image_urlDb = getArticlesById($id)['image_url'];
$created_atDb = getArticlesById($id)['created_at'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $titre = cleanData($_POST['titre']);
    $contenu = cleanData($_POST['contenu']);
    $image_url = cleanData($_POST['image_url']);
    $created_at = cleanData($_POST['created_at']);

    updateArticles($id_utilisateur, $titre, $contenu, $image_url, $created_at);

    header('Location: ./index.php');
    exit();
endif;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Edition article</title>
    <link rel="stylesheet" href="../assets/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <h1>Mise à jour d'un article</h1>
        <form method="POST" class="form">
            <div>
                <label for="titre">Titre</label>
                <input type="title" name="titre" id="titre" value="<?= $titreDb ?>">
            </div>
            <div>
                <label for="contenu">contenu </label>
                <input type="text" name="contenu" id="contenu" value="<?= $contenuDb ?>">
            </div>
            <div>
                <label for="image_url">image</label>
                <img src="image_url" alt=""value="<?= $yearDb ?>">
                <!-- <input type="text" name="image_url" id="image_url" value="<?= $yearDb ?>"> -->
            </div>
            <div>
                <label for="created_at">date</label>
                <textarea name="created_at" id="created_at"><?= $created_atDb ?></textarea>
            </div>
            <div>
                <input type="submit" value="Valider">
                <a href="./"><button type="button">Annuler</button></a>
            </div>
        </form>
    </main>
</body>

</html>
