<?php
/*
* Vue Gestion des articles
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=, initial-scale=1.0">
   <title>Admin articles</title>
   <link rel="stylesheet" href="../assets/css/pico.min.css">
   <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
   <main class="container">
      <header class="header">
         <h1>Gestion des articles</h1>
         <p><a href="./ajout.php" role="button">Ajouter un articles</a></p>
         <p><a href="../login/deconnexion.php" role="button">Deconnexion</a></p>
      </header>
      <table>
         <thead>
            <tr>
               <th>Titre</th>
               <th>Contenur</th>
               <th>image_url</th>
               <th>Image</th>
               <th>Created at</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach (getArticlesLimit($limit, $offset) as $key => $value) : ?>
               <tr>
                  <td><?= $value['titre'] ?></td>
                  <td><?= $value['contenu'] ?></td>
                  <td><?= $value['image_url'] ?></td>
                  <td><?= $value['created_at'] ?></td>
                  <td>
                     <a href="./edit.php?id=<?= $value['id_utilisateur'] ?>" role="button">Edit</a>
                     <a href="./supp.php?id=<?= $value['id_utilisateur'] ?>" role="button" onclick="return confirm('Confirmer la suppression de cet articles ?');">Supprimer</a>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </main>
</body>

</html>