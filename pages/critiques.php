<?php require('req/_pagination.php'); ?>

<section class="categorie">
    <div class="categorie__container">
        <div class="categorie__container--wrapper">
            <h1>Critiques</h1>
            <div class="card">
                <?php foreach($articles as $article) { ?>
                    <div class="card__cell">
                        <a class="card__cell--img" href="">
                            <img src="<?= $article['path_img']; ?>" alt="">
                        </a>
                        <div class="card__cell--description">
                            <a href="#">
                                <h4 class="description--title ellipsis"><?= $article['title']; ?></h4>
                            </a>
                            <?php 
                                require('req/_connect.php');
                                $category = 'SELECT categories.name AS name_category FROM articles INNER JOIN categories ON articles.type_id = categories.id;
                                ';
                                /*
                                $type = 'SELECT types.name FROM articles INNER JOIN types ON articles.type_id = types.id;
                                ';*/

                                $request = $database->prepare($category);

                                $request->execute();
                                
                                $resultCategory = $request->fetch();

                                $tagCategory = $resultCategory['name_category'];
                            ?>  
                            <a href="#" class="description--category ellipsis"><?= $tagCategory; ?></a>

                            <?php 
                                require('req/_connect.php');
                                $type = 'SELECT types.name AS name_type FROM articles INNER JOIN types ON articles.type_id = types.id;
                                ';

                                $request = $database->prepare($type);

                                $request->execute();
                                
                                $resultType = $request->fetch();

                                $tagType = $resultType['name_type'];
                            ?>  
                            <a href="#" class="description--tags ellipsis"><?= $tagType; ?></a>
                            <p class="description--date"> 
                                <?php
                                    $formDate = strtotime($article['created_at']);
                                    echo "Ajouté le " . date("d-m-Y à h:i", $formDate);
                                ?>
                            </p>
                        </div>
                    </div>
                <?php }; ?>

                
                <!--
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div>
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/205x270" alt="">
                    </a>
                    <div class="card__cell--description">
                        <a href="#">
                            <h4 class="description--title ellipsis">Le premier film est trop grand</h4>
                        </a>
                        <a href="#" class="description--category ellipsis">Films</a>
                        <a href="#" class="description--tags ellipsis">Science-fiction, Horreur</a>
                    </div>
                </div> -->
            </div>
            <?php include('inc/_page.php'); ?>
            <!-- <ul class="page">
                <div class="page__wrapper">
                    <li>
                        <a class="page__wrapper--number active" href="#">1</a>
                    </li>
                    <li>
                        <a class="page__wrapper--number" href="#">2</a>
                    </li>
                    <li>
                        <a class="page__wrapper--number" href="#">3</a>
                    </li>
                </div>
            </ul> -->
        </div>
    </div>
</section>