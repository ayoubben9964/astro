<?php
/*
* Connexion à la base de donnée
*/

// Ce bloc de code é une configuration de connexion à une base de données MySQL en utilisant l'extension PDO de PHP. Il définit les informations de connexion telles que le nom d'utilisateur, le mot de passe et le nom de la base de données à utiliser. Il définit également les options de connexion telles que le jeu de caractères et le mode de récupération de données par défaut. Enfin, il capture toute erreur de connexion à la base de données en utilisant une exception PDOException et affiche un message d'erreur.

$dsn = 'mysql:host=localhost;dbname=astronomie';
$useDbName = 'root';
$userDbPassword = '';

try {
    $conn = new PDO(
        $dsn,
        $useDbName,
        $userDbPassword,
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    );
} catch (PDOException $erreur) {
    echo 'Erreur de connexion: ' . $erreur->getMessage();
    die();
}

