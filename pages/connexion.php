<?php
// define variables and set to empty values
// Définit des variables que l'on instancie sans valeur
$mailErr = $passwordErr = "";
$mail = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["mail"])) {
    $mailErr = "Email requis";
  } else {
    $mail = test_input($_POST["mail"]);
    // check if e-mail address is well-formed
    // Vérifie si l'adresse e-mail est au bon format
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Format de l'email invalide";
    }
  }
    
  if (empty($_POST["password"])) {
    $passwordErr = "Mot de passe requis";
  } else {
    $password = test_input($_POST["password"]);
    // Vérifie si le mot de passe est valide (vérification par regex)
    if (!preg_match("(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&/?*]).{8,}", $password)) {
      $passwordErr = "Format du mot de passe invalide";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form action="" method="post">
    <label for="mail">E-mail</label>
    <input type="mail" id="mail" name="mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$" required>
    <!-- 
        [A-Za-z0-9._%+-]+ : caractères minuscules, majuscules, digitales, caractères spéciaux (._%+-) et accepte plusieurs fois les termes précédents
        @ : signe arobase
        [A-Za-z0-9.-]+ : caractères minuscules, majuscules, digitales, caractères spéciaux (.-) et accepte plusieurs fois les termes précédents
        \. : signe point
        [A-Za-z] : caractères minuscules, majuscules
        {2,63} : entre 2 et 63 caractères pour l'ensemble précédent
    -->
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&/?*]).{8,}" title="Doit contenir au minimum un nombre, une lettre minuscule, une lettre majuscule, un caractère spécial et au moins 8 caractères ou plus" required>
    <!-- 
        (?=.*\d) : digitale
        (?=.*[a-z]) : minuscule
        (?=.*[A-Z]) : majuscule
        (?=.*[!@#$%^&_/*]) : caractère spécial
        {8,} : 8 caractères minimum
    -->
    <button type="submit">Se connecter</button>
</form>


<div id="message">
  <h3>Votre mot de passe doit comporter: </h3>
  <p id="letter" class="invalid">Une lettre minuscule</p>
  <p id="capital" class="invalid">Une lettre majuscule</p>
  <p id="number" class="invalid">Un nombre</p>
  <p id="special" class="invalid">Un caractère spécial</p>
  <p id="length" class="invalid">8 caractères minimum</p>
</div>

<p>Vous n'avez pas de compte ?</p> 
<a href="?page=inscription">S'inscrire</a>