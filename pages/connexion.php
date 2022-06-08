<div class="form__wrapper">
  <div class="form-container">

  <?php require('req/_loginUser.php'); ?>
  <form class="user-form" action="" method="post">
    <fieldset>  
      <legend>Connexion Utilisateur</legend>

      <?php if(isset($errorMsg)){echo '<span class="error">' . $errorMsg . '</span>';}?>

      <div class="form__wrapper--label">
        <label for="nickname">Pseudo: </label>
      </div>
      <div class="form__wrapper--input">
        <input type="text" name="nickname" id="nickname" >
      </div>
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

      <button type="submit" name="connect">Se connecter</button>
    </fieldset>    
  </form>

  
  </div>
  <div class="form__wrapper--action">
    <p>Vous n'avez pas de compte ?</p> 
    <a href="?page=inscription">S'inscrire</a>
    <p>Se connecter en tant qu'administrateur ?</p> 
    <a href="?page=connexionAdmin">Se connecter</a>
  </div>
</div>




