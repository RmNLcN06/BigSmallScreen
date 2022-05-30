<?php

// Démarrage session 
session_start();

// Inclusion de la connexion à la base de donnée
require_once('req/_connect.php');

$sql = 'SELECT * FROM `articles`';

// Préparation requête
$query = $database->prepare($sql);

// Exécution requête
$query->execute();

// Stockage résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('req/_close.php');
?>

<!DOCTYPE html>
<html lang="en/fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="./index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $_SESSION['erreur']; ?>
                    </div>
                    <?= $_SESSION['erreur'] = ""; ?>
                <?php
                }
                ?>
                <?php
                if (!empty($_SESSION['message'])) {
                ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <a href="./index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $_SESSION['message']; ?>
                    </div>
                    <?= $_SESSION['message'] = ""; ?>
                <?php
                }
                ?>
                <h1>Liste des articles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Type</th>
                        <th>Contenu 1</th>
                        <th>Contenu 2</th>
                        <th>Contenu 3</th>
                        <th>Auteur</th>
                        <th>Créé le</th>
                        <th>Modifié le</th>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle Foreach sur la variable result
                        foreach ($result as $article) {
                        ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= $article['title'] ?></td>
                                <td><?= $article['category_id'] ?></td>
                                <td><?= $article['type_id'] ?></td>
                                <td><?= $article['content_one'] ?></td>
                                <td><?= $article['content_two'] ?></td>
                                <td><?= $article['content_three'] ?></td>
                                <td><?= $article['author'] ?></td>
                                <td><?= $article['created_at'] ?></td>
                                <td><?= $article['updated_at'] ?></td>
                                <td>
                                    <a href="disable.php?id=<?= $article['id'] ?>" class="btn btn-success mx-2">Activer / Désactiver</a>
                                    <a href="details.php?id=<?= $article['id'] ?>" class="btn btn-info mx-2">Voir</a>
                                    <a href="edit.php?id=<?= $article['id'] ?>" class="btn btn-warning mx-2">Modifier</a>
                                    <a href="delete.php?id=<?= $article['id'] ?>" class="btn btn-danger mx-2">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un article</a>
            </section>
        </div>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>