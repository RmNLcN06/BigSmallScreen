<?php require('req/_pagination.php'); ?>

<section class="categorie">
    <div class="categorie__container">
        <div class="categorie__container--wrapper">
            <h1>Critiques</h1>
            <div class="card">
                <?php foreach($articles as $article) { ?>
                    <div class="card__cell">
                        <a class="card__cell--img" href="">
                            <img src="https://via.placeholder.com/205x270" alt="">
                        </a>
                        <div class="card__cell--description">
                            <a href="#">
                                <h4 class="description--title ellipsis"><?= $article['title']; ?></h4>
                            </a>
                            <a href="#" class="description--category ellipsis"><?= $article['category_id']; ?></a>
                            <a href="#" class="description--tags ellipsis"><?= $article['type_id']; ?></a>
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