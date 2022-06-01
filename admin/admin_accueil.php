<?php
require ('../req/_security.php');


// session_start();
echo $_SESSION['nickname'] . '<br>';
echo $_SESSION['firstname'] . '<br>';
echo $_SESSION['lastname'] . '<br>';
$hello = 'Bonjour ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../../BigSmallScreen/inc/_head.php"); ?>
</head>

<body>
<p><?= $hello; ?></p> - <a href="inc/_killsession.php" title="déconnection">( X )</a>
<?php include ('inc/_admin_menu.php'); ?>
</body>
</html>