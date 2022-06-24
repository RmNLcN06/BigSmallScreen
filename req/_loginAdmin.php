<?php
require ('req/_connect.php');
require ('req/_functions.php');

// Envoi du formulaire
if(isset($_POST['connect'])) 
{
    // Vérification que tous les champs du formulaire sont remplis
    if(!empty($_POST['nickname']) && !empty($_POST['pwd'])) 
    {
    // if(!empty($_POST['nickname'])) {
    //     if(!empty($_POST['mail'])) {
    //         if(!empty($_POST['pwd'])) 

        // Protections + tests des données envoyés par l'utilisateurs avant de les récupérer dans des variables
        $user_nickname = test_input($_POST['nickname']);
        $user_pwd = htmlspecialchars($_POST['pwd']);

        // Vérification de l'existence de l'utilisateur dans la base de données (pseudo existant ?)
        $checkIfUserExists = $database->prepare("SELECT * FROM admins WHERE nickname = ?");
        $checkIfUserExists->execute([$user_nickname]);

        // Si l'utilisateur existe ...
        if($checkIfUserExists->rowCount() > 0)
        {
            // Récupération des données de l'utilisateur
            $userInfos = $checkIfUserExists->fetch();

            // Vérification si mot de passe entré par l'utilisateur est le même que celui stocké en base de données
            if(password_verify($user_pwd, $userInfos['pwd']))           
            {
                // Données d'authentification de l'utilisateur récupérées dans des variables globales "SESSION"
                $_SESSION['authAdmin'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['nickname'] = $userInfos['nickname'];
                $_SESSION['firstname'] = $userInfos['firstname'];
                $_SESSION['lastname'] = $userInfos['lastname'];

                // Redirection de l'utilisateur connecté vers la page d'accueil
                header('Location: admin/admin_accueil.php');
            }
            else 
            {
                $errorMsg = "Mot de passe incorrect. Veuillez réessayer.";
            }
        }
        else 
        {
            $errorMsg = "Pseudo incorrect. Veuillez réessayer.";
        }
    }
    else 
    {
        $errorMsg = "Veuillez compléter tous les champs.";
    }
}
