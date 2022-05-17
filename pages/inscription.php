<?php
// define variables and set to empty values
// Définit des variables que l'on instancie sans valeur
$firstnameErr = $lastnameErr = $mailErr = $passwordErr = "";
$firstname = $lastname = $mail = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $mailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
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
    <input type="password" name="password" value="<?php echo $password;?>" required >
    <span class="error">* <?php echo $passwordErr;?></span>

    <button type="submit" name="submit">S'enregistrer</button>
</form>

<p>Vous avez déjà un compte ?</p> 
<a href="?page=connexion">Se connecter</a>