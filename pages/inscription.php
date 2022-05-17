<?php
// Définit des variables que l'on instancie sans valeur
$pseudoErr= $firstnameErr = $lastnameErr = $mailErr = $passwordErr = "";
$pseudo = $firstname = $lastname = $mail = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["pseudo"])) {
    $pseudoErr = "Pseudo requis";
  } else {
    $pseudo = test_input($_POST["pseudo"]);
    // Vérifie si le pseudo contient des lettres, des chiffres et des espaces
    if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $pseudo)) {
      $pseudoErr = "Seuls les lettres, les chiffres et les espaces sont autorisés";
    }
  }

  if (empty($_POST["firstname"])) {
    $firstnameErr = "Nom requis";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // Vérifie si le nom contient des lettres et des espaces
    if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
      $firstnameErr = "Seuls les lettres et les espaces sont autorisés";
    }
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Prénom requis";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // Vérifie si le nom contient des lettres et des espaces
    if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
      $lastnameErr = "Seuls les lettres et les espaces sont autorisés";
    }
  }
  
  if (empty($_POST["mail"])) {
    $mailErr = "Email requis";
  } else {
    $mail = test_input($_POST["mail"]);
    // Vérifie si l'adresse e-mail correspond au format établie
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
    <label for="pseudo">Pseudo: </label>
    <input type="text" name="pseudo" value="<?php echo $pseudo;?>" required >
    <span class="error">* <?php echo $pseudoErr;?></span>
    
    <label for="firstname">Nom: </label>
    <input type="text" name="firstname" value="<?php echo $firstname;?>" required >
    <span class="error">* <?php echo $firstnameErr;?></span>

    <label for="lastname">Prénom: </label>
    <input type="text" name="lastname" value="<?php echo $lastname;?>" required >
    <span class="error">* <?php echo $lastnameErr;?></span>

    <label for="mail">E-mail: </label>
    <input type="mail" name="mail" value="<?php echo $mail;?>" required >
    <span class="error">* <?php echo $mailErr;?></span>

    <label for="password">Mot de passe: </label>
    <input type="password" id="password" name="password" value="<?php echo $password;?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&/?*]).{8,}" title="Doit contenir au minimum un nombre, une lettre minuscule, une lettre majuscule, un caractère spécial et au moins 8 caractères ou plus" required >
    <span class="error">* <?php echo $passwordErr;?></span>

    <button type="submit" name="submit">S'enregistrer</button>
</form>

<div id="message">
  <h3>Votre mot de passe doit comporter: </h3>
  <p id="letter" class="invalid">Une lettre minuscule</p>
  <p id="capital" class="invalid">Une lettre majuscule</p>
  <p id="number" class="invalid">Un nombre</p>
  <p id="special" class="invalid">Un caractère spécial</p>
  <p id="length" class="invalid">8 caractères minimum</p>
</div>

<p>Vous avez déjà un compte ?</p> 
<a href="?page=connexion">Se connecter</a>