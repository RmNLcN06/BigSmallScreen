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
        header('Location: admin/admin_dashboard_admin.php');
    }
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: admin/admin_dashboard_admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'administrateur</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Détails de l'administrateur <?= $admin['firstname'] . " " . $admin['lastname']; ?></h1>

                <p>ID: <?= $admin['id']; ?></p>
                <p>Pseudo: <?= $admin['nickname']; ?></p>
                <p>Nom: <?= $admin['firstname']; ?></p>
                <p>Prénom: <?= $admin['lastname']; ?></p>
                <p>Email: <?= $admin['mail']; ?></p>
                <p>Créé le: <?= $admin['created_at']; ?></p>
                <p>Modifié le: <?= $admin['updated_at']; ?></p>
                <p>
                    <a href="../admin_dashboard_admin.php">Retour</a>
                </p>
            </section>
        </div>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>