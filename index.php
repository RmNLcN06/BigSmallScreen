<?php 
if(isset($_GET["page"]))
{
    $page = $_GET['page'];
}
else
{
    $page = '';
}

switch($page)
{
    case 'index':
        $pagepath = 'index.php';
        break;
    case 'actualites':
        $pagepath = 'pages/actualites.php';
        break;
    case 'critiques':
        $pagepath = 'pages/critiques.php';
        break;
    case 'inscription':
        $pagepath = 'pages/inscription.php';
        break;
    case 'reglements':
        $pagepath = 'pages/reglements.php';
        break;
    case 'contact':
        $pagepath = 'pages/contact.php';
        break;
    default: 
        $pagepath = 'index.php';
}

if(!file_exists($pagepath))
{
    $pagepath = 'index.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Balises META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" lang="fr" content="Romain Luciano" />
    <meta name="description" content="Bienvenue Sur BigSmallScreen ! Le site d'actualités et de critiques des films et séries !" />
    <meta name="keywords" lang="fr" content="BigSmallScreen, BBS, cinéma, films, séries, TV, actualités, critiques,  oeuvres cinématographiques" />
    <meta name="reply-to" content="https://github.com/RmNLcN06" />
    <meta name="copyright" content="COPYRIGHT Romain Luciano - Tous Droits Réservés" />
    <meta name="generator" lang="fr" content="Visual Studio Code, HTML5, CSS3, JavaScript" />
    <meta name="content-type" content ="text/html ;charset=ISO-8859-1" />
    <meta name="robots" content ="index, nofollow" />
    <!-- Fin Balises META -->
    
    <title>Bienvenue sur BBS - Actualités et Critiques Cinés et Séries</title>

    <!-- Main Stylesheet CSS -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font-Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <?php include($pagepath);?>
            </main>
            <footer>
                <?php include('inc/_footer.php'); ?>
            </footer>
        </div>
    </div>
</body>

</html>