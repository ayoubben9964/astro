<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astronomie du blog</title>
</head>
<body>
<header class="header">
            <h1>Astronomie Blog</h1>
            <p>
                <?php if (isUserLogin()) { ?>
                    <a href="./login/deconnexion.php" role="button">Deconnexion</a>
                <?php } else { ?>
                    <a href="./login/index.php" role="button">Connexion</a>
                <?php } ?>
                <a href="./register/register.php" role="button">Inscription</a> </p>
<section class="articles">
<?php foreach (getArticlesLimitHome($limit, $offset) as $article) { ?>
                <figure class="articles">
                    <figcaption>
                        <h4><?= $article['titre'] ?></h4>
                        <p><?= $article['contenu'] ?></p>
                        <p><?= $article['image_url'] ?></p>
                        <p><?= $article['created_at'] ?></p>
                    </figcaption>
                </figure>
            <?php } ?>
</section>
<footer>

</footer>
</body>
</html>