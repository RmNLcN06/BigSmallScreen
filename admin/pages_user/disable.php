<?php
// Démarrage session 
session_start();

// Vérification id existe ET pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../req/_connect.php');

    // Réinitialisation de l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `users` WHERE `id` = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération du produit
    $user = $query->fetch();

    // Vérification de l'existance du produit
    if (!$user) {
        $_SESSION['erreur'] = 'Cet id n\'existe pas';
        header('Location: ../admin_dashboard_user.php');
    }

    if ($user['active'] == 0) {
        $active = 1;
    } else {
        $active = 0;
    }

    $sql = 'UPDATE users SET active = :active WHERE id = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':active', $active, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    if($user['active'] == 0)
    {
        $_SESSION['message'] = 'Utilisateur activé';
        header('Location: ../admin_dashboard_user.php');
    }
    elseif($user['active'] == 1)
    {
        $_SESSION['message'] = 'Utilisateur désactivé';
        header('Location: ../admin_dashboard_user.php');
    }
    else 
    {
        $_SESSION['erreur'] = 'URL invalide';
        header('Location: ../admin_dashboard_user.php');
    }
}