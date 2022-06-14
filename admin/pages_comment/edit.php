<?php

// Vérification id existe ET pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once('../req/_connect.php');

    // Réinitialisation de l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `categories` INNER JOIN `articles` ON articles.category_id = categories.id WHERE articles.id = :id;';
    $sql = 'SELECT users.nickname, articles.id, comments.articles_id, comments.content, comments.created_at FROM `comments` INNER JOIN `articles` ON comments.articles_id = articles.id INNER JOIN `users` ON comments.user_id = users.id WHERE articles.id = 92 ORDER BY comments.created_at DESC LIMIT 10;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération du produit
    $article = $query->fetch();

    // Vérification de l'existance du produit
    if (!$article) {
        $_SESSION['erreur'] = 'Cet article n\'existe pas';
        header('Location: admin/admin_dashboard_article.php');
    }
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: admin/admin_dashboard_article.php');
}

?>