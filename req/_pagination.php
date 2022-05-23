<?php

// 1ère Etape
// Position de l'utilisateur (sur quelle page se trouve-t'il ?)
// S'il la page existe et qu'elle n'est pas vide
if(isset($_GET['page']) && !empty($_GET['page']))
{
    // On supprime les balises HTML et PHP de la chaîne avec strip_tags
    $currentPage = (int) strip_tags($_GET['page']);
}
else
{
    $currentPage = 1;
}

// Connexion à la base de donnée
require('req/_connect.php');

// Nombre total d'articles en base de données
$articleAmount = 'SELECT count(*) AS article_amount FROM `articles`';

// Préparation de la requête
$request = $database->prepare($articleAmount);

// Exécution de la requête
$request->execute();

// Récupération du nombre d'articles dans la base de données
$result = $request->fetch();

$nbrArticle = (int) $result['article_amount'];

// Combien d'articles par page ?
$articlesPerPage = 15;

// Nombre de pages totales pour afficher tous les articles
$nbrPages = ceil($nbrArticle / $articlesPerPage);

// Premier article pour la première page
$firstPage = ($currentPage * $articlesPerPage) - $articlesPerPage;

// 2ème Etape
// Sélectionne tous les articles en base de données et on les affiche 
// par date de création décroissante en limitant l'affichage entre le premier 
// article et le nombre d'article par page
$articleAmount = 'SELECT * FROM `articles` ORDER BY created_at DESC LIMIT :firstpage, :articlesperpage';

// Préparation de la requête
$request = $database->prepare($articleAmount);

$request->bindParam(':firstpage', $firstPage, PDO::PARAM_INT);
$request->bindParam(':articlesperpage', $articlesPerPage, PDO::PARAM_INT);

// Exécution de la requête
$request->execute();

// Récupération du résultat dans un tableau associatif
$articles = $request->fetchAll(PDO::FETCH_ASSOC);

$database = null;

?>



