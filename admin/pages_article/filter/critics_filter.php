<?php 
session_start();
// 1ère Etape
// Position de l'utilisateur (sur quelle page se trouve-t'il ?)
// S'il la page existe et qu'elle n'est pas vide

if(isset($_GET['numPages']) && !empty($_GET['numPages']))
{
    // On supprime les balises HTML et PHP de la chaîne avec strip_tags
    $currentPage = (int) strip_tags($_GET['numPages']);
}
else
{
    $currentPage = 1;
}


// Connexion à la base de donnée
require_once('../../req/_connect.php');

// Nombre total d'articles en base de données
$articleAmount = 'SELECT count(*) AS article_amount FROM `articles` WHERE category_id = 4';

// Préparation de la requête
$request = $database->prepare($articleAmount);

// Exécution de la requête
$request->execute();

// Récupération du nombre d'articles dans la base de données
$result = $request->fetch();

$nbrArticle = (int) $result['article_amount'];

// Combien d'articles par page ?
$articlesPerPage = 10;

// Nombre de pages totales pour afficher tous les articles
$nbrPages = ceil($nbrArticle / $articlesPerPage);

// Premier article pour la première page
// $firstArticle = ($currentPage * $articlesPerPage) - $articlesPerPage;
$firstArticle = ($currentPage - 1) * $articlesPerPage;


// 2ème Etape
// Sélectionne tous les articles en base de données et on les affiche 
// par date de création décroissante en limitant l'affichage entre le premier 
// article et le nombre d'article par page
$articleAmount = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 4 ORDER BY articles.created_at DESC LIMIT :firstarticle, :articlesperpage";

// Préparation de la requête
$request = $database->prepare($articleAmount);

$request->bindValue(':articlesperpage', $articlesPerPage, PDO::PARAM_INT);
$request->bindValue(':firstarticle', $firstArticle, PDO::PARAM_INT);


// Exécution de la requête
$request->execute();

// Récupération du résultat dans un tableau associatif
$articles = $request->fetchAll(PDO::FETCH_ASSOC);

// $database = null;

?>

<!DOCTYPE html>
<html lang="en/fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles - Critiques</title>

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
    <?php include('../../inc/_admin_header.php'); ?>
    <div class="container">
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
                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-3 px-3">
                    <a class="nav-link text-white" href="../../admin_dashboard_user.php">Utilisateurs</a>
                </li>
                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-3 px-3">
                    <a class="nav-link text-white" href="../../admin_dashboard_admin.php">Administrateurs</a>
                </li>
                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-3 px-3">
                    <a class="nav-link text-white" href="../../admin_dashboard_article.php">Articles</a>
                </li>
                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-3 px-3">
                    <a class="nav-link text-white" href="../../admin_dashboard_comment.php">Commentaires</a>
                </li>
                <li class="nav-item border border-secondary bg-primary d-flex justify-content-center mx-3 px-3">
                    <a class="nav-link text-white" href="../../admin_dashboard_support.php">Supports Q/R</a>
                </li>
            </div>
        </ul>
        </div>
    </div>
    <main class="container">
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
                <h1 class="d-flex justify-content-center my-5">Liste des articles - Critiques</h1>
                <div class="d-flex align-items-center justify-content-center my-5">
                    <a href="../add.php" class="btn btn-primary d-flex justify-content-center">Ajouter un article</a>
                </div>
                <nav class="navbar navbar-expand-lg bg-light my-5">
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
                                <li class="nav-item d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white btn btn-outline-primary" href="../filter/films_filter.php">Films</a>
                                </li>
                                <li class="nav-item d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white btn btn-outline-primary" href="../filter/series_filter.php">Séries</a>
                                </li>
                                <li class="nav-item d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white btn btn-outline-primary" href="../filter/actualities_filter.php">Actualités</a>
                                </li>
                                <li class="nav-item d-flex justify-content-center mx-2 px-4">
                                    <a class="nav-link text-white btn btn-primary" href="../filter/critics_filter.php">Critiques</a>
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
                        <!-- <th>Type</th> -->
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
                        foreach ($articles as $article) {
                        ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= $article['title'] ?></td>
                                <td><?= $article['name'] ?></td>
                                <!-- <td><?= $article['type_id'] ?></td> -->
                                <!-- <td><?= $article['content_one'] ?></td>
                                <td><?= $article['content_two'] ?></td>
                                <td><?= $article['content_three'] ?></td> -->
                                <td><?= $article['user_nickname'] ?></td>
                                <td><?= $article['created_at'] ?></td>
                                <td><?= $article['updated_at'] ?></td>
                                <td class="d-flex justify-content-evenly align-items-center">
                                    <a href="../details.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-info">Voir</a>
                                    <a href="../edit.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                                    <a href="../delete.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
        <nav>
            <ul class="pagination d-flex align-items-center justify-content-center my-3">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="?numPages=<?= $currentPage - 1 ?>" class="page-link">Page Précédente</a>
                </li>
                <?php for($i = 1; $i <= $nbrPages; $i++) { ?>
                    <li class="page-item <?= ($currentPage == $i) ? "active" : "" ?>">
                        <a href="?numPages=<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php } ?>
                <li class="page-item <?= ($currentPage == $nbrPages) ? "disabled" : "" ?>">
                    <a href="?numPages=<?= $currentPage + 1 ?>" class="page-link">Page Suivante</a>
                </li>
            </ul>
        </nav>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>