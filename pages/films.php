<?php 
// session_start();
echo $_SESSION['auth'];
echo $_SESSION['nickname'];
echo $_SESSION['firstname'];
echo $_SESSION['lastname'];
echo $_SESSION['role_id'];
?>

<?php if(($_SESSION['auth'])){ ?>
        <h1>Bonjour <?= $_SESSION['nickname'] ?></h1>
        <p>Vous êtes connecté en tant que <?= $_SESSION['role_id'] ?></p>
<?php } ?>