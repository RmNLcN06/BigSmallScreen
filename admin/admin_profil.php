<?php
session_start();
require('../req/_connect.php');
 

if(isset($_SESSION)) 
{
    $requser = $database->prepare("SELECT * FROM admins WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['nickname_new']) AND !empty($_POST['nickname_new']) AND $_POST['nickname_new'] != $user['nickname']) 
    {
        $nicknameNew = htmlspecialchars($_POST['nickname_new']);
        $insertNickname = $database->prepare("UPDATE admins SET nickname = ? WHERE id = ?");
        $insertNickname->execute(array($nicknameNew, $_SESSION['id']));
        header('Location: ?page=profil?id='.$_SESSION['id']);
    }

    if(isset($_POST['mail_new']) AND !empty($_POST['mail_new']) AND $_POST['mail_new'] != $user['mail']) 
    {
        $mailNew = filter_var($_POST['mail_new'], FILTER_VALIDATE_EMAIL);
        $insertMail = $database->prepare("UPDATE admins SET mail = ? WHERE id = ?");
        $insertMail->execute(array($mailNew, $_SESSION['id']));
        header('Location: ?page=profil?id='.$_SESSION['id']);
    }

    if(isset($_POST['pwd_new1']) AND !empty($_POST['pwd_new1']) AND isset($_POST['pwd_new2']) AND !empty($_POST['pwd_new2'])) 
    {
        $pwdNew1 = password_hash($_POST['pwd_new1'], PASSWORD_DEFAULT);
        $pwdNew2 = password_hash($_POST['pwd_new2'], PASSWORD_DEFAULT);

        if(password_verify($_POST['pwd_new1'], $pwdNew1) == password_verify($_POST['pwd_new2'], $pwdNew2)) 
        {
            $insertPwd = $database->prepare("UPDATE admins SET pwd = ? WHERE id = ?");
            $insertPwd->execute(array($pwdNew1, $_SESSION['id']));
            header('Location: admin_accueil.php');
        } 
        else 
        {
            $_SESSION['erreur'] = "Vos deux mots de passe ne correspondent pas !";
        }
    }
?>


<!DOCTYPE html>
<html lang="en/fr">
<a href=></a>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition de mon profil</title>

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
                <h1 class="d-flex justify-content-center my-5">Edition de mon profil</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group my-4">
                        <label for="nickname_new">Pseudo: </label>
                        <input type="text" name="nickname_new" placeholder="Pseudo" class="form-control" value="<?php echo $user['nickname']; ?>" />
                    </div>

                    <div class="form-group my-4">
                        <label for="mail_new">E-mail: </label>
                        <input type="email" name="mail_new" placeholder="Mail" class="form-control" value="<?php echo $user['mail']; ?>" />
                    </div>

                    <div class="form-group my-4">
                        <label for="pwd_new1">Mot de passe: </label>
                        <input type="password" name="pwd_new1" placeholder="Mot de passe" class="form-control"/>
                    </div>

                    <div class="form-group my-4">
                        <label for="pwd_new2">Confirmation - Mot de passe: </label>
                        <input type="password" name="pwd_new2" placeholder="Confirmation du mot de passe" class="form-control"/>
                    </div>

                    <div class="d-flex justify-content-center mb-5">
                        <input type="submit" value="Envoyer" class="btn btn-primary">
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>
</html>

<?php   
}
else {
//    header("Location: connexion.php");
echo "Ca ne marche pas !!!";
}
?>