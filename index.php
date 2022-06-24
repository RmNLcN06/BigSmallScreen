<?php require('req/_processing.php'); ?>

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
</body>

</html>