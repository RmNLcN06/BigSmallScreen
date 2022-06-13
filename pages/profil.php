<?php
 
require('req/_connect.php');
 
if(isset($_SESSION['id'])) 
{
    $requireUser = $database->prepare("SELECT * FROM users WHERE id = ?");
    $requireUser->execute(array($_SESSION['id']));
    $user = $requireUser->fetch();

    if(isset($_POST['nickname_new']) AND !empty($_POST['nickname_new']) AND $_POST['nickname_new'] != $user['nickname']) 
    {
        $nicknameNew = htmlspecialchars($_POST['nickname_new']);
        $insertNickname = $database->prepare("UPDATE users SET nickname = ? WHERE id = ?");
        $insertNickname->execute(array($nicknameNew, $_SESSION['id']));
        header('Location: ?page=profil?id='.$_SESSION['id']);
    }

    if(isset($_POST['mail_new']) AND !empty($_POST['mail_new']) AND $_POST['mail_new'] != $user['mail']) 
    {
        $mailNew = filter_var($_POST['mail_new'], FILTER_VALIDATE_EMAIL);
        $insertMail = $database->prepare("UPDATE users SET mail = ? WHERE id = ?");
        $insertMail->execute(array($mailNew, $_SESSION['id']));
        header('Location: ?page=profil?id='.$_SESSION['id']);
    }

    if(isset($_POST['pwd_new1']) AND !empty($_POST['pwd_new1']) AND isset($_POST['pwd_new2']) AND !empty($_POST['pwd_new2'])) 
    {
        $pwdNew1 = password_hash($_POST['pwd_new1'], PASSWORD_DEFAULT);
        $pwdNew2 = password_hash($_POST['pwd_new2'], PASSWORD_DEFAULT);

        if(password_verify($_POST['pwd_new1'], $pwdNew1) == password_verify($_POST['pwd_new2'], $pwdNew2)) 
        {
            $insertPwd = $database->prepare("UPDATE users SET pwd = ? WHERE id = ?");
            $insertPwd->execute(array($pwdNew1, $_SESSION['id']));
            header('Location: ?page=accueil');
        } 
        else 
        {
            $errorMsg = "Vos deux mots de passe ne correspondent pas !";
        }
    }
?>


<div class="form__wrapper">
    <div class="form-container">
        <div class="form__title">
            <h1>Votre profil</h1>
            <h3>Envie de changer certaines de vos données ? Cet espace est le vôtre !</h3>
        </div>
        <form class="user-form" action="" method="POST" enctype="multipart/form-data">
            <fieldset>  

                <?php if(isset($errorMsg)){echo '<span class="error">' . $errorMsg . '</span>';}?>

                <div class="form__wrapper--label">
                    <label for="nickname_new"></label>
                </div>
                <div class="form__wrapper--input">
                    <input type="text" name="nickname_new" placeholder="Nom d'utilisateur" value="<?php echo $user['nickname']; ?>" />
                </div>

                <div class="form__wrapper--label">
                    <label for="mail_new"></label>
                </div>
                <div class="form__wrapper--input">
                    <input type="email" name="mail_new" placeholder="E-mail" value="<?php echo $user['mail']; ?>" />
                </div>

                <div class="form__wrapper--label">
                    <label for="pwd_new1"></label>
                </div>
                <div class="form__wrapper--input">
                    <input type="password" name="pwd_new1" placeholder="Mot de passe"/>
                </div>

                <div class="form__wrapper--label">
                    <label for="pwd_new2"></label>
                </div>
                <div class="form__wrapper--input">
                    <input type="password" name="pwd_new2" placeholder="Confirmation du mot de passe" />
                </div>

                <input class="btn" type="submit" value="Envoyer" />
            </fieldset> 
        </form>
    </div>
</div>
<?php   
}
else {
   header("Location: connexion.php");
}
?>