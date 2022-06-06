<?php 

// 1ère Etape
// Position de l'utilisateur (sur quelle page se trouve-t'il ?)
// S'il la page existe et qu'elle n'est pas vide

if(isset($_GET['numPages']) && !empty($_GET['numPages']))
{
    // On supprime les balises HTML et PHP de la chaîne avec strip_tags
    $currentPage = (int) strip_tags($_GET['numPages']);
}
else
{
    $currentPage = 1;
}


// Connexion à la base de donnée
require_once('req/_connect.php');

// Nombre total d'articles en base de données
$articleAmount = 'SELECT count(*) AS article_amount FROM `articles` WHERE category_id = 2';

// Préparation de la requête
$request = $database->prepare($articleAmount);

// Exécution de la requête
$request->execute();

// Récupération du nombre d'articles dans la base de données
$result = $request->fetch();

$nbrArticle = (int) $result['article_amount'];

// Combien d'articles par page ?
$articlesPerPage = 10;

// Nombre de pages totales pour afficher tous les articles
$nbrPages = ceil($nbrArticle / $articlesPerPage);

// Premier article pour la première page
// $firstArticle = ($currentPage * $articlesPerPage) - $articlesPerPage;
$firstArticle = ($currentPage - 1) * $articlesPerPage;


// 2ème Etape
// Sélectionne tous les articles en base de données et on les affiche 
// par date de création décroissante en limitant l'affichage entre le premier 
// article et le nombre d'article par page
$articleAmount = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 2 ORDER BY articles.created_at DESC LIMIT :firstarticle, :articlesperpage";

// Préparation de la requête
$request = $database->prepare($articleAmount);

$request->bindValue(':articlesperpage', $articlesPerPage, PDO::PARAM_INT);
$request->bindValue(':firstarticle', $firstArticle, PDO::PARAM_INT);


// Exécution de la requête
$request->execute();

// Récupération du résultat dans un tableau associatif
$articles = $request->fetchAll(PDO::FETCH_ASSOC);

// $database = null;

?>


<section class="categorie">
    <div class="categorie__container">
        <div class="categorie__container--wrapper">
            <h1>Séries</h1>
            <div class="card">
                <?php 
                    foreach($articles as $article) {
                ?>

                <div class="card__cell">
                    <a class="card__cell--img" href="<?= $article['path_art']?>">
                        <img src="<?= $article['path_img']; ?>" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis"><?= $article['title']; ?></h4>
                        </a>
                        
                        <a href="#" class="description--category ellipsis"><?= $article['name']; ?></a>

                        <div class="card__cell--tags ellipsis">
                        <?php 
                            $currentArticle = $article['id'];
                                //$type = 'SELECT * FROM types JOIN articles ON articles.type_id = types.id WHERE articles.type_id = 2';
                                $type = 'SELECT types.id, articles.id, types.name
                                FROM articles_types
                                    INNER JOIN types 
                                    ON articles_types.types_id = types.id
                                    INNER JOIN articles
                                    ON articles_types.articles_type_id = articles.id
                                    WHERE articles.id = ?';

                                $request = $database->prepare($type);

                                $request->execute([$currentArticle]);
                                
                                $resultType = $request->fetchAll(PDO::FETCH_ASSOC);

                                // $tagType = $resultType['name_type'];

                                foreach($resultType as $type) {
                            ?>

                                <a href="#" class="description--tags ellipsis"><?= $type['name']; ?></a> /
                                
                            <?php
                                }
                            ?>  
                        </div>
                        
                        <p class="description--date"> 
                            <?php
                            // echo $article['name'];
                                $formDate = strtotime($article['created_at']);
                                echo "Ajouté le " . date("d-m-Y", $formDate);
                            ?>
                        </p>
                    </div>
                </div>

                <?php 
                }; 
                ?>
            </div>
            <?php include_once('inc/_page.php'); ?>
              
            
        </div>
    </div>
</section>