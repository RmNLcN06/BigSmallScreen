<?php

require ('req/_connect.php');

// Envoi du formulaire
if(isset($_POST['submit'])) 
{
    // Vérification que tous les champs du formulaire sont remplis
    if(!empty($_POST['nickname']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail']) && !empty($_POST['pwd']))
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
        $user_firstname = test_input($_POST['firstname']);
        $user_lastname = test_input($_POST['lastname']);
        $user_mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
        $user_pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

        // Vérification de l'existance de l'utilisateur dans la base de données
        $checkIfUserAlreadyExists = $database->prepare('SELECT nickname, firstname, lastname, mail FROM users WHERE nickname = ? AND firstname = ? AND lastname = ? AND mail = ?');
        $checkIfUserAlreadyExists->execute([$user_nickname, $user_firstname, $user_lastname, $user_mail]);

        // Si l'utilisateur n'existe pas ...
        if($checkIfUserAlreadyExists->rowCount() == 0)
        {
            // ... on l'insère en base de données
            $insertUserOnDatabase = $database->prepare("INSERT INTO users (nickname, firstname, lastname, mail, pwd) VALUES (:nickname, :firstname, :lastname, '$user_mail', '$user_pwd')");
            
            $insertUserOnDatabase->bindValue(":nickname", $user_nickname, PDO::PARAM_STR);
            $insertUserOnDatabase->bindValue(":firstname", $user_firstname, PDO::PARAM_STR);
            $insertUserOnDatabase->bindValue(":lastname", $user_lastname, PDO::PARAM_STR);
            
            $insertUserOnDatabase->execute();

            // $role_name = "SELECT name FROM roles INNER JOIN users ON roles.id = users.role_id";

            // Récupérer les informations traitées de l'utilisateur
            $getInfosUserReg = $database->prepare("SELECT id, nickname, firstname, lastname FROM users WHERE nickname = ? AND firstname = ? AND lastname = ?");
            $getInfosUserReg->execute([$user_nickname, $user_firstname, $user_lastname]);

            $userInfos = $getInfosUserReg->fetch();

            // Données d'authentification de l'utilisateur récupérées dans des variables globales "SESSION"
            $_SESSION['authUser'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['nickname'] = $userInfos['nickname'];
            $_SESSION['firstname'] = $userInfos['firstname'];
            $_SESSION['lastname'] = $userInfos['lastname'];

            // Redirection de l'utilisateur enregistré vers la page d'accueil
            header('Location: ?page=accueil');

        }
        else
        {
            $msgErr = "L'utilisateur existe déjà sur le site.";
        }
    }
    elseif (empty($_POST['nickname']))
    {
        $nicknameMsgErr = "Veuillez entrer un pseudo.";
    }
    elseif (empty($_POST['firstname']))
    {
        $firstnameMsgErr = "Veuillez entrer un nom.";
    }
    elseif (empty($_POST['lastname']))
    {
        $lastnameMsgErr = "Veuillez entrer un prénom.";
    }
    elseif (empty($_POST['mail']))
    {
        $mailMsgErr = "Veuillez entrer un email.";
    }
    elseif (empty($_POST['pwd']))
    {
        $pwdMsgErr = "Veuillez entrer un mot de passe.";
    }
    else
    {
        $msgErr = "Veuillez remplir tous les champs de ce formulaire.";
    }
}