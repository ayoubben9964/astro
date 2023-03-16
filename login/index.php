<?php
/*
 * Formulaire de connexion
 */

//  Ce code permet de traiter la soumission d'un formulaire de connexion. Voici ce que chaque ligne fait :

//     session_start(); : Démarre une session PHP pour l'utilisateur en cours.

//     include '../inc/fonctions.php'; : Inclut le fichier de fonctions PHP fonctions.php qui contient des fonctions utilisées par le script.

//     $errors = []; : Initialise un tableau vide pour stocker les éventuelles erreurs de validation du formulaire.

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') : : Vérifie si la méthode de requête HTTP est bien POST, ce qui indique que le formulaire a été soumis.

//     $email = cleanData($_POST['email']); et $pwd = cleanData($_POST['pwd']); : Récupère les valeurs des champs du formulaire de connexion et nettoie les données pour éviter les attaques par injection de code.

//     if ($email) : : Vérifie si l'email a été fourni.

//     if (findEmail($email)) : : Vérifie si l'email fourni existe dans la base de données.

//     if (password_verify($pwd, findEmail($email)['pwd'])) : : Vérifie si le mot de passe fourni correspond à celui enregistré dans la base de données pour cet utilisateur.

//     $_SESSION['nom'] = true; : Enregistre le fait que l'utilisateur est connecté en créant une variable de session 'nom' avec la valeur true.

//     if (findEmail($email)['role'] === 'admin') : redirectUrl('adminArticles/'); endif; : Vérifie si l'utilisateur est un administrateur, et le redirige vers la page d'administration si c'est le cas.

//     redirectUrl(); : Redirige l'utilisateur vers la page d'accueil si la connexion a réussi.
//     $errors[] = 'Le mot de passe est non valide.'; : Ajoute un message d'erreur au tableau d'erreurs si le mot de passe fourni est incorrect.

//     echo 'Votre email n\'est pas enregistré comme utilisateur de notre site.<br>'; echo 'Veuillez vous enregister avec <a href="../register">ce formulaire</a>'; exit(); : Affiche un message d'erreur et un lien vers la page d'inscription si l'email fourni n'existe pas dans la base de données.

//     $errors[] = 'Votre email est manquant ou incorrect !'; : Ajoute un message d'erreur au tableau d'erreurs si l'email n'a pas été fourni ou est incorrect.


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
                
            <!-- Cette partie de code sert à afficher les messages d'erreur générés par le script PHP. Si des erreurs ont été ajoutées au tableau $errors, cette boucle foreach affichera chaque message d'erreur dans une balise <li> d'une liste ordonnée. Cela permet à l'utilisateur de voir ce qui n'a pas fonctionné lors de la validation du formulaire. -->

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
