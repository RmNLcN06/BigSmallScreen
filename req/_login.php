<?php

// session_start();
require ('req/_connect.php');

// Envoi du formulaire
if(isset($_POST['submit'])) 
{
    // Vérification que tous les champs du formulaire sont remplis
    if(!empty($_POST['nickname']) && !empty($_POST['mail']) && !empty($_POST['pwd']))
    {
        // Fonction pour se protéger des informations entrées par l'utilisateur
        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Protections + tests des données envoyés par l'utilisateurs avant de les récupérer dans des variables
        $user_nickname = test_input($_POST['nickname']);
        $user_mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $user_pwd = test_input($_POST['pwd']);

        // Vérification de l'existance de l'utilisateur dans la base de données en vérifiant si son pseudo existe
        $checkIfUserExists = $database->prepare('SELECT * FROM users WHERE nickname = ?');
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
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['nickname'] = $userInfos['nickname'];
                $_SESSION['firstname'] = $userInfos['firstname'];
                $_SESSION['lastname'] = $userInfos['lastname'];
                $_SESSION['role_id'] = $userInfos['role_id'];

                // Redirection de l'utilisateur connecté vers la page d'accueil
                header('Location: ?page=accueil');
           }
           else 
           {
                $msgErr = "Le mot de passe que vous avez entré est incorrect. Veuillez essayer à nouveau.";
           }

        }
        else
        {
            $msgErr = "Le pseudo ou le mail entré est incorrect. Veuillez réessayer.";
        }
    }
    elseif (empty($_POST['nickname']))
    {
        $nicknameMsgErr = "Veuillez entrer votre pseudo.";
    }
    elseif (empty($_POST['mail']))
    {
        $mailMsgErr = "Veuillez entrer votre email.";
    }
    elseif (empty($_POST['pwd']))
    {
        $pwdMsgErr = "Veuillez entrer votre mot de passe.";
    }
    else
    {
        $msgErr = "Veuillez remplir tous les champs de ce formulaire.";
    }
}