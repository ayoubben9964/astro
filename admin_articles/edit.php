<?php
/*
* Mise à jour d'un article
*/
include '../inc/fonctions.php';

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
