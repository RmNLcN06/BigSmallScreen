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
        $directorThree = $article['director_three'];
        $directorFour = $article['director_four'];
        $actorOne = $article['actor_one'];
        $actorImgOne = str_replace("../../", "./", $article['actor_img_one']);
        $actorTwo = $article['actor_two'];
        $actorImgTwo = str_replace("../../", "./", $article['actor_img_two']);
        $actorThree = $article['actor_three'];
        $actorImgThree = str_replace("../../", "./", $article['actor_img_three']);
        $actorFour = $article['actor_four'];
        $actorImgFour = str_replace("../../", "./", $article['actor_img_four']);
        $actorFive = $article['actor_five'];
        $actorImgFive = str_replace("../../", "./", $article['actor_img_five']);
        $synopsis = $article['synopsis'];
        $content = $article['content'];
        $admin_firstname = $article['admin_firstname'];
        $created_at = $article['created_at'];
        $pathImg = str_replace("../../", "./", $article['path_img']);
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

<section class="articles">
    <div class="articles__container">
        <div class="articles__container--wrapper">
            <h1 class="articles__title"><?= $title; ?></h1>
            <div class="articles__wrapper">
                <div class="articles__wrapper--first">
                    <div class="first__img">
                        <img src="<?= $pathImg ?>" alt="">
                    </div>
                </div>
                <div class="articles__wrapper--second">
                    <div class="second__informations">
                        <div class="informations__authors">
                            <h1>Réalisateur(s) / trice(s): </h1>
                                <p><?= $directorOne; ?>
                            <?php if(isset($directorTwo) && !empty($directorTwo)) { ?>
                                , <?= $directorTwo; ?>
                            <?php } ?>
                            <?php if(isset($directorThree) && !empty($directorThree)) { ?>
                                , <?= $directorThree; ?>
                            <?php } ?>
                            <?php if(isset($directorFour) && !empty($directorFour)) { ?>
                                , <?= $directorFour; ?></p>
                            <?php } ?>
                        </div>

                        <div class="informations__releaseyear">
                            <h1>Année de production: </h1>
                            <p><?= $release_year; ?></p>
                        </div>
                        
                        <?php if(isset($nbr_season) && !empty($nbr_season)) { ?>
                            <div class="informations__nbrseason">
                                <h1>Nombre(s) de saison: </h1>
                                <p><?= $nbr_season; ?></p>
                            </div>
                        <?php } ?>
                       
                        <div class="informations__status">
                            <h1>Statut: </h1>
                            <p><?= $work_status; ?></p>
                        </div>

                        <div class="informations__actors">
                            <h1>Acteurs / trices Principaux</h1>
                            <div class="wrapper__cards">
                                <div class="card">
                                    <img src="<?= $actorImgOne; ?>" alt="">
                                    <p><?= $actorOne; ?></p>
                                    <p>Rôle</p>
                                </div>
                                <div class="card">
                                    <img src="<?= $actorImgTwo; ?>" alt="">
                                    <p><?= $actorTwo; ?></p>
                                    <p>Rôle</p>
                                </div>
                                <div class="card">
                                    <img src="<?= $actorImgThree; ?>" alt="">
                                    <p><?= $actorThree; ?></p>
                                    <p>Rôle</p>
                                </div>
                                <div class="card">
                                    <img src="<?= $actorImgFour; ?>" alt="">
                                    <p><?= $actorFour; ?></p>
                                    <p>Rôle</p>
                                </div>
                                <div class="card">
                                    <img src="<?= $actorImgFive; ?>" alt="">
                                    <p><?= $actorFive; ?></p>
                                    <p>Rôle</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="articles__wrapper">
                <div class="articles__content">
                    <h1>Synopsis</h1>
                    <p><?= $synopsis; ?></p>
                </div>
            </div>
            <div class="articles__lastwrapper">
                <div class="articles__content">
                    <h1>Contenu de l'article</h1>
                    <p><?= $content; ?></p>
                </div>
                <div class="articles__author">
                    <p>Rédigé par votre aimable serviteur <?= $admin_firstname; ?></p>
                </div>
                <div class="articles__date">
                    <?php
                        $formDate = strtotime($created_at);
                        echo "Publié le " . date("d-m-Y", $formDate) . " à " . date("H:i", $formDate); 
                    ?>
                </div>
            </div>

            <div class="articles__wrapper">
                <?php if(!isset($_SESSION['authUser']) || empty($_SESSION['authUser'])) { ?>
                    <section class="comment">
                        <div class="comment__login">
                            <h1>Connectez-vous pour ajouter et consulter les commentaires</h1>
                            <a href="?page=connexion">Se connecter</a>
                        </div>
                        <p>Vous n'avez pas de compte ? <a href="?page=inscription">Inscrivez-vous</a></p>
                    </section>
                <?php } 
                else {
                require('comments.php');
                } ?>
            </div>
        </div>
    </div>
    <button class="toTheTop" title="Go to top"><i class="fa-solid fa-circle-chevron-up"></i></button>
</section>


    


