<?php
// Démarrage session 
session_start();

// Vérification id existe ET pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../req/_connect.php');

    // Réinitialisation de l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `articles` WHERE `id` = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération de l'article
    $article = $query->fetch();

    // Vérification de l'existance de l'article
    if (!$article) {
        $_SESSION['erreur'] = 'Cet id n\'existe pas';
        header('Location: ../admin_dashboard_article.php');
        die();
    }

    $sql = 'DELETE FROM articles WHERE id = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();
    $_SESSION['message'] = 'Article supprimé';
    header('Location: ../admin_dashboard_article.php');
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: ../admin_dashboard_article.php');
}