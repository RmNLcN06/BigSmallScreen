<?php
// Démarrage session 
session_start();

// Vérification id existe ET pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../req/_connect.php');

    // Réinitialisation de l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `admins` WHERE `id` = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération du produit
    $admin = $query->fetch();

    // Vérification de l'existance du produit
    if (!$admin) {
        $_SESSION['erreur'] = 'Cet id n\'existe pas';
        header('Location: ../admin_dashboard_admin.php');
        die();
    }

    $sql = 'DELETE FROM admins WHERE id = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();
    $_SESSION['message'] = 'Administrateur supprimé';
    header('Location: ../admin_dashboard_admin.php');
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: ../admin_dashboard_admin.php');
}