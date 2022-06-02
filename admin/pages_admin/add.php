<?php
// Démarrage session 
session_start();

if ($_POST) {
    if (
        isset($_POST['nickname']) && !empty($_POST['nickname'])
        && isset($_POST['firstname']) && !empty($_POST['firstname'])
        && isset($_POST['lastname']) && !empty($_POST['lastname'])
        && isset($_POST['mail']) && !empty($_POST['mail'])
        && isset($_POST['pwd']) && !empty($_POST['pwd'])
    ) {
        // Inclusion de la connexion à la base de donnée        
        require_once('../req/_connect.php');

        // Réinitialisation des données envoyées
        $nickname = strip_tags($_POST['nickname']);
        $firstname = strip_tags($_POST['firstname']);
        $lastname = strip_tags($_POST['lastname']);
        $mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);;
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $confirmPwd = password_hash($_POST['confirmPwd'], PASSWORD_DEFAULT);

        $verifyPwd = password_verify($_POST['pwd'], $pwd);
        $verifyConfirmPwd = password_verify($_POST['confirmPwd'], $confirmPwd);

        if($verifyPwd === $verifyConfirmPwd) 
        {
        $sql = 'INSERT INTO `admins` (`nickname`, `firstname`, `lastname`, `mail`, `pwd`) VALUES (:nickname, :firstname, :lastname, :mail, :pwd);';

        $query = $database->prepare($sql);

        $query->bindValue(':nickname', $nickname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':pwd', $pwd, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Nouveau profil administrateur ajouté";
        require_once('../req/_close.php');

        header('Location: ../admin_dashboard_admin.php');
        } 
        else 
        {
            $_SESSION['erreur'] = "Le mot de passe et sa confirmation sont différents.";
        }
    } 
    else 
    {
        $_SESSION['erreur'] = "Le formulaire est incomplet.";
    }
}

?>

<!DOCTYPE html>
<html lang="en/fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un administrateur</title>

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
                        <a href="./add.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $_SESSION['erreur']; ?>
                    </div>
                    <?= $_SESSION['erreur'] = ""; ?>
                <?php
                }
                ?>
                <h1>Ajouter un administrateur</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="nickname">Pseudo</label>
                        <input type="text" id="nickname" name="nickname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Nom</label>
                        <input type="text" id="firstname" name="firstname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Prénom</label>
                        <input type="text" id="lastname" name="lastname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mail">E-mail</label>
                        <input type="mail" id="mail" name="mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" id="pwd" name="pwd" class="form-control">
                        <input type="checkbox" id="showPwd"> Montrer mot de passe
                    </div>
                    <div class="form-group">
                        <label for="confirmPwd">Confirmer Mot de passe</label>
                        <input type="password" id="confirmPwd" name="confirmPwd" class="form-control">
                        <input type="checkbox" id="showConfirmPwd"> Montrer confirmation mot de passe
                    </div>
                    <!-- <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="number" id="nombre" name="nombre" class="form-control">
                    </div> -->
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </section>
        </div>
    </main>

    <!-- JavaScript File -->
    <script src="../../app/js/script.js"></script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>