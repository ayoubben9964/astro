<?php
/*
* Ajout d'un article
*/
include '../inc/fonctions.php';

$titre = $contenu = $image_url = $created_at = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    $titre = cleanData($_POST['titre']);
    $contenu = cleanData($_POST['contenu']);
    $image_url = cleanData($_POST['image_url']);
    $created_at = cleanData($_POST['created_at']);

    insertArticles($titre, $contenu, $image_url, $created_at,$id_utilisateur);
    header('Location: ./index.php');
    exit();
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Ajout article</title>
    <link rel="stylesheet" href="../assets/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <h1>Ajout d'un article</h1>
        <form method="POST" class="form">
            <div>
                <label for="titre">titre</label>
                <input type="title" name="titre" id="titre" value="<?= $titre ?>">
            </div>
            <div>
                <label for="contenu">Contenu </label>
                <input type="text" name="contenu" id="contenu" value="<?= $contenu ?>">
            </div>
            <div>
                <label for="image_url">Image</label>
                <img src="image_url" alt="image_url" srcset="" value="<?= $image_url ?>">
                <!-- <input type="text" name="image_url" id="image_url" value="<?= $image_url ?>"> -->
            </div>
            <div>
                <label for="created_at">Date</label>
                <textarea name="created_at" id="created_at"><?= $created_at ?></textarea>
            </div>
            <div>
                <input type="submit" value="Ajouter">
                <a href="./"><button type="button">Annuler</button></a>
            </div>
            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <ul class="errors">
                        <li><?= $errors ?></li>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
    </main>
</body>

</html>
