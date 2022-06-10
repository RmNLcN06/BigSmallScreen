<?php 
require("req/_connect.php");

if(isset($_GET['id']) && !empty($_GET['id'])) 
{
    $getId = htmlspecialchars($_GET['id']);
    
    $sql = "SELECT * FROM articles WHERE id = ?";
    $article = $database->prepare($sql);

    $article->execute([$getId]);

    if($article->rowCount() == 1) 
    {
        $article = $article->fetch();

        $title = $article['title'];
        $release_year = $article['release_year'];
        $nbr_season = $article['nbr_season'];
        $work_status = $article['work_status'];
        $directorOne = $article['director_one'];
        $directorTwo = $article['director_two'];
        $actorOne = $article['actor_one'];
        $actorTwo = $article['actor_two'];
        $actorThree = $article['actor_three'];
        $actorFour = $article['actor_four'];
        $synopsis = $article['synopsis'];
        $content = $article['content'];
        $admin_name = $article['admin_name'];
        $created_at = $article['created_at'];
    }
    else
    {
        echo "Cet article n'existe pas !!!";
    }
}
else
{
    die('Erreur');
}
?>

<section class="article">
    <h1 class="article__title"><?= $title; ?></h1>
    <div class="article__wrapper">
        <div class="article__img">
            <img src="<?= $article['path_img']; ?>" alt="">
        </div>
        <div class="article__content">
            <h1>Réalisateur(s) / trice(s): </h1>
            <p><?= $directorOne; ?></p>
        </div>
        <?php if(isset($directorTwo) && !empty($directorTwo)) { ?>
            <div class="article__content">
                <p><?= $directorTwo; ?></p>
            </div>
        <?php } ?>
        <div class="article__content">
            <h1>Année de sortie: </h1>
            <p><?= $release_year; ?></p>
        </div>
        <?php if(isset($nbr_season) && !empty($nbr_season)) { ?>
            <div class="article__content">
            <h1>Nombre(s) de saison: </h1>
                <p><?= $nbr_season; ?></p>
            </div>
        <?php } ?>
        <div class="article__content">
            <h1>Statut: </h1>
            <p><?= $work_status; ?></p>
        </div>
        <div class="article__content">
            <h1>Acteurs / trices Principaux</h1>
            <p><?= $actorOne; ?></p>
        </div>
        <div class="article__content">
            <p><?= $actorTwo; ?></p>
        </div>
        <div class="article__content">
            <p><?= $actorThree; ?></p>
        </div>
        <div class="article__content">
            <p><?= $actorFour; ?></p>
        </div>
        <div class="article__content">
            <h1>Synopsis</h1>
            <p><?= $synopsis; ?></p>
        </div>
        <div class="article__content">
            <h1>Contenu de l'article</h1>
            <p><?= $content; ?></p>
        </div>
        <div class="article__author">
            <p>Rédigé par votre aimable serviteur <?= $admin_name; ?></p>
        </div>
        <div class="article__date">
            <?php
                $formDate = strtotime($created_at);
                echo "Publié le " . date("d-m-Y", $formDate) . " à " . date("H:i", $formDate); 
            ?>
        </div>
    </div>
</section>

<?php if(!isset($_SESSION['authUser']) || empty($_SESSION['authUser'])) { ?>
    <section class="comment">
        <p>Connectez-vous pour ajouter et consulter les commentaires.</p>   
        <button><a href="?page=connexion">Se connecter</a></button>
        <p>Vous n'avez pas de compte ? <a href="?page=inscription">Inscrivez-vous</a></p>
    </section>
<?php } else {
    require('comments.php');
} ?>
    


