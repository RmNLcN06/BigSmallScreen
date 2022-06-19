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
        && isset($_POST['director_three']) && !empty($_POST['director_three']) 
        && isset($_POST['director_four']) && !empty($_POST['director_four']) 
        && isset($_POST['actor_one']) && !empty($_POST['actor_one'])
        && isset($_FILES['actor_img_one']) && !empty($_FILES['actor_img_one'])
        && isset($_POST['actor_role_one']) && !empty($_POST['actor_role_one'])
        && isset($_POST['actor_two']) && !empty($_POST['actor_two'])
        && isset($_FILES['actor_img_two']) && !empty($_FILES['actor_img_two'])
        && isset($_POST['actor_role_two']) && !empty($_POST['actor_role_two'])
        && isset($_POST['actor_three']) && !empty($_POST['actor_three'])
        && isset($_FILES['actor_img_three']) && !empty($_FILES['actor_img_three'])
        && isset($_POST['actor_role_three']) && !empty($_POST['actor_role_three'])
        && isset($_POST['actor_four']) && !empty($_POST['actor_four'])
        && isset($_FILES['actor_img_four']) && !empty($_FILES['actor_img_four'])
        && isset($_POST['actor_role_four']) && !empty($_POST['actor_role_four'])
        && isset($_POST['actor_five']) && !empty($_POST['actor_five'])
        && isset($_FILES['actor_img_five']) && !empty($_FILES['actor_img_five'])
        && isset($_POST['actor_role_five']) && !empty($_POST['actor_role_five'])
        && isset($_POST['synopsis']) && !empty($_POST['synopsis'])
        && isset($_POST['content']) && !empty($_POST['content'])
        && isset($_POST['admin_firstname']) && !empty($_POST['admin_firstname'])
        && isset($_FILES['path_img']) && !empty($_FILES['path_img'])
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
            $directorThree = strip_tags($_POST['director_three']);
            $directorFour = strip_tags($_POST['director_four']);

            $actorOne = strip_tags($_POST['actor_one']);
            $actorImgOne = $_FILES['actor_img_one'];
            $actorRoleOne = strip_tags($_POST['actor_role_one']);

            $actorTwo = strip_tags($_POST['actor_two']);
            $actorImgTwo = $_FILES['actor_img_two'];
            $actorRoleTwo = strip_tags($_POST['actor_role_two']);

            $actorThree = strip_tags($_POST['actor_three']);
            $actorImgThree = $_FILES['actor_img_three'];
            $actorRoleThree = strip_tags($_POST['actor_role_three']);

            $actorFour = strip_tags($_POST['actor_four']);
            $actorImgFour = $_FILES['actor_img_four'];
            $actorRoleFour = strip_tags($_POST['actor_role_four']);

            $actorFive = strip_tags($_POST['actor_five']);
            $actorImgFive = $_FILES['actor_img_five'];
            $actorRoleFive = strip_tags($_POST['actor_role_five']);

            $synopsis = strip_tags($_POST['synopsis']);
            $content = strip_tags($_POST['content']);

            $adminFirstname = strip_tags($_POST['admin_firstname']);


            $path_img_destination = $_FILES['path_img'];


            // $typesGenre = $_POST['types'];

            // for($i = 0 ; $i <= sizeof($typesGenre) ; $i++)
            // {
            //     $sqlTypes = "INSERT INTO articles_types (types_id)
            //             VALUES ('". $typesGenre[$i]. "')";
            //             print_r($sqlTypes);
            //     $query->execute();
            // }


            



            //  Vérification de l'existance de l'article dans la base de données
            $checkIfArticleAlreadyExists = $database->prepare('SELECT title, admin_firstname FROM articles WHERE title = ? AND admin_firstname = ?');
            $checkIfArticleAlreadyExists->execute([$title, $adminFirstname]);

            // Si l'article n'existe pas ...
            if($checkIfArticleAlreadyExists->rowCount() == 0)
            {
            
                // Placer ici conditions pour img
                $actorImgOne = $_FILES['actor_img_one'];

                $actorImgOneName = $_FILES['actor_img_one']['name'];
                $actorImgOneTmpName = $_FILES['actor_img_one']['tmp_name'];
                $actorImgOneSize = $_FILES['actor_img_one']['size'];
                $actorImgOneError = $_FILES['actor_img_one']['error'];
                $actorImgOneType = $_FILES['actor_img_one']['type'];

                $actorImgOneExt = explode('.', $actorImgOneName);
                $actorImgOneActualExt = strtolower(end($actorImgOneExt));

                //////////////////////////////////////////////////////////////

                $actorImgTwo = $_FILES['actor_img_two'];

                $actorImgTwoName = $_FILES['actor_img_two']['name'];
                $actorImgTwoTmpName = $_FILES['actor_img_two']['tmp_name'];
                $actorImgTwoSize = $_FILES['actor_img_two']['size'];
                $actorImgTwoError = $_FILES['actor_img_two']['error'];
                $actorImgTwoType = $_FILES['actor_img_two']['type'];

                $actorImgTwoExt = explode('.', $actorImgTwoName);
                $actorImgTwoActualExt = strtolower(end($actorImgTwoExt));

                //////////////////////////////////////////////////////////////

                $actorImgThree = $_FILES['actor_img_three'];

                $actorImgThreeName = $_FILES['actor_img_three']['name'];
                $actorImgThreeTmpName = $_FILES['actor_img_three']['tmp_name'];
                $actorImgThreeSize = $_FILES['actor_img_three']['size'];
                $actorImgThreeError = $_FILES['actor_img_three']['error'];
                $actorImgThreeType = $_FILES['actor_img_three']['type'];

                $actorImgThreeExt = explode('.', $actorImgThreeName);
                $actorImgThreeActualExt = strtolower(end($actorImgThreeExt));

                //////////////////////////////////////////////////////////////

                $actorImgFour = $_FILES['actor_img_four'];

                $actorImgFourName = $_FILES['actor_img_four']['name'];
                $actorImgFourTmpName = $_FILES['actor_img_four']['tmp_name'];
                $actorImgFourSize = $_FILES['actor_img_four']['size'];
                $actorImgFourError = $_FILES['actor_img_four']['error'];
                $actorImgFourType = $_FILES['actor_img_four']['type'];

                $actorImgFourExt = explode('.', $actorImgFourName);
                $actorImgFourActualExt = strtolower(end($actorImgFourExt));

                //////////////////////////////////////////////////////////////

                $actorImgFive = $_FILES['actor_img_five'];

                $actorImgFiveName = $_FILES['actor_img_five']['name'];
                $actorImgFiveTmpName = $_FILES['actor_img_five']['tmp_name'];
                $actorImgFiveSize = $_FILES['actor_img_five']['size'];
                $actorImgFiveError = $_FILES['actor_img_five']['error'];
                $actorImgFiveType = $_FILES['actor_img_five']['type'];

                $actorImgFiveExt = explode('.', $actorImgFiveName);
                $actorImgFiveActualExt = strtolower(end($actorImgFiveExt));

                //////////////////////////////////////////////////////////////

                $pathImg = $_FILES['path_img'];

                echo '<pre>';
                print_r($pathImg);
                echo '</pre>';

                $pathImgName = $_FILES['path_img']['name'];
                $pathImgTmpName = $_FILES['path_img']['tmp_name'];
                $pathImgSize = $_FILES['path_img']['size'];
                $pathImgError = $_FILES['path_img']['error'];
                $pathImgType = $_FILES['path_img']['type'];

                $pathImgExt = explode('.', $pathImgName);
                $pathImgActualExt = strtolower(end($pathImgExt));

                $imgFormatAllowed = ['jpg', 'jpeg', 'png'];

                if(in_array($actorImgOneActualExt, $imgFormatAllowed) && in_array($actorImgTwoActualExt, $imgFormatAllowed) && in_array($actorImgThreeActualExt, $imgFormatAllowed) && in_array($actorImgFourActualExt, $imgFormatAllowed) && in_array($actorImgFiveActualExt, $imgFormatAllowed) && in_array($pathImgActualExt, $imgFormatAllowed)) 
                {
                    if($actorImgOneError === 0 && $actorImgTwoError === 0 && $actorImgThreeError === 0 && $actorImgFourError === 0 && $actorImgFiveError === 0 && $pathImgError === 0) 
                    {
                        if($actorImgOneSize < 1000000 && $actorImgTwoSize < 1000000 && $actorImgThreeSize < 1000000 && $actorImgFourSize < 1000000 && $actorImgFiveSize < 1000000 && $pathImgSize < 1000000)
                        {
                            $actorImgOneNewName = uniqid('', true) . "." . $actorImgOneActualExt;
                            $actorImgOneDestination =  '../../' . "img/actors/" . $actorImgOneNewName;
                            move_uploaded_file($actorImgOneTmpName, $actorImgOneDestination);

                            //////////////////////////////////////////////////////////////

                            $actorImgTwoNewName = uniqid('', true) . "." . $actorImgTwoActualExt;
                            $actorImgTwoDestination =  '../../' . "img/actors/" . $actorImgTwoNewName;
                            move_uploaded_file($actorImgTwoTmpName, $actorImgTwoDestination);

                            //////////////////////////////////////////////////////////////

                            $actorImgThreeNewName = uniqid('', true) . "." . $actorImgThreeActualExt;
                            $actorImgThreeDestination =  '../../' . "img/actors/" . $actorImgThreeNewName;
                            move_uploaded_file($actorImgThreeTmpName, $actorImgThreeDestination);

                            //////////////////////////////////////////////////////////////

                            $actorImgFourNewName = uniqid('', true) . "." . $actorImgFourActualExt;
                            $actorImgFourDestination =  '../../' . "img/actors/" . $actorImgFourNewName;
                            move_uploaded_file($actorImgFourTmpName, $actorImgFourDestination);

                            //////////////////////////////////////////////////////////////

                            $actorImgFiveNewName = uniqid('', true) . "." . $actorImgFiveActualExt;
                            $actorImgFiveDestination =  '../../' . "img/actors/" . $actorImgFiveNewName;
                            move_uploaded_file($actorImgFiveTmpName, $actorImgFiveDestination);

                            //////////////////////////////////////////////////////////////

                            $pathImgNewName = uniqid('', true) . "." . $pathImgActualExt;
                            $pathImgDestination =  '../../' . "img/" . $pathImgNewName;
                            move_uploaded_file($pathImgTmpName, $pathImgDestination);


                            // Placer autres conditions de réussites

                            $sql = "INSERT INTO articles (category_id, title, release_year, nbr_season, work_status, director_one, director_two, director_three, director_four, actor_one, actor_img_one,actor_role_one, actor_two, actor_img_two, actor_role_two, actor_three, actor_img_three, actor_role_three, actor_four, actor_img_four, actor_role_four, actor_five, actor_img_five,actor_role_five, synopsis, content, admin_firstname, path_img) 
                        VALUES (:category_id, :title, :release_year, :nbr_season, :work_status, :director_one, :director_two, :director_three, :director_four, :actor_one, :actor_img_one, :actor_role_one,:actor_two, :actor_img_two, :actor_role_two, :actor_three, :actor_img_three, :actor_role_three, :actor_four, :actor_img_four, :actor_role_four, :actor_five, :actor_img_five, :actor_role_five, :synopsis, :content, :admin_firstname, :path_img)";

                            $query = $database->prepare($sql);

                            $query->bindValue(':category_id', $category_id, PDO::PARAM_INT);
                            $query->bindValue(':title', $title, PDO::PARAM_STR);
                            $query->bindValue(':release_year', $release_year, PDO::PARAM_INT);
                            $query->bindValue(':nbr_season', $nbr_season, PDO::PARAM_INT);
                            $query->bindValue(':work_status', $work_status, PDO::PARAM_STR);

                            $query->bindValue(':director_one', $directorOne, PDO::PARAM_STR);
                            $query->bindValue(':director_two', $directorTwo, PDO::PARAM_STR);
                            $query->bindValue(':director_three', $directorThree, PDO::PARAM_STR);
                            $query->bindValue(':director_four', $directorFour, PDO::PARAM_STR);

                            $query->bindValue(':actor_one', $actorOne, PDO::PARAM_STR);
                            $query->bindValue(':actor_img_one', $actorImgOneDestination, PDO::PARAM_STR);
                            $query->bindValue(':actor_role_one', $actorRoleOne, PDO::PARAM_STR);

                            $query->bindValue(':actor_two', $actorTwo, PDO::PARAM_STR);
                            $query->bindValue(':actor_img_two', $actorImgTwoDestination, PDO::PARAM_STR);
                            $query->bindValue(':actor_role_two', $actorRoleTwo, PDO::PARAM_STR);

                            $query->bindValue(':actor_three', $actorThree, PDO::PARAM_STR);
                            $query->bindValue(':actor_img_three', $actorImgThreeDestination, PDO::PARAM_STR);
                            $query->bindValue(':actor_role_three', $actorRoleThree, PDO::PARAM_STR);

                            $query->bindValue(':actor_four', $actorFour, PDO::PARAM_STR);
                            $query->bindValue(':actor_img_four', $actorImgFourDestination, PDO::PARAM_STR);
                            $query->bindValue(':actor_role_four', $actorRoleFour, PDO::PARAM_STR);

                            $query->bindValue(':actor_five', $actorFive, PDO::PARAM_STR);
                            $query->bindValue(':actor_img_five', $actorImgFiveDestination, PDO::PARAM_STR);
                            $query->bindValue(':actor_role_five', $actorRoleFive, PDO::PARAM_STR);

                            $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
                            $query->bindValue(':content', $content, PDO::PARAM_STR);
                            $query->bindValue(':admin_firstname', $adminFirstname, PDO::PARAM_STR);
                            $query->bindValue(':path_img', $pathImgDestination, PDO::PARAM_STR);

                            $query->execute();

                            $_SESSION['message'] = "Les informations de l'article sont ajoutées. ";
                            require_once('../req/_close.php');

                            // header('Location: add_genres.php');
                            header('Location: ../admin_dashboard_article.php');

                            // $query->execute();
        
                            // $_SESSION['message'] = "Nouveau article ajouté";
                            // require_once('../req/_close.php');
                    
                            // header('Location: ../admin_dashboard_admin.php');
                        } 
                        else
                        {
                            $_SESSION['erreur'] = "Taille trop grande du fichier.";
                        }
                    }
                    else 
                    {
                        $_SESSION['erreur'] = "Erreur de chargement du fichier.";
                    }
                }
                else 
                {
                    $_SESSION['erreur'] = "Extension du fichier non reconnue.";
                }
            }
            else 
            {
                $_SESSION['erreur'] = "Cet article existe déjà.";
            }
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
    //     $checkIfArticleAlreadyExists = $database->prepare('SELECT category_id, title, `type_id`, admin_firstname FROM articles WHERE category_id = ? AND title = ? AND `type_id` = ? AND admin_firstname = ?');
    //     $checkIfArticleAlreadyExists->execute([$category_id, $title, $type_id, $adminFirstname]);

    //     // Si l'article n'existe pas ...
    //     if($checkIfArticleAlreadyExists->rowCount() == 0)
    //     {
    //         $sql = 'INSERT INTO `articles` (`category_id`, `title`, `release_year`, `nbr_season`, `work_status`, `director`, `actor`, `synopsis`, `content`, `type_id`, `admin_firstname`) VALUES (:category_id, :title, :release_year, :nbr_season, :work_status, :director, :actor, :synopsis, :content, :pdotype, :admin_firstname);';
    
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
                        <a href="./add_infos.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $_SESSION['erreur']; ?>
                    </div>
                    <?= $_SESSION['erreur'] = ""; ?>
                <?php
                }
                ?>
                <h1 class="d-flex justify-content-center my-5">Ajouter un article</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group my-4">
                        <!-- <img src="../../img/connexion.png" alt=""> -->
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
                        <label for="director_three">Réalisateur / trice</label>
                        <input type="text" id="director_three" name="director_three" class="form-control my-3" required>
                        <label for="director_four">Réalisateur / trice</label>
                        <input type="text" id="director_four" name="director_four" class="form-control my-3" required>
                    </div>
                    <div class="form-group my-4">
                        <h4>Acteur(s) / trice(s) principaux</h4>

                        <label for="actor_one">Acteur / trice</label>
                        <input type="text" id="actor_one" name="actor_one" class="form-control my-3" required>
                        <label for="actor_img_one">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="file" id="actor_img_one" name="actor_img_one" class="form-control" required>
                        <label for="actor_role_one">Rôle</label>
                        <input type="text" id="actor_role_one" name="actor_role_one" class="form-control my-3" required>

                        <label for="actor_two">Acteur / trice</label>
                        <input type="text" id="actor_two" name="actor_two" class="form-control my-3" required>
                        <label for="actor_img_two">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="file" id="actor_img_two" name="actor_img_two" class="form-control" required>
                        <label for="actor_role_two">Rôle</label>
                        <input type="text" id="actor_role_two" name="actor_role_two" class="form-control my-3" required>

                        <label for="actor_three">Acteur / trice</label>
                        <input type="text" id="actor_three" name="actor_three" class="form-control my-3" required>
                        <label for="actor_img_three">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="file" id="actor_img_three" name="actor_img_three" class="form-control" required>
                        <label for="actor_role_three">Rôle</label>
                        <input type="text" id="actor_role_three" name="actor_role_three" class="form-control my-3" required>

                        <label for="actor_four">Acteur / trice</label>
                        <input type="text" id="actor_four" name="actor_four" class="form-control my-3" required>
                        <label for="actor_img_four">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="file" id="actor_img_four" name="actor_img_four" class="form-control" required>
                        <label for="actor_role_four">Rôle</label>
                        <input type="text" id="actor_role_four" name="actor_role_four" class="form-control my-3" required>

                        <label for="actor_five">Acteur / trice</label>
                        <input type="text" id="actor_five" name="actor_five" class="form-control my-3" required>
                        <label for="actor_img_five">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="file" id="actor_img_five" name="actor_img_five" class="form-control" required>
                        <label for="actor_role_five">Rôle</label>
                        <input type="text" id="actor_role_five" name="actor_role_five" class="form-control my-3" required>
                    </div>
                    <div class="form-group my-4">
                        <p><label for="synopsis">Synopsis</label></p>
                        <textarea name="synopsis" id="synopsis" cols="173" rows="10" class="form-control" required ></textarea>
                    </div>
                    <div class="form-group my-4">
                        <p><label for="content">Contenu de l'article</label></p>
                        <textarea name="content" id="content" cols="173" rows="10" class="form-control" required ></textarea>
                    </div>
                    <div class="form-group my-4">
                        <label for="admin_firstname">Nom de l'auteur: </label>
                        <input type="hidden" id="admin_firstname" name="admin_firstname" class="form-control" value="<?= htmlspecialchars($_SESSION['firstname']); ?>">
                        <?= htmlspecialchars($_SESSION['firstname']); ?>
                    </div>
                    <div class="form-group my-4">
                        <label for="path_img">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="file" id="path_img" name="path_img" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-center mb-5">
                        <input type="submit" value="Envoyer" class="btn btn-primary">
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