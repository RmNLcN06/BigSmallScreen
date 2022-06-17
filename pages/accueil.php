<?php 
// session_start();

/* Premier Slideshow */
require_once('req/_connect.php');

$articleSlideshowFirst = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 1 ORDER BY articles.created_at DESC LIMIT 1, 3";
$request = $database->prepare($articleSlideshowFirst);
$request->execute();
$resultFirst = $request->fetchAll(PDO::FETCH_ASSOC);

/******************************/

/* Second Slideshow */
$articleSlideshowSecond = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 2 ORDER BY articles.created_at DESC LIMIT 1, 3";
$request = $database->prepare($articleSlideshowSecond);
$request->execute();
$resultSecond = $request->fetchAll(PDO::FETCH_ASSOC);

/******************************/

/* Troisième Slideshow */
$articleSlideshowThird = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 3 ORDER BY articles.created_at DESC LIMIT 1, 3";
$request = $database->prepare($articleSlideshowThird);
$request->execute();
$resultThird = $request->fetchAll(PDO::FETCH_ASSOC);

/******************************/

/* Quatrième Slideshow */
$articleSlideshowForth = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 4 ORDER BY articles.created_at DESC LIMIT 1, 3";
$request = $database->prepare($articleSlideshowForth);
$request->execute();
$resultForth = $request->fetchAll(PDO::FETCH_ASSOC);

/*****************************************************************/
/*****************************************************************/
/*****************************************************************/

/* Premier Container Cards */
$articleContainerCardsFirst = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 1 ORDER BY articles.created_at DESC LIMIT 3, 5";
$request = $database->prepare($articleContainerCardsFirst);
$request->execute();
$resultContainerCardsFirst = $request->fetchAll(PDO::FETCH_ASSOC);

/******************************/

/* Second Container Cards */
$articleContainerCardsSecond = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 2 ORDER BY articles.created_at DESC LIMIT 3, 5";
$request = $database->prepare($articleContainerCardsSecond);
$request->execute();
$resultContainerCardsSecond = $request->fetchAll(PDO::FETCH_ASSOC);

/******************************/

/* Troisième Container Cards */
$articleContainerCardsThird = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 3 ORDER BY articles.created_at DESC LIMIT 3, 5";
$request = $database->prepare($articleContainerCardsThird);
$request->execute();
$resultContainerCardsThird = $request->fetchAll(PDO::FETCH_ASSOC);

/******************************/

/* Quatrième Container Cards */
$articleContainerCardsForth = "SELECT * FROM categories INNER JOIN articles ON articles.category_id = categories.id WHERE articles.category_id = 4 ORDER BY articles.created_at DESC LIMIT 3, 5";
$request = $database->prepare($articleContainerCardsForth);
$request->execute();
$resultContainerCardsForth = $request->fetchAll(PDO::FETCH_ASSOC);

/******************************/

?>

<section class="accueil">
    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Les Films</h1>
            
            <div class="slideshow">
                <?php foreach($resultFirst as $slideshowFirst) { ?> 
                    <div class="mySlides1 fade">
                        <!-- <div class="mySlides1__number"></div> -->
                        <a href="?page=article_actualite&id=<?= $slideshowFirst['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $slideshowFirst['path_img']) ;?>" alt="">
                            <div class="mySlides1__description">
                                <p class="mySlides1__description--text"><?= $slideshowFirst['title']; ?></p>
                                <p class="mySlides1__description--date"> 
                                    <?php
                                        $formDate = strtotime($slideshowFirst['created_at']);
                                        echo "Ajouté le " . date("d-m-Y", $formDate);
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <a class="prev" onclick="plusSlides(-1, 0)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 0)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">
                <?php foreach($resultContainerCardsFirst as $containerCardsFirst) { ?>
                    <div class="card__cell">
                        <a class="card__cell--img" href="?page=article_actualite&id=<?= $containerCardsFirst['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $containerCardsFirst['path_img']); ?>" alt="">
                        </a>
                        <div class="card__cell--description">
                            <a href="?page=article_actualite&id=<?= $containerCardsFirst['id'] ?>">
                                <h4 class="description--title ellipsis"><?= $containerCardsFirst['title'] ?></h4>
                            </a>
                            <a href="?page=films" class="description--category ellipsis"><?= $containerCardsFirst['name'] ?></a>
                            <!-- <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a> -->
                            <p class="description--date ellipsis">
                                <?php
                                    $formDate = strtotime($containerCardsFirst['created_at']);
                                    echo "Ajouté le " . date("d-m-Y", $formDate);
                                ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Les Séries</h1>

            <div class="slideshow">
                <?php foreach($resultSecond as $slideshowSecond) { ?> 
                    <div class="mySlides2 fade">
                        <!-- <div class="mySlides2__number"></div> -->
                        <a href="?page=article_actualite&id=<?= $slideshowSecond['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $slideshowSecond['path_img']) ;?>" alt="">
                            <div class="mySlides2__description">
                                <p class="mySlides2__description--text"><?= $slideshowSecond['title']; ?></p>
                                <p class="mySlides2__description--date"> 
                                    <?php
                                        $formDate = strtotime($slideshowSecond['created_at']);
                                        echo "Ajouté le " . date("d-m-Y", $formDate);
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <a class="prev" onclick="plusSlides(-1, 1)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 1)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">  
                <?php foreach($resultContainerCardsSecond as $containerCardsSecond) { ?>
                    <div class="card__cell">
                        <a class="card__cell--img" href="?page=article_actualite&id=<?= $containerCardsSecond['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $containerCardsSecond['path_img']); ?>" alt="">
                        </a>
                        <div class="card__cell--description">
                            <a href="?page=article_actualite&id=<?= $containerCardsSecond['id'] ?>">
                                <h4 class="description--title ellipsis"><?= $containerCardsSecond['title'] ?></h4>
                            </a>
                            <a href="?page=series" class="description--category ellipsis"><?= $containerCardsSecond['name'] ?></a>
                            <!-- <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a> -->
                            <p class="description--date ellipsis">
                                <?php
                                    $formDate = strtotime($containerCardsSecond['created_at']);
                                    echo "Ajouté le " . date("d-m-Y", $formDate);
                                ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Les Actualités</h1>

            <div class="slideshow">
                <?php foreach($resultThird as $slideshowThird) { ?> 
                    <div class="mySlides3 fade">
                        <!-- <div class="mySlides3__number"></div> -->
                        <a href="?page=article_actualite&id=<?= $slideshowThird['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $slideshowThird['path_img']) ;?>" alt="">
                            <div class="mySlides3__description">
                                <p class="mySlides3__description--text"><?= $slideshowThird['title']; ?></p>
                                <p class="mySlides3__description--date"> 
                                    <?php
                                        $formDate = strtotime($slideshowThird['created_at']);
                                        echo "Ajouté le " . date("d-m-Y", $formDate);
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <a class="prev" onclick="plusSlides(-1, 2)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 2)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">
                <?php foreach($resultContainerCardsThird as $containerCardsThird) { ?>
                    <div class="card__cell">
                        <a class="card__cell--img" href="?page=article_actualite&id=<?= $containerCardsThird['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $containerCardsThird['path_img']); ?>" alt="">
                        </a>
                        <div class="card__cell--description">
                            <a href="?page=article_actualite&id=<?= $containerCardsThird['id'] ?>">
                                <h4 class="description--title ellipsis"><?= $containerCardsThird['title'] ?></h4>
                            </a>
                            <a href="?page=actualites" class="description--category ellipsis"><?= $containerCardsThird['name'] ?></a>
                            <!-- <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a> -->
                            <p class="description--date ellipsis">
                                <?php
                                    $formDate = strtotime($containerCardsThird['created_at']);
                                    echo "Ajouté le " . date("d-m-Y", $formDate);
                                ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Les Critiques</h1>

            <div class="slideshow">
                <?php foreach($resultForth as $slideshowForth) { ?> 
                    <div class="mySlides4 fade">
                        <!-- <div class="mySlides4__number"></div> -->
                        <a href="?page=article_actualite&id=<?= $slideshowForth['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $slideshowForth['path_img']) ;?>" alt="">
                            <div class="mySlides4__description">
                                <p class="mySlides4__description--text"><?= $slideshowForth['title']; ?></p>
                                <p class="mySlides4__description--date"> 
                                    <?php
                                        $formDate = strtotime($slideshowForth['created_at']);
                                        echo "Ajouté le " . date("d-m-Y", $formDate);
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <a class="prev" onclick="plusSlides(-1, 3)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 3)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">
                <?php foreach($resultContainerCardsForth as $containerCardsForth) { ?>
                    <div class="card__cell">
                        <a class="card__cell--img" href="?page=article_actualite&id=<?= $containerCardsForth['id'] ?>">
                            <img src="<?= str_replace("../../", "./", $containerCardsForth['path_img']); ?>" alt="">
                        </a>
                        <div class="card__cell--description">
                            <a href="?page=article_actualite&id=<?= $containerCardsForth['id'] ?>">
                                <h4 class="description--title ellipsis"><?= $containerCardsForth['title'] ?></h4>
                            </a>
                            <a href="?page=critiques" class="description--category ellipsis"><?= $containerCardsForth['name'] ?></a>
                            <!-- <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a> -->
                            <p class="description--date ellipsis">
                                <?php
                                    $formDate = strtotime($containerCardsForth['created_at']);
                                    echo "Ajouté le " . date("d-m-Y", $formDate);
                                ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <button class="toTheTop" title="Go to top"><i class="fa-solid fa-circle-chevron-up"></i></button>
</section>