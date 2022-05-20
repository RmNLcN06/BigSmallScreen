<?php

require ('req/_signup.php');
// if(!empty($_POST)) 
//  {
 // Définit des variables que l'on instancie sans valeur pour les messages d'erreur
//  $nicknameErr= $firstnameErr = $lastnameErr = $mailErr = $pwdErr = "";
//  $nickname = $firstname = $lastname = $mail = $pwd = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // On vérifie que le formulaire a bien été envoyé
  
    // SI le formulaire a bien été envoyé
    // On vérifie que TOUS les champs requis ne sont pas vides
    // if(isset($_POST["nickname"], $_POST["firstname"], $_POST["lastname"], $_POST["mail"], $_POST["pwd"]) && !empty($_POST["nickname"]) && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["mail"]) && !empty($_POST["pwd"]))
    // {
      // Le formulaire est complet
      // On récupère les données en les protégeant

     

      // if (empty($_POST["nickname"])) {
      //   $nicknameErr = "Pseudo requis";
      // } else {
      //   $nickname = test_input($_POST["nickname"]);
      //   // Vérifie si le pseudo contient des lettres, des chiffres et des espaces
      //   if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $nickname)) {
      //     $nicknameErr = "Seuls les lettres, les chiffres et les espaces sont autorisés";
      //   }
      // }

      // if (empty($_POST["firstname"])) {
      //   $firstnameErr = "Nom requis";
      // } else {
      //   $firstname = test_input($_POST["firstname"]);
      //   // Vérifie si le nom contient des lettres et des espaces
      //   if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
      //     $firstnameErr = "Seuls les lettres et les espaces sont autorisés";
      //   }
      // }

      // if (empty($_POST["lastname"])) {
      //   $lastnameErr = "Prénom requis";
      // } else {
      //   $lastname = test_input($_POST["lastname"]);
      //   // Vérifie si le prénom contient des lettres et des espaces
      //   if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
      //     $lastnameErr = "Seuls les lettres et les espaces sont autorisés";
      //   }
      // }
      
      // if (empty($_POST["mail"])) {
      //   $mailErr = "Email requis";
      // } else {
      //   $mail = test_input($_POST["mail"]);
      //   // Vérifie si l'adresse e-mail correspond au format établie
      //   if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      //     $mailErr = "Format de l'email invalide";
      //   }
      // }
        
      // if (empty($_POST["pwd"])) {
      //   $pwdErr = "Mot de passe requis";
      // } else {
      //   $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
      //   // $pwd = test_input($_POST["pwd"]);
      //   // Vérifie si le mot de passe est valide (vérification par regex)
      //   if (!preg_match("(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&/?*]).{8,}", $pwd)) {
      //     $pwdErr = "Format du mot de passe invalide";
      //   }
      // }

    //   
    //   // On enregistre en BDD
    //   require_once("req/_connect.php");

    //   // $role_name = "SELECT name FROM roles INNER JOIN users ON roles.id = users.role_id";

    //   $sql = "INSERT INTO users (nickname, firstname, lastname, mail, pwd) VALUES (:nickname, :firstname, :lastname, :mail, '$pwd')";

    //   // Préparation de la requête
    //   $query = $bdd->prepare($sql);

    //   // Connexion des variables PHP à leurs paramètres SQL
    //   $query->bindValue(":nickname", $nickname, PDO::PARAM_STR);
    //   $query->bindValue(":firstname", $firstname, PDO::PARAM_STR);
    //   $query->bindValue(":lastname", $lastname, PDO::PARAM_STR);
    //   $query->bindValue(":mail", $mail, PDO::PARAM_STR);

    //   // Execution de la requête
    //   $query->execute();
    // }
  // }
  // else 
  // {
  //   die("Le formulaire est incomplet");
  // }
// }


// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
?>

<div class="form__wrapper">
  <form method="post">
    <fieldset>
      <legend>Veuillez remplir le formulaire d'inscription</legend>

      <?php if(isset($msgErr)){echo '<span class="error">' . $msgErr . '</span>';}?>

      <div class="form__wrapper--label">
        <label for="nickname">Pseudo: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="text" name="nickname" id="nickname" >
      </div>
      <?php if(isset($nicknameMsgErr)){echo '<span class="error">' . $nicknameMsgErr . '</span>';}?>
    
      <div class="form__wrapper--label">
        <label for="firstname">Nom: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="text" name="firstname" id="firstname" >
      </div>
      <?php if(isset($firstnameMsgErr)){echo '<span class="error">' . $firstnameMsgErr . '</span>';}?>

      <div class="form__wrapper--label">
        <label for="lastname">Prénom: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="text" name="lastname" id="lastname" >
      </div>
      <?php if(isset($lastnameMsgErr)){echo '<span class="error">' . $lastnameMsgErr . '</span>';}?>

      <div class="form__wrapper--label">
        <label for="mail">E-mail: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="email" name="mail" id="mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$" >
      </div>
      <?php if(isset($mailMsgErr)){echo '<span class="error">' . $mailMsgErr . '</span>';}?>

      <div class="form__wrapper--label">
        <label for="pwd">Mot de passe: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="password" id="pwd" name="pwd"  title="Doit contenir au minimum un nombre, une lettre minuscule, une lettre majuscule, un caractère spécial et au moins 8 caractères ou plus">
      </div>
      <?php if(isset($pwdMsgErr)){echo '<span class="error">' . $pwdMsgErr . '</span>';}?>


      <div class="pwd-message">
        <h3>Votre mot de passe doit comporter: </h3>
        <p id="letter" class="invalid">Une lettre minuscule</p>
        <p id="capital" class="invalid">Une lettre majuscule</p>
        <p id="number" class="invalid">Un nombre</p>
        <p id="special" class="invalid">Un caractère spécial</p>
        <p id="length" class="invalid">8 caractères minimum</p>
      </div>

      <button type="submit" name="submit">S'inscrire</button>

      <div class="form__wrapper--action">
        <p>Vous avez déjà un compte ?</p>
        <a href="?page=connexion">Se connecter</a>
      </div>
    </fieldset>
  </form>
  
</div>
