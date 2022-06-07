<?php
// Démarrage session 
session_start();

if ($_POST) {
    if (
        isset($_POST['category_id']) && !empty($_POST['category_id'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['release_year']) && !empty($_POST['release_year'])
        && isset($_POST['work_status']) && !empty($_POST['work_status'])

        && isset($_POST['director']) && !empty($_POST['director'])
        && isset($_POST['actor']) && !empty($_POST['actor'])
        && isset($_POST['synopsis']) && !empty($_POST['synopsis'])
        && isset($_POST['content']) && !empty($_POST['content'])

        && isset($_POST['type_id[]']) && !empty($_POST['type_id[]'])
        && isset($_POST['admin_name']) && !empty($_POST['admin_name'])
        && isset($_POST['path_img']) && !empty($_POST['path_img'])
    ) {
        // Inclusion de la connexion à la base de donnée        
        require_once('../req/_connect.php');

        // Réinitialisation des données envoyées

        $category_id = strip_tags($_POST['category_id']);
        $title = strip_tags($_POST['title']);
        $release_year = strip_tags($_POST['release_year']);
        $nbr_season = strip_tags($_POST['nbr_season']);
        $work_status = strip_tags($_POST['work_status']);
        $director = strip_tags($_POST['director']);
        $actor = strip_tags($_POST['actor']);
        $synopsis = strip_tags($_POST['synopsis']);
        $content = strip_tags($_POST['content']);
        $type_id = strip_tags($_POST['type_id']);
        $admin_name = strip_tags($_POST['admin_name']);
        $path_img = strip_tags($_FILES['path_img']);

        // Vérification de l'existance de l'article dans la base de données
        $checkIfArticleAlreadyExists = $database->prepare('SELECT category_id, title, `type_id`, admin_name FROM articles WHERE category_id = ? AND title = ? AND `type_id` = ? AND admin_name = ?');
        $checkIfArticleAlreadyExists->execute([$category_id, $title, $type_id, $admin_name]);

        // Si l'article n'existe pas ...
        if($checkIfArticleAlreadyExists->rowCount() == 0)
        {


            $sql = 'INSERT INTO `articles` (`category_id`, `title`, `release_year`, `nbr_season`, `work_status`, `director`, `actor`, `synopsis`, `content`, `type_id`, `admin_name`, `path_img`) VALUES (:category_id, :title, :release_year, :nbr_season, :work_status, :director, :actor, :synopsis, :content, :type_id, :admin_name, :path_img);';
    
            $query = $database->prepare($sql);
    
            $query->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            $query->bindValue(':title', $title, PDO::PARAM_STR);
            $query->bindValue(':release_year', $release_year, PDO::PARAM_INT);
            $query->bindValue(':nbr_season', $nbr_season, PDO::PARAM_INT);
            $query->bindValue(':work_status', $work_status, PDO::PARAM_INT);
            $query->bindValue(':director', $director, PDO::PARAM_STR);
            $query->bindValue(':actor', $actor, PDO::PARAM_STR);
            $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
            $query->bindValue(':content', $content, PDO::PARAM_STR);
            $query->bindValue(':type_id', $type_id, PDO::PARAM_INT);
            $query->bindValue(':admin_name', $admin_name, PDO::PARAM_STR);
            // $query->bindValue(':path_img', $path_img, PDO::PARAM_STR);

            $path_img_name = $_FILES['file']['name'];
            $path_img_tmp_name = $_FILES['file']['tmp_name'];
            $path_img_size = $_FILES['file']['size'];
            $path_img_error = $_FILES['file']['error'];
            $path_img_type = $_FILES['file']['type'];

            $path_img_ext = explode('.', $path_img_name);
            $path_img_actual_ext = strtolower(end($path_img_ext));

            $allowed = array('jpg', 'jpeg', 'png');

            if(in_array($path_img_actual_ext, $allowed)) {
                if($path_img_error === 0) 
                {
                    if($path_img_size < 100000)
                    {
                        $path_img_new_name = uniqid('', true) . "." . $path_img_actual_ext;
                        $path_img_destination =  '/' . "img/" . $path_img_new_name;
                        move_uploaded_file($path_img_tmp_name, $path_img_destination);
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
    
            $query->execute();
    
            $_SESSION['message'] = "Nouveau article ajouté";
            require_once('../req/_close.php');
    
            header('Location: ../admin_dashboard_admin.php');
        }
    }
    else
    {
        $_SESSION['erreur'] = "Cet article existe déjà existe déjà.";
    }
    
} 
else 
{
    $_SESSION['erreur'] = "Le formulaire est incomplet.";
}


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
                <form method="post" enctype="multipart/form-data">
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
                            <option value="1">En production</option>
                            <option value="2">Diffusion en cours</option>
                            <option value="3">Sortie</option>
                            <option value="4">Terminée</option>
                            <option value="5">Annulée</option>
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="director">Réalisateur(s) / trice(s)</label>
                        <input type="text" id="director" name="director" class="form-control" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="actor">Acteur(s) / trice(s) principaux</label>
                        <input type="text" id="actor" name="actor" class="form-control my-3" required>
                        <input type="text" id="actor" name="actor" class="form-control my-3" required>
                        <input type="text" id="actor" name="actor" class="form-control my-3" required>
                        <input type="text" id="actor" name="actor" class="form-control my-3" required>
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
                        <label for="type_id[]">Genre(s) de l'article</label>
                        <select name="type_id[]" id="type_id[]" required>
                            <option value="" disabled selected>Choisissez le ou les genres</option>
                            <option value="1">Science-fiction</option>
                            <option value="2">Comédie</option>
                            <option value="3">Comédie dramatique</option>
                            <option value="4">Horreur</option>
                            <option value="5">Thriller</option>
                            <option value="6">Romance</option>
                            <option value="7">Biographie</option>
                            <option value="8">Aventure</option>
                            <option value="9">Action</option>
                            <option value="10">Drame</option>
                            <option value="11">Fantastique</option>
                            <option value="12">Guerre</option>
                            <option value="13">Policier</option>
                            <option value="14">Western</option>
                            <option value="15">Documentaire</option>
                            <option value="16">Biopic</option>
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="admin_name">Nom de l'auteur: </label>
                        <input type="hidden" id="admin_name" name="admin_name" class="form-control" value="<?= htmlspecialchars($_SESSION['firstname']); ?>">
                        <?= htmlspecialchars($_SESSION['firstname']); ?>
                    </div>
                    <div class="form-group my-4">
                        <label for="path_img">Veuillez choisir l'image à transférer</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                        <input type="file" id="path_img" name="path_img" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Envoyer</button>
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