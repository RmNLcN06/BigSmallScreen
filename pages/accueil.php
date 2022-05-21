

<section class="accueil">

    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Titre</h1>

            <?php if(($_SESSION['auth'])){ ?>
                    <?= $_SESSION['auth']; ?>
                    <h1>Bonjour <?= $_SESSION['nickname'] ?></h1>
            <?php } ?>
            
            <div class="slideshow">
                <div class="mySlides1 fade">
                    <div class="mySlides1__number">1 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides1__text">Film 1</p>
                </div>
                <div class="mySlides1 fade">
                    <div class="mySlides1__number">2 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides1__text">Film 2</p>
                </div>
                <div class="mySlides1 fade">
                    <div class="mySlides1__number">3 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides1__text">Film 3</p>
                </div>
                <a class="prev" onclick="plusSlides(-1, 0)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 0)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
        </div>
    </div>
    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Titre</h1>

            <div class="slideshow">
                <div class="mySlides2 fade">
                    <div class="mySlides2__number">1 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides2__text">Film 1</p>
                </div>
                <div class="mySlides2 fade">
                    <div class="mySlides2__number">2 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides2__text">Film 2</p>
                </div>
                <div class="mySlides2 fade">
                    <div class="mySlides2__number">3 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides2__text">Film 3</p>
                </div>
                <a class="prev" onclick="plusSlides(-1, 1)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 1)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
        </div>
    </div>
    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Titre</h1>

            <div class="slideshow">
                <div class="mySlides3 fade">
                    <div class="mySlides3__number">1 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides3__text">Film 1</p>
                </div>
                <div class="mySlides3 fade">
                    <div class="mySlides3__number">2 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides3__text">Film 2</p>
                </div>
                <div class="mySlides3 fade">
                    <div class="mySlides3__number">3 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides3__text">Film 3</p>
                </div>
                <a class="prev" onclick="plusSlides(-1, 2)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 2)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
        </div>
    </div>
    <div class="accueil__container">
        <div class="accueil__container--wrapper">
            <h1>Les Critiques</h1>

            <div class="slideshow">
                <div class="mySlides4 fade">
                    <div class="mySlides4__number">1 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides4__text">Film 1</p>
                </div>
                <div class="mySlides4 fade">
                    <div class="mySlides4__number">2 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides4__text">Film 2</p>
                </div>
                <div class="mySlides4 fade">
                    <div class="mySlides4__number">3 / 3</div>
                    <a href="">
                        <img src="https://via.placeholder.com/1000x400" alt="">
                    </a>
                    <p class="mySlides4__text">Film 3</p>
                </div>
                <a class="prev" onclick="plusSlides(-1, 3)">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                </a>
                <a class="next" onclick="plusSlides(1, 3)">
                    <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>

            <div class="card">
                <div class="card__cell">
                    <a class="card__cell--img" href="">
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
                        <img src="https://via.placeholder.com/185x270" alt="">
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
        </div>
    </div>
</section>