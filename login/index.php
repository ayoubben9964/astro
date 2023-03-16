<?php
/*
 * Formulaire de connexion
 */
session_start();
include '../inc/fonctions.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $email = cleanData($_POST['email']);
    $pwd = cleanData($_POST['pwd']);

    if ($email) :
        if (findEmail($email)) :
            if (password_verify($pwd, findEmail($email)['pwd'])) :
                $_SESSION['nom'] = true;

                if (findEmail($email)['role'] === 'admin') :
                   redirectUrl('adminArticles/');
                endif;

                redirectUrl();
            else :
                $errors[] = 'Le mot de passe est non valide.';
            endif;
        else :
            echo 'Votre email n\'est pas enregistré comme utilisateur de notre site.<br>';
            echo 'Veuillez vous enregister avec <a href="../register">ce formulaire</a>';
            exit();
        endif;

    else :
        $errors[] = 'Votre email est manquant ou incorrect !';
    endif;

endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/pico.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main class="container">
        <form method="POST" class="form">
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="pwd">Mot de passe</label>
                <input type="password" name="pwd" id="pwd" >
            </div>
            <div>
                <input type="submit" value="Connexion">
            </div>
            <div class="errors">
                <ul class="errors">
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            </div>
        </form>
    </main>
</body>

</html>
