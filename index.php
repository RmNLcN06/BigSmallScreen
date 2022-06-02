<?php require('req/_controller.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("inc/_head.php"); ?>
</head>

<body>
    <div class="page">
        <div class="wrapper">
            <header>
                <?php include("inc/_header.php"); ?>
            </header>
            <nav class="menu" id="menu">
                <?php include("inc/_menu.php"); ?>
            </nav>
            <main>
                <?php include($pagepath); ?>
            </main>
            <footer>
                <?php include('inc/_footer.php'); ?>
            </footer>
        </div>
    </div>

    <!-- JavaScript File -->
    <script src="app/js/script.js"></script>

    <!-- Bootstrap JS File -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>