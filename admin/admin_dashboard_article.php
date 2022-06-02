<?php

// Démarrage session 
session_start();

// Inclusion de la connexion à la base de donnée
require_once('../admin/req/_connect.php');
require ('../req/_security.php');

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

<!-- Google Fonts Link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

<!-- Font-Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include('../admin/inc/_admin_header.php'); ?>
    <?php include('../admin/inc/_admin_menu.php'); ?>
    <main class="container-fluid">
        <div class="row">
            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="./admin_dashboard_article.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
                        <a href="./admin_dashboard_article.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $_SESSION['message']; ?>
                    </div>
                    <?= $_SESSION['message'] = ""; ?>
                <?php
                }
                ?>
                <h1 class="d-flex justify-content-center my-5">Liste des articles</h1>
                <a href="../admin/pages_article/add.php" class="btn btn-primary d-flex justify-content-center">Ajouter un article</a>
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex justify-content-around" id="navbarNav">
                        <ul class="navbar-nav row col-12">
                            <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin_accueil.php">Accueil</a>
                            </li> -->
                            <div class="d-flex align-items-center justify-content-center">
                                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white" href="admin_dashboard_user.php">Films</a>
                                </li>
                                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white" href="admin_dashboard_admin.php">Séries</a>
                                </li>
                                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white" href="admin_dashboard_article.php">Actualités</a>
                                </li>
                                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white" href="admin_dashboard_comment.php">Critiques</a>
                                </li>
                            </div>
                        </ul>
                        </div>
                    </div>
                </nav>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Type</th>
                        <!-- <th>Contenu 1</th>
                        <th>Contenu 2</th>
                        <th>Contenu 3</th> -->
                        <th>Auteur</th>
                        <th>Créé le</th>
                        <th>Modifié le</th>
                        <th>Actions</th>
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
                                <!-- <td><?= $article['content_one'] ?></td>
                                <td><?= $article['content_two'] ?></td>
                                <td><?= $article['content_three'] ?></td> -->
                                <td><?= $article['user_nickname'] ?></td>
                                <td><?= $article['created_at'] ?></td>
                                <td><?= $article['updated_at'] ?></td>
                                <td class="d-flex justify-content-evenly align-items-center">
                                    <a href="./pages_article/disable.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-success col-2">Activer / Désactiver</a>
                                    <a href="./pages_article/details.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-info col-2">Voir</a>
                                    <a href="./pages_article/edit.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-warning col-2">Modifier</a>
                                    <a href="./pages_article/delete.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-danger col-2">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>