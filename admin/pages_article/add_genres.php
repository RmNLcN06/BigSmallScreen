<?php
// Démarrage session 
session_start();

if($_POST){

    if(isset($_POST['types_id']) && !empty($_POST['types_id'])) {

        require_once('../req/_connect.php');

        // $articles_id = $_GET['id'];
        $types_id = $_POST['types_id'];
        // $types_name = $_POST['name'];

        $checkEntries = $database->prepare("SELECT * FROM articles_types WHERE types_id = ?");
        $checkEntries->execute($types_id);

        if($checkEntries->rowCount() == 0) 
        {
            $insertCheckEntries = $database->prepare("INSERT INTO articles_types (types_id) VALUES ('" . $types_id ."')");
            // $insertCheckEntries->bindValue(":articles_id", $articles_id, PDO::PARAM_INT);
            // $insertCheckEntries->bindValue(":types_id", $types_id, PDO::PARAM_INT);

            $insertCheckEntries->execute();
        }

        // foreach($_POST['types_id'] as $value){
        //     echo "value : ".$value.'<br/>';
        // }

    }

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
                <h1 class="d-flex justify-content-center my-5">Les informations entrées pour l'article sont enregistrées.</h1>
                <h3 class="d-flex justify-content-center my-5">Veuillez sélectionner les genres traitées par l'article.</h3>
                <form method="post" action="" enctype="multipart/form-data">
                <h4>Genre(s) de l'oeuvre</h4>
                    <div class="form-group d-flex justify-content-around my-4">

                    <?php 
                        require_once('../req/_connect.php');
                        $checked_arr = [];
                        $fetchTypes = $database->prepare('SELECT * FROM articles_types');
                        if($fetchTypes->rowCount() > 0)
                        {
                            $result = $fetchTypes->fetch();
                            $checked_arr = $result['types_id'];
                        }

                        $types_arr = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16"];
                        foreach($types_arr as $type)
                        {
                            $checked = "";
                            if(in_array($type, $checked_arr))
                            {
                                $checked = "checked";
                            } 
                    ?>
                            <input class="form-check-input" name="types_id[]" type="checkbox" value="<?= $type; ?>" <?= $checked; ?>>
                            <label class="form-check-label mx-3" for="<?= $type; ?>">Science-fiction</label>
                    <?php
                        };
                    ?>
                        <!-- <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="1" id="1">
                                <label class="form-check-label mx-3" for="1">Science-fiction</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="2" id="2">
                                <label class="form-check-label mx-3" for="2">Comédie</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="3" id="3">
                                <label class="form-check-label mx-3" for="3">Comédie dramatique</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="4" id="4">
                                <label class="form-check-label mx-3" for="4">Horreur</label>
                            </div>
                        </div>
                        <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="5" id="5">
                                <label class="form-check-label mx-3" for="5">Thriller</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="6" id="6">
                                <label class="form-check-label mx-3" for="6">Romance</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="7" id="7">
                                <label class="form-check-label mx-3" for="7">Biographie</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="8" id="8">
                                <label class="form-check-label mx-3" for="8">Aventure</label>
                            </div>
                        </div>
                        <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="9" id="9">
                                <label class="form-check-label mx-3" for="9">Action</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="10" id="10">
                                <label class="form-check-label mx-3" for="10">Drame</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="11" id="11">
                                <label class="form-check-label mx-3" for="11">Fantastique</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="12" id="12">
                                <label class="form-check-label mx-3" for="12">Guerre</label>
                            </div>
                        </div>      
                        <div class="d-flex my-3 flex-column">
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="13" id="13">
                                <label class="form-check-label mx-3" for="13">Policier</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="14" id="14">
                                <label class="form-check-label mx-3" for="14">Western</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="15" id="15">
                                <label class="form-check-label mx-3" for="15">Documentaire</label>
                            </div>
                            <div class="form-check my-2">
                                <input class="form-check-input" name="types_id[]" type="checkbox" value="16" id="16">
                                <label class="form-check-label mx-3" for="16">Biopic</label>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-group my-2">
                        <input class="form-control" type="hidden" readonly value="">
                    </div>
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