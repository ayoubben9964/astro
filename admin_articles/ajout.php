<?php
/*
* Ajout d'un article
*/
include '../inc/fonctions.php';

// Le code que vous avez fourni est un script PHP qui sert à ajouter un article à une base de données. Il utilise la méthode POST pour récupérer les données envoyées depuis un formulaire HTML.

// Voici une brève explication de ce que fait chaque ligne de code :

// $titre = $contenu = $image_url = $created_at = ''; : Initialise les variables $titre, $contenu, $image_url et $created_at avec une chaîne vide pour éviter des erreurs si ces variables ne sont pas définies plus tard dans le script.

// if ($_SERVER['REQUEST_METHOD'] === 'POST') : : Vérifie si la méthode HTTP utilisée pour envoyer les données est POST. Si c'est le cas, cela signifie que les données du formulaire ont été envoyées et qu'elles peuvent être récupérées.

// $titre = cleanData($_POST['titre']); : Récupère le titre de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// $contenu = cleanData($_POST['contenu']); : Récupère le contenu de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// $image_url = cleanData($_POST['image_url']); : Récupère l'URL de l'image de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// $created_at = cleanData($_POST['created_at']); : Récupère la date de création de l'article depuis les données envoyées via le formulaire HTML et utilise la fonction cleanData() pour nettoyer les données et éviter les attaques de type injection SQL.

// insertArticles($titre, $contenu, $image_url, $created_at,$id_utilisateur); : Appelle une fonction insertArticles() pour insérer les données de l'article dans la base de données en utilisant les variables précédemment récupérées.

// header('Location: ./index.php'); : Redirige l'utilisateur vers la page d'accueil (index.php) après avoir inséré les données dans la base de données.

// exit(); : Arrête l'exécution du script pour éviter que d'autres instructions ne soient exécutées après la redirection.

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
