<?php
// Démarrage session 
session_start();

if ($_POST) {
    if (
        isset($_POST['category_id']) && !empty($_POST['category_id'])
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
        && isset($_POST['types']) && !empty($_POST['types'])
        ) 
        {
            require_once('../req/_connect.php');
            
            // On insère une catégorie
            $category_id = strip_tags($_POST['category_id']);

            $title = strip_tags($_POST['title']);

            // On insère une année de sortie
            $release_year = strip_tags($_POST['release_year']);

            // On insère un nombre de saison
            $nbr_season = strip_tags($_POST['nbr_season']);

            // On insère une année de sortie
            $work_status = strip_tags($_POST['work_status']);

            $directorOne = strip_tags($_POST['director_one']);
            $directorTwo = strip_tags($_POST['director_two']);
            $actorOne = strip_tags($_POST['actor_one']);
            $actorTwo = strip_tags($_POST['actor_two']);
            $actorThree = strip_tags($_POST['actor_three']);
            $actorFour = strip_tags($_POST['actor_four']);
            $synopsis = strip_tags($_POST['synopsis']);
            $content = strip_tags($_POST['content']);

            $admin_name = strip_tags($_POST['admin_name']);


            $types = $_POST['types'];

            for($i = 0 ; $i <= sizeof($types) ; $i++)
            {
                $sqlTypes = "INSERT INTO articles_types (types_id)
                        VALUES ('". $types[$i]. "')";
                $query->execute();
            }
            

            $sql = "INSERT INTO articles (category_id, title, release_year, nbr_season, work_status, director_one, director_two, actor_one, actor_two, actor_three, actor_four, synopsis, content, admin_name) 
                    VALUES (:category_id, :title, :release_year, :nbr_season, :work_status, :director_one, :director_two, :actor_one, :actor_two, :actor_three, :actor_four, :synopsis, :content, :admin_name)";

            $query = $database->prepare($sql);

            $query->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            $query->bindValue(':title', $title, PDO::PARAM_STR);
            $query->bindValue(':release_year', $release_year, PDO::PARAM_INT);
            $query->bindValue(':nbr_season', $nbr_season, PDO::PARAM_INT);
            $query->bindValue(':work_status', $work_status, PDO::PARAM_STR);
            $query->bindValue(':director_one', $directorOne, PDO::PARAM_STR);
            $query->bindValue(':director_two', $directorTwo, PDO::PARAM_STR);
            $query->bindValue(':actor_one', $actorOne, PDO::PARAM_STR);
            $query->bindValue(':actor_two', $actorTwo, PDO::PARAM_STR);
            $query->bindValue(':actor_three', $actorThree, PDO::PARAM_STR);
            $query->bindValue(':actor_four', $actorFour, PDO::PARAM_STR);
            $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
            $query->bindValue(':content', $content, PDO::PARAM_STR);
            $query->bindValue(':admin_name', $admin_name, PDO::PARAM_STR);

            $query->execute();

            $_SESSION['message'] = "Votre article est ajouté";
            require_once('../req/_close.php');

            header('Location: ../admin_dashboard_article.php');
        }
        else
        {
            $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
        }
    }

    // $resultCategory = "SELECT articles.title, articles.category_id, categories.id, categories.name FROM articles INNER JOIN categories ON articles.category_id = categories.id;";
    // if (
    //     isset($_POST['category_id']) && !empty($_POST['category_id'])    
    //     && isset($_POST['release_year']) && !empty($_POST['release_year'])
    //     && isset($_POST['work_status']) && !empty($_POST['work_status'])
    //     && isset($_POST['type_id[]']) && !empty($_POST['type_id[]'])
    //     && isset($_FILES['path_img']) && !empty($_FILES['path_img'])
    // ) 
    // {
    //     // Inclusion de la connexion à la base de donnée        
    //     require_once('../req/_connect.php');

    //     $typeArray = 
    //     [
    //         'scienceFiction',
    //         'comedie',
    //         'comedieDramatique',
    //         'horreur',
    //         'thriller',
    //         'romance',
    //         'biographie',
    //         'aventure',
    //         'action',
    //         'drame',
    //         'fantastique',
    //         'guerre',
    //         'policier',
    //         'western',
    //         'documentaire',
    //         'biopic'
    //     ];

    //     if(isset($_POST['type'])) {
    //         $values = [];
    //         foreach($_POST['type'] as $types) {
    //             if(in_array($types, $typeArray)) {
    //                 $values[$types] = 1;
    //             }
    //             else
    //             {
    //                 $values[$types] = 0;
    //             }
    //         }
    //     }

    //     $typeInsert = $database->prepare("INSERT INTO types(scienceFiction, comedie, comedieDramatique,horreur, thriller, romance, biographie, aventure, action, drame, fantastique, guerre, policier, western, documentaire, biopic) VALUES (:scienceFiction, :comedie, :comedieDramatique, :horreur, :thriller, :romance, :biographie, :aventure, :action, :drame, :fantastique, :guerre, :policier, :western, :documentaire, :biopic)");

    //     $queryType = $database->prepare($typeInsert);

    //     $queryType->bindParam(':scienceFiction', $values['scienceFiction']);
    //     $queryType->bindParam(':comedie', $values['comedie']);
    //     $queryType->bindParam(':comedieDramatique', $values['comedieDramatique']);
    //     $queryType->bindParam(':horreur', $values['horreur']);
    //     $queryType->bindParam(':thriller', $values['thriller']);
    //     $queryType->bindParam(':romance', $values['romance']);
    //     $queryType->bindParam(':biographie', $values['biographie']);
    //     $queryType->bindParam(':aventure', $values['aventure']);
    //     $queryType->bindParam(':action', $values['action']);
    //     $queryType->bindParam(':drame', $values['drame']);
    //     $queryType->bindParam(':fantastique', $values['fantastique']);
    //     $queryType->bindParam(':guerre', $values['guerre']);
    //     $queryType->bindParam(':policier', $values['policier']);
    //     $queryType->bindParam(':western', $values['western']);
    //     $queryType->bindParam(':documentaire', $values['documentaire']);
    //     $queryType->bindParam(':biopic', $values['biopic']);

    //     $queryType->execute();

    //     // Réinitialisation des données envoyées
    //     $category_id = strip_tags($_POST['category_id']);
    //     $release_year = strip_tags($_POST['release_year']);
    //     $nbr_season = strip_tags($_POST['nbr_season']);
    //     $work_status = strip_tags($_POST['work_status']);
    //     // $type_id = strip_tags($_POST['type_id']);
    //     $path_img = strip_tags($_FILES['path_img']);

    //     // Vérification de l'existance de l'article dans la base de données
    //     $checkIfArticleAlreadyExists = $database->prepare('SELECT category_id, title, `type_id`, admin_name FROM articles WHERE category_id = ? AND title = ? AND `type_id` = ? AND admin_name = ?');
    //     $checkIfArticleAlreadyExists->execute([$category_id, $title, $type_id, $admin_name]);

    //     // Si l'article n'existe pas ...
    //     if($checkIfArticleAlreadyExists->rowCount() == 0)
    //     {
    //         $sql = 'INSERT INTO `articles` (`category_id`, `title`, `release_year`, `nbr_season`, `work_status`, `director`, `actor`, `synopsis`, `content`, `type_id`, `admin_name`) VALUES (:category_id, :title, :release_year, :nbr_season, :work_status, :director, :actor, :synopsis, :content, :pdotype, :admin_name);';
    
    //         $query = $database->prepare($sql);
    
    //         $query->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    //         $query->bindValue(':release_year', $release_year, PDO::PARAM_INT);
    //         $query->bindValue(':nbr_season', $nbr_season, PDO::PARAM_INT);
    //         $query->bindValue(':work_status', $work_status, PDO::PARAM_INT);
    //         $query->bindValue(':pdotype', $pdotype, PDO::FETCH_ASSOC);
    //         $query->bindValue(':path_img', $path_img, PDO::PARAM_STR);

    //         $path_img_name = $_FILES['file']['name'];
    //         $path_img_tmp_name = $_FILES['file']['tmp_name'];
    //         $path_img_size = $_FILES['file']['size'];
    //         $path_img_error = $_FILES['file']['error'];
    //         $path_img_type = $_FILES['file']['type'];

    //         $path_img_ext = explode('.', $path_img_name);
    //         $path_img_actual_ext = strtolower(end($path_img_ext));

    //         $allowed = array('jpg', 'jpeg', 'png');

    //         if(in_array($path_img_actual_ext, $allowed)) 
    //         {
    //             if($path_img_error === 0) 
    //             {
    //                 if($path_img_size < 100000)
    //                 {
    //                     $path_img_new_name = uniqid('', true) . "." . $path_img_actual_ext;
    //                     $path_img_destination =  '/' . "img/" . $path_img_new_name;
    //                     move_uploaded_file($path_img_tmp_name, $path_img_destination);

    //                     $query->execute();
    
    //                     $_SESSION['message'] = "Nouveau article ajouté";
    //                     require_once('../req/_close.php');
                
    //                     header('Location: ../admin_dashboard_admin.php');
    //                 } 
    //                 else
    //                 {
    //                     $_SESSION['erreur'] = "Taille trop grande du fichier.";
    //                 }
    //             }
    //             else 
    //             {
    //                 $_SESSION['erreur'] = "Erreur de chargement du fichier.";
    //             }
    //         }
    //         else 
    //         {
    //             $_SESSION['erreur'] = "Extension du fichier non reconnue.";
    //         }
    //     }
    //     else
    //     {
    //         $_SESSION['erreur'] = "Cet article existe déjà.";
    //     }
    // }
    // else 
    // {
    //     $_SESSION['erreur'] = "Le formulaire est incomplet.";
    // }
// } 



?>

<!DOCTYPE html>
<html lang="en/fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>

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
                <h1 class="d-flex justify-content-center my-5">Ajouter un article</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group my-4">
                        <label for="category_id">Catégorie de l'article</label>
                        <select name="category_id" id="category_id" required>
                            <option value="" disabled selected>Choisissez la catégorie</option>
                            <option value="1">Film</option>
                            <option value="2">Série</option>
                            <option value="3">Actualité</option>
                            <option value="4">Critique</option>
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" required>
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
                        <input type="text" id="director_one" name="director_one" class="form-control my-3" required>
                        <label for="director_two">Réalisateur / trice</label>
                        <input type="text" id="director_two" name="director_two" class="form-control my-3" required>
                    </div>
                    <div class="form-group my-4">
                        <h4>Acteur(s) / trice(s) principaux</h4>
                        <label for="actor_one">Acteur / trice</label>
                        <input type="text" id="actor_one" name="actor_one" class="form-control my-3" required>
                        <label for="actor_two">Acteur / trice</label>
                        <input type="text" id="actor_two" name="actor_two" class="form-control my-3" required>
                        <label for="actor_three">Acteur / trice</label>
                        <input type="text" id="actor_three" name="actor_three" class="form-control my-3" required>
                        <label for="actor_four">Acteur / trice</label>
                        <input type="text" id="actor_four" name="actor_four" class="form-control my-3" required>
                    </div>
                    <div class="form-group my-4">
                        <p><label for="synopsis">Synopsis</label></p>
                        <textarea name="synopsis" id="synopsis" cols="173" rows="10" class="form-control" required ></textarea>
                    </div>
                    <div class="form-group my-4">
                        <p><label for="content">Contenu de l'article</label></p>
                        <textarea name="content" id="content" cols="173" rows="10" class="form-control" required ></textarea>
                    </div>
                    <h4>Genre(s) de l'oeuvre</h4>
                    <div class="form-group d-flex justify-content-around my-4">
                        <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="1" id="1">
                                <label class="form-check-label mx-3" for="1">Science-fiction</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="2" id="2">
                                <label class="form-check-label mx-3" for="2">Comédie</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="3" id="3">
                                <label class="form-check-label mx-3" for="3">Comédie dramatique</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="4" id="4">
                                <label class="form-check-label mx-3" for="4">Horreur</label>
                            </div>
                        </div>
                        <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="5" id="5">
                                <label class="form-check-label mx-3" for="5">Thriller</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="6" id="6">
                                <label class="form-check-label mx-3" for="6">Romance</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="7" id="7">
                                <label class="form-check-label mx-3" for="7">Biographie</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="8" id="8">
                                <label class="form-check-label mx-3" for="8">Aventure</label>
                            </div>
                        </div>
                        <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="9" id="9">
                                <label class="form-check-label mx-3" for="9">Action</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="10" id="10">
                                <label class="form-check-label mx-3" for="10">Drame</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="11" id="11">
                                <label class="form-check-label mx-3" for="11">Fantastique</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="12" id="12">
                                <label class="form-check-label mx-3" for="12">Guerre</label>
                            </div>
                        </div>      
                        <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="13" id="13">
                                <label class="form-check-label mx-3" for="13">Policier</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="14" id="14">
                                <label class="form-check-label mx-3" for="14">Western</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="15" id="15">
                                <label class="form-check-label mx-3" for="15">Documentaire</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types[]" type="checkbox" value="16" id="16">
                                <label class="form-check-label mx-3" for="16">Biopic</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-4">
                        <label for="admin_name">Nom de l'auteur: </label>
                        <input type="hidden" id="admin_name" name="admin_name" class="form-control" value="<?= htmlspecialchars($_SESSION['firstname']); ?>">
                        <?= htmlspecialchars($_SESSION['firstname']); ?>
                    </div>
                    <!-- <div class="form-group my-4">
                        <label for="path_img">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                        <input type="file" id="path_img" name="path_img" class="form-control" required>
                    </div> -->
                    <div class="d-flex justify-content-center mb-5">
                        <input type="submit" value ="Envoyer" class="btn btn-primary">
                    </div>
                </form>
            </section>
        </div>
    </main>

    <!-- JavaScript File -->
    <script src="../../app/js/script.js"></script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>