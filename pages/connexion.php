<?php

require('req/_login.php');

// define variables and set to empty values
// Définit des variables que l'on instancie sans valeur
// $mailErr = $pwdErr = "";
// $mail = $pwd = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
//   if (empty($_POST["mail"])) {
//     $mailErr = "Email requis";
//   } else {
//     $mail = test_input($_POST["mail"]);
//     // check if e-mail address is well-formed
//     // Vérifie si l'adresse e-mail est au bon format
//     if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
//       $mailErr = "Format de l'email invalide";
//     }
//   }
    
//   if (empty($_POST["pwd"])) {
//     $pwdErr = "Mot de passe requis";
//   } else {
//     $pwd = test_input($_POST["pwd"]);
//     // Vérifie si le mot de passe est valide (vérification par regex)
//     if (!preg_match("(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&/?*]).{8,}", $pwd)) {
//       $pwdErr = "Format du mot de passe invalide";
//     }
//   }
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
      <legend>Veuillez entrer vos informations de connexion</legend>

      <?php if(isset($msgErr)){echo '<span class="error">' . $msgErr . '</span>';}?>

      <div class="form__wrapper--label">
        <label for="nickname">Pseudo: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="text" name="nickname" id="nickname" >
      </div>
      <?php if(isset($nicknameMsgErr)){echo '<span class="error">' . $nicknameMsgErr . '</span>';}?>

      <div class="form__wrapper--label">
        <label for="mail">E-mail: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="email" name="mail" id="mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$" >
      </div>
      <?php if(isset($mailMsgErr)){echo '<span class="error">' . $mailMsgErr . '</span>';}?>
      <!-- 
          [A-Za-z0-9._%+-]+ : caractères minuscules, majuscules, digitales, caractères spéciaux (._%+-) et accepte plusieurs fois les termes précédents
          @ : signe arobase
          [A-Za-z0-9.-]+ : caractères minuscules, majuscules, digitales, caractères spéciaux (.-) et accepte plusieurs fois les termes précédents
          \. : signe point
          [A-Za-z] : caractères minuscules, majuscules
          {2,63} : entre 2 et 63 caractères pour l'ensemble précédent
      -->
      <div class="form__wrapper--label">
        <label for="pwd">Mot de passe: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="password" id="pwd" name="pwd"  title="Doit contenir au minimum un nombre, une lettre minuscule, une lettre majuscule, un caractère spécial et au moins 8 caractères ou plus">
      </div>
      <?php if(isset($pwdMsgErr)){echo '<span class="error">' . $pwdMsgErr . '</span>';}?>
      <!-- 
          (?=.*\d) : digitale
          (?=.*[a-z]) : minuscule
          (?=.*[A-Z]) : majuscule
          (?=.*[!@#$%^&_/*]) : caractère spécial
          {8,} : 8 caractères minimum
      -->
      <div class="pwd-message">
        <h3>Votre mot de passe doit comporter: </h3>
        <p id="letter" class="invalid">Une lettre minuscule</p>
        <p id="capital" class="invalid">Une lettre majuscule</p>
        <p id="number" class="invalid">Un nombre</p>
        <p id="special" class="invalid">Un caractère spécial</p>
        <p id="length" class="invalid">8 caractères minimum</p>
      </div>

      <button type="submit" name="submit">Se connecter</button>

      <div class="form__wrapper--action">
        <p>Vous n'avez pas de compte ?</p> 
        <a href="?page=inscription">S'inscrire</a>
      </div>
    </fieldset>
  </form>
</div>




