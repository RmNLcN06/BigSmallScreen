<div class="form__wrapper">
  <div class="form-container">
    <div class="form__title">
      <h1>Bon retour parmi nous !</h1>
      <h3>Vous pouvez vous connecter pour accéder à votre compte existant et parcourir toutes vos rubriques préférées.</h3>
    </div>
  
    <div class="form__login">
      <div class="form__img">
        <img src="img/connexion.png" alt="Trois personnes sur un canapé">
      </div>
      <?php require('req/_loginUser.php'); ?>
      <form class="user-form" action="" method="post" enctype="multipart/form-data">
        <fieldset>  
        <h2>Connexion</h2>


          <div class="form__wrapper--label">
            <label for="nickname"></label>
          </div>
          <div class="form__wrapper--input">
            <input type="text" name="nickname" id="nickname" placeholder="Nom d'utilisateur">
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
            <label for="pwd"></label>
          </div>
          <div class="form__wrapper--input">
            <input type="password" id="pwd" name="pwd"  title="Doit contenir au minimum un nombre, une lettre minuscule, une lettre majuscule, un caractère spécial et au moins 8 caractères ou plus" placeholder="Mot de passe">
          </div>

          <?php if(isset($errorMsg)){echo '<span class="error">' . $errorMsg . '</span>';}?>

          <!-- 
              (?=.*\d) : digitale
              (?=.*[a-z]) : minuscule
              (?=.*[A-Z]) : majuscule
              (?=.*[!@#$%^&_/*]) : caractère spécial
              {8,} : 8 caractères minimum
          -->

          <!-- <button type="submit" name="connect">Se connecter</button> -->
          <input class="btn" type="submit" name="connect" value="Se connecter">
          <p>Vous n'avez pas de compte ? <a href="?page=inscription">Inscrivez-vous</a></p> 
        </fieldset> 
      </form>
    </div>
  </div>
</div>

<div class="form__wrapper--action">
  <p>Vous êtes administrateurs ? Accéder à votre espace dédié à la communauté cinéphile.</p> 
  <a href="?page=connexionAdmin">Se connecter</a>
</div>
  




