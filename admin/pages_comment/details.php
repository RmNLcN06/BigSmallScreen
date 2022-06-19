<?php 

// Démarrage session 
// session_start();

// Inclusion de la connexion à la base de donnée
require_once('../req/_connect.php');
// require ('../req/_security.php');



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

if (isset($_GET['articles_id']) && !empty($_GET['articles_id'])) {

    // Réinitialisation de l'id envoyé
    $articlesId = strip_tags($_GET['articles_id']);

    $sql = 'SELECT count(*) AS comment_amount FROM `comments` WHERE articles_id = :articles_id';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':articles_id', $articlesId, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération du produit
    $user = $query->fetch();
}


// Connexion à la base de donnée
// require_once('req/_connect.php');

// Nombre total d'articles en base de données
$commentAmount = 'SELECT count(*) AS comment_amount FROM `comments` WHERE articles_id = ?';
// $commentAmount = 'SELECT count(*) AS comment_amount FROM `comments` INNER JOIN articles ON comments.articles_id = articles.id INNER JOIN users ON comments.user_nickname = users.nickname WHERE articles_id = ?';

// Préparation de la requête
$request = $database->prepare($commentAmount);

// Exécution de la requête
$request->execute();

// Récupération du nombre d'articles dans la base de données
$result = $request->fetch();

$nbrComment = (int) $result['comment_amount'];

// Combien d'articles par page ?
$commentsPerPage = 10;

// Nombre de pages totales pour afficher tous les articles
$nbrPages = ceil($nbrComment / $commentsPerPage);

// Premier article pour la première page
// $firstComment = ($currentPage * $commentsPerPage) - $commentsPerPage;
$firstComment = ($currentPage - 1) * $commentsPerPage;


// 2ème Etape
// Sélectionne tous les articles en base de données et on les affiche 
// par date de création décroissante en limitant l'affichage entre le premier 
// article et le nombre d'article par page
$commentAmount = "SELECT * FROM comments WHERE articles_id = :articles_id ORDER BY comments.id DESC LIMIT :firstcomment, :commentsperpage";

// Préparation de la requête
$request = $database->prepare($commentAmount);

$request->bindValue(':articles_id', $articlesID, PDO::PARAM_INT);
$request->bindValue(':commentsperpage', $commentsPerPage, PDO::PARAM_INT);
$request->bindValue(':firstcomment', $firstComment, PDO::PARAM_INT);


// Exécution de la requête
$request->execute();

// Récupération du résultat dans un tableau associatif
$comments = $request->fetchAll(PDO::FETCH_ASSOC);

// $database = null;

?>

<!DOCTYPE html>
<html lang="en/fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commentaires</title>

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
                <h1 class="d-flex justify-content-center my-5">Liste des commentaires</h1>
                <table class="table">
                    <thead>
                        <th>ID du commentaire</th>
                        <th>ID de l'article</th>
                        <th>Titre de l'article</th>
                        <th>ID de l'utilisateur</th>
                        <th>Nom de l'utilisateur</th>
                        <th>Contenu de l'article</th>
                        <th>Publié le</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle Foreach sur la variable result
                        foreach ($comments as $comment) {
                        ?>
                            <tr>
                                <td><?= $comment['id'] ?><td>
                                <td><?= $comment['articles_id'] ?><td>
                                <td><?= $comment['title'] ?></td>
                                <td><?= $comment['user_id'] ?></td>
                                <td><?= $comment['user_nickname'] ?></td>
                                <td><?= $comment['content'] ?></td>
                                <td><?= $comment['created_at'] ?></td>
                                <td class="d-flex justify-content-evenly align-items-center">
                                    <a href="./pages_user/details.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-info mx-2">Créer</a>
                                    <a href="./pages_user/edit.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-warning mx-2">Modifier</a>
                                    <a href="./pages_user/delete.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-danger mx-2">Supprimer</a>
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
                    <a href="./admin_dashboard_comment.php?numPages=<?= $currentPage - 1 ?>" class="page-link">Page Précédente</a>
                </li>
                <?php for($i = 1; $i <= $nbrPages; $i++) { ?>
                    <li class="page-item <?= ($currentPage == $i) ? "active" : "" ?>">
                        <a href="./admin_dashboard_comment.php?numPages=<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php } ?>
                <li class="page-item <?= ($currentPage == $nbrPages) ? "disabled" : "" ?>">
                <a href="./admin_dashboard_comment.php?numPages=<?= $currentPage + 1 ?>" class="page-link">Page Suivante</a>
                </li>
            </ul>
        </nav>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>