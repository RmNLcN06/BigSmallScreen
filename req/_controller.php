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
    // Menu Pages Header
    case 'premium':
        $pagepath = 'pages/premium.php';
        break;
    case 'profil':
        $pagepath = 'pages/profil.php';
        break;
    case 'connexion':
        $pagepath = 'pages/connexion.php';
        break;
    case 'connexionAdmin':
        $pagepath = 'pages/connexionAdmin.php';
        break;
    case 'inscription':
        $pagepath = 'pages/inscription.php';
        break;

    // Menu Pages Navigation
    case 'accueil':
        $pagepath = 'pages/accueil.php';
        break;
    case 'actualites':
        $pagepath = 'pages/actualites.php';
        break;
    case 'critiques':
        $pagepath = 'pages/critiques.php';
        break;
    case 'films':
        $pagepath = 'pages/films.php';
        break;
    case 'series':
        $pagepath = 'pages/series.php';
        break;

    // Article Pages
    case 'article_actualite':
        $pagepath = 'articles/article_actualite.php';
        break;
    case 'article_critique':
        $pagepath = 'articles/article_critique.php';
        break;
    case 'article_film':
        $pagepath = 'articles/article_film.php';
        break;
    case 'article_serie':
        $pagepath = 'articles/article_serie.php';
        break;
    
    // Menu Pages Footer
    case 'reglements':
        $pagepath = 'pages/reglements.php';
        break;
    case 'contact':
        $pagepath = 'pages/contact.php';
        break;
    case 'faq':
        $pagepath = 'pages/faq.php';
        break;

    // Deny Page
    case "deny":
        $pagepath = "pages/deny.php";
        break; 
        
    // Par Défaut
    default: 
        $pagepath = 'pages/accueil.php';
}

if(!file_exists($pagepath))
{
    $pagepath = 'pages/accueil.php';
}
?>