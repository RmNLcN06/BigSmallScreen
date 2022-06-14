<?php
// Démarrage session 
session_start();

if ($_POST) {
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['nickname']) && !empty($_POST['nickname'])
        && isset($_POST['firstname']) && !empty($_POST['firstname'])
        && isset($_POST['lastname']) && !empty($_POST['lastname'])
        && isset($_POST['mail']) && !empty($_POST['mail'])
    ) {
        // Inclusion de la connexion à la base de donnée        
        require_once('../req/_connect.php');

        // Réinitialisation des données envoyées
        $id = strip_tags($_POST['id']);
        $nickname = strip_tags($_POST['nickname']);
        $firstname = strip_tags($_POST['firstname']);
        $lastname = strip_tags($_POST['lastname']);
        $mail = strip_tags($_POST['mail']);

        $sql = 'UPDATE users SET nickname = :nickname, firstname = :firstname, lastname = :lastname, mail = :mail WHERE id = :id;';

        $query = $database->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nickname', $nickname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Utilisateur modifié";
        require_once('../req/_connect.php');
        header('Location: ../admin_dashboard_user.php');
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

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
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: ../admin_dashboard_user.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>

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
                        <a href="../pages_user/edit.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $_SESSION['erreur']; ?>
                    </div>
                    <?= $_SESSION['erreur'] = ""; ?>
                <?php
                }
                ?>
                <h1>Modifier un utilisateur</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="nickname">Pseudo</label>
                        <input type="text" id="nickname" name="nickname" class="form-control" value="<?= htmlentities($user['nickname']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Nom</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?= htmlentities($user['firstname']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Prénom</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" value="<?= htmlentities($user['lastname']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="email" id="mail" name="mail" class="form-control" value="<?= htmlentities($user['mail']); ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <div class="d-flex justify-content-center mb-5">
                        <input type="submit" value ="Envoyer" class="btn btn-primary">
                    </div>
                    <!-- <button class="btn btn-primary">Envoyer</button> -->
                </form>
            </section>
        </div>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>