<?php
// Démarrage session 
session_start();


// A RETRAVAILLER !!! 
if ($_POST) 
{
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['release_year']) && !empty($_POST['release_year'])
        && isset($_POST['nbr_season']) && !empty($_POST['nbr_season'])
        && isset($_POST['work_status']) && !empty($_POST['work_status'])
        && isset($_POST['director_one']) && !empty($_POST['director_one']) 
        && isset($_POST['director_two']) && !empty($_POST['director_two']) 
        && isset($_POST['actor_one']) && !empty($_POST['actor_one'])
        && isset($_POST['actor_two']) && !empty($_POST['actor_two'])
        && isset($_POST['actor_three']) && !empty($_POST['actor_three'])
        && isset($_POST['actor_four']) && !empty($_POST['actor_four'])
        && isset($_POST['synopsis']) && !empty($_POST['synopsis'])
        && isset($_POST['content']) && !empty($_POST['content'])
        && isset($_POST['admin_name']) && !empty($_POST['admin_name'])
        ) 
        {
            require_once('../req/_connect.php');

            // Réinitialisation des données envoyées
            $id = strip_tags($_POST['id']);
            $title = strip_tags($_POST['title']); 
            $releaseYear = strip_tags($_POST['release_year']); 
            $nbrSeason = strip_tags($_POST['nbr_season']); 
            $workStatus = strip_tags($_POST['work_status']);
            $directorOne = strip_tags($_POST['director_one']);
            $directorTwo = strip_tags($_POST['director_two']);
            $actorOne = strip_tags($_POST['actor_one']);
            $actorTwo = strip_tags($_POST['actor_two']);
            $actorThree = strip_tags($_POST['actor_three']);
            $actorFour = strip_tags($_POST['actor_four']);
            $synopsis = strip_tags($_POST['synopsis']);
            $content = strip_tags($_POST['content']);
            $adminName = strip_tags($_POST['admin_name']);

            $sql = 'UPDATE articles SET title = :title, release_year = :release_year, nbr_season = :nbr_season, work_status = :work_status, director_one = :director_one, director_two = :director_two, actor_one = :actor_one, actor_two = :actor_two, actor_three = :actor_three, actor_four = :actor_four, synopsis = :synopsis, content = :content, admin_name = :admin_name WHERE id = :id;';


            $query = $database->prepare($sql);

            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':title', $title, PDO::PARAM_STR);
            $query->bindValue(':release_year', $releaseYear, PDO::PARAM_INT);
            $query->bindValue(':nbr_season', $nbrSeason, PDO::PARAM_INT);
            $query->bindValue(':work_status', $workStatus, PDO::PARAM_STR);
            $query->bindValue(':director_one', $directorOne, PDO::PARAM_STR);
            $query->bindValue(':director_two', $directorTwo, PDO::PARAM_STR);
            $query->bindValue(':actor_one', $actorOne, PDO::PARAM_STR);
            $query->bindValue(':actor_two', $actorTwo, PDO::PARAM_STR);
            $query->bindValue(':actor_three', $actorThree, PDO::PARAM_STR);
            $query->bindValue(':actor_four', $actorFour, PDO::PARAM_STR);
            $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
            $query->bindValue(':content', $content, PDO::PARAM_STR);
            $query->bindValue(':admin_name', $adminName, PDO::PARAM_STR);
        
            $query->execute();

            $_SESSION['message'] = "Article modifié";
            // require_once('../req/_connect.php');
            header('Location: ../admin_dashboard_article.php');
        } else {
            $_SESSION['erreur'] = "Le formulaire est incomplet";
        }
}

// Vérification id existe ET pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once('../req/_connect.php');

    // Réinitialisation de l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `categories` INNER JOIN `articles` ON articles.category_id = categories.id WHERE articles.id = :id;';

    // Préparation de la requête
    $query = $database->prepare($sql);

    // Liaison des paramètres id
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération du produit
    $article = $query->fetch();

    // Vérification de l'existance du produit
    if (!$article) {
        $_SESSION['erreur'] = 'Cet article n\'existe pas';
        header('Location: admin/admin_dashboard_article.php');
    }
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: admin/admin_dashboard_article.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un article</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
        <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="./add.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $_SESSION['erreur']; ?>
                    </div>
                    <?= $_SESSION['erreur'] = ""; ?>
                <?php
                }
                ?>
                <h1 class="d-flex justify-content-center my-5">Modifier l'article <?= $article['title'] ; ?></h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group my-4">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?= htmlentities($article['title']); ?>" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="release_year">Année de sortie</label>
                        <select name="release_year" id="release_year" required>
                            <?php 
                                for($i = 1895 ; $i <= 2022 ; $i++) { ?>
                                <option value="<?= $i . '<br>'; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="nbr_season">Nombre de saison(s)</label>
                        <select name="nbr_season" id="nbr_season">
                            <?php 
                                for($i = 0 ; $i <= 50 ; $i++) { ?>
                                <option value="<?= $i . '<br>'; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="work_status">Statut</label>
                        <select name="work_status" id="work_status" required>
                            <option value="" disabled selected>Choisir le statut</option>
                            <option value="En production">En production</option>
                            <option value="Diffusion en cours">Diffusion en cours</option>
                            <option value="Sortie">Sortie</option>
                            <option value="Terminée">Terminée</option>
                            <option value="Annulée">Annulée</option>
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <h4>Réalisateur(s) / trice(s)</h4>
                        <label for="director_one">Réalisateur / trice</label>
                        <input type="text" id="director_one" name="director_one" class="form-control my-3" value="<?= htmlentities($article['director_one']); ?>" required>
                        <label for="director_two">Réalisateur / trice</label>
                        <input type="text" id="director_two" name="director_two" class="form-control my-3" value="<?= htmlentities($article['director_two']); ?>" required>
                    </div>
                    <div class="form-group my-4">
                        <h4>Acteur(s) / trice(s) principaux</h4>
                        <label for="actor_one">Acteur / trice</label>
                        <input type="text" id="actor_one" name="actor_one" class="form-control my-3" value="<?= htmlentities($article['actor_one']); ?>" required>
                        <label for="actor_two">Acteur / trice</label>
                        <input type="text" id="actor_two" name="actor_two" class="form-control my-3" value="<?= htmlentities($article['actor_two']); ?>" required>
                        <label for="actor_three">Acteur / trice</label>
                        <input type="text" id="actor_three" name="actor_three" class="form-control my-3" value="<?= htmlentities($article['actor_three']); ?>" required>
                        <label for="actor_four">Acteur / trice</label>
                        <input type="text" id="actor_four" name="actor_four" class="form-control my-3" value="<?= htmlentities($article['actor_four']); ?>" required>
                    </div>
                    <div class="form-group my-4">
                        <p><label for="synopsis">Synopsis</label></p>
                        <textarea name="synopsis" id="synopsis" cols="173" rows="10" class="form-control" value="<?= htmlentities($article['synopsis']); ?>" required ></textarea>
                    </div>
                    <div class="form-group my-4">
                        <p><label for="content">Contenu de l'article</label></p>
                        <textarea name="content" id="content" cols="173" rows="10" class="form-control" value="<?= htmlentities($article['content']); ?>" required ></textarea>
                    </div>
                    <div class="form-group my-4">
                        <label for="admin_name">Nom de l'auteur: </label>
                        <input type="hidden" id="admin_name" name="admin_name" class="form-control" value="<?= htmlentities($_SESSION['firstname']); ?>">
                        <?= htmlentities($_SESSION['firstname']); ?>
                    </div>
                    <!-- <div class="form-group my-4">
                        <label for="path_img">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                        <input type="file" id="path_img" name="path_img" class="form-control" required>
                    </div> -->
                    <input type="hidden" name="id" value="<?= $article['id']; ?>">
                    <div class="d-flex justify-content-center mb-5">
                        <input type="submit" value ="Envoyer" class="btn btn-primary">
                    </div>
                </form>
            </section>
        </div>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>