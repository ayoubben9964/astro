<?php
/*
* Formulaire d'enregistrement d'un nouvel utilisateur
*/
session_start();

require '../inc/fonctions.php';

// Ce script PHP permet de traiter les données du formulaire d'inscription d'un nouvel utilisateur. Il commence par initialiser les variables $nom, $email, $pwd et $errors à une chaîne vide.

// Ensuite, si la méthode de requête est "POST", le script utilise la fonction cleanData() pour nettoyer les données envoyées par le formulaire et les stocke dans les variables correspondantes.

// Ensuite, le script vérifie si l'adresse e-mail saisie existe déjà dans la base de données en appelant la fonction findEmail(). Si l'adresse e-mail existe, le script stocke un message d'erreur dans la variable $errors. Sinon, il utilise la fonction insertUser() pour ajouter un nouvel utilisateur à la base de données avec les informations saisies, puis redirige l'utilisateur vers la page d'accueil.

// Si l'adresse e-mail et/ou le mot de passe sont manquants ou incorrects, le script stocke également un message d'erreur dans la variable $errors.

// Enfin, le script se termine par une balise de fermeture PHP, ce qui suggère que le code HTML qui suit est une partie de la vue d'inscription.

$nom = $email = $pwd = $errors = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    $nom = cleanData($_POST['nom']);
    $email = cleanData($_POST['email']);
    $pwd = cleanData($_POST['pwd']);

    if ($email && $pwd) :
        if (findEmail($email)) :
            $errors = 'Veuiller choisir un autre email car cette utilisateur existe !';
        else :
            insertUser($nom, $email, $pwd);
            $_SESSION['nom'] = true;
            header('Location: ../');
            exit();
        endif;
    else :
        $errors = 'Votre email ou mot de passe sont incorrect !';
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <h1>Enregistrer un nouvel utilisateur</h1>
        <form method="POST" class="form">
            <div>
                <label for="nom">Nom</label>
                <input type="login" name="nom" id="nom" value="<?= $nom ?>">
            </div>
            <div>
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" required value="<?= $email ?>">
            </div>
            <div>
                <label for="pwd">Mot de passe *</label>
                <input type="password" name="pwd" id="pwd" required value="<?= $pwd ?>">
            </div>
            <div>
                <input type="submit" value="Inscription">
            </div>

            <!-- Cela permet d'afficher les erreurs éventuelles lors de la soumission du formulaire d'inscription, dans une section dédiée à cet effet. Si la variable $errors n'est pas vide, alors on affiche les erreurs sous forme de liste. -->

            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <ul class="errors">
                        <li><?= $errors ?></li>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
        <p>* Informations obligatoires</p>
    </main>
</body>

</html>
