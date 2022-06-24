<?php
require ('req/_signup.php');
?>

<div class="form__wrapper">
  <div class="form-container">
  <div class="form__title">
        <h1>Nouvel Utilisateur</h1>
        <h3>Veuillez remplir le formulaire d'inscription ci-dessous</h3>
      </div>
    <form method="post" class="form__signin">
      
        <fieldset>
        <h2>Inscription</h2>

        <?php if(isset($msgErr)){echo '<span class="error">' . $msgErr . '</span>';}?>

        <div class="form__wrapper--label">
          <label for="nickname"></label>
        </div>
        <div class="form__wrapper--input">
          <input type="text" name="nickname" id="nickname" placeholder="Nom d'utilisateur" >
        </div>
        <?php if(isset($nicknameMsgErr)){echo '<span class="error">' . $nicknameMsgErr . '</span>';}?>
      
        <div class="form__identity">
          <div class="form__lastname">
            <div class="form__wrapper--label">
              <label for="lastname"></label>
            </div>
            <div class="form__wrapper--input">
              <input type="text" name="lastname" id="lastname" placeholder="Prénom" >
            </div>
            <?php if(isset($lastnameMsgErr)){echo '<span class="error">' . $lastnameMsgErr . '</span>';}?>
          </div>
          
          <div class="form__firstname">
            <div class="form__wrapper--label">
              <label for="firstname"></label>
            </div>
            <div class="form__wrapper--input">
              <input type="text" name="firstname" id="firstname" placeholder="Nom" >
            </div>
            <?php if(isset($firstnameMsgErr)){echo '<span class="error">' . $firstnameMsgErr . '</span>';}?>
          </div>
        </div>

        <div class="form__wrapper--label">
          <label for="mail"></label>
        </div>
        <div class="form__wrapper--input">
          <input type="email" name="mail" id="mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$" placeholder="Adresse email">
        </div>
        <?php if(isset($mailMsgErr)){echo '<span class="error">' . $mailMsgErr . '</span>';}?>

        <div class="form__wrapper--label">
          <label for="pwd"></label>
        </div>
        <div class="form__wrapper--input">
          <input type="password" id="pwd" name="pwd" title="Doit contenir au minimum un nombre, une lettre minuscule, une lettre majuscule, un caractère spécial et au moins 8 caractères ou plus" placeholder="Mot de passe">
        </div>
        <?php if(isset($pwdMsgErr)){echo '<span class="error">' . $pwdMsgErr . '</span>';}?>

        <div class="form__wrapper--label">
          <label for="pwdVerify"></label>
        </div>
        <div class="form__wrapper--input">
          <input type="password" id="pwdVerify" name="pwdVerify" title="Doit contenir au minimum un nombre, une lettre minuscule, une lettre majuscule, un caractère spécial et au moins 8 caractères ou plus" placeholder="Confirmer mot de passe">
        </div>
        <?php if(isset($pwdVerifyErr)){echo '<span class="error">' . $pwdVerifyErr . '</span>';}?>


        <div class="pwd-message">
          <p id="letter" class="invalid">Une lettre minuscule</p>
          <p id="capital" class="invalid">Une lettre majuscule</p>
          <p id="number" class="invalid">Un nombre</p>
          <p id="special" class="invalid">Un caractère spécial</p>
          <p id="length" class="invalid">8 caractères minimum</p>
        </div>

        <input class="btn" type="submit" name="submit" value="S'inscrire">
      </fieldset>
    </form>
  </div>
</div>

<div class="form__wrapper--action">
  <p>Vous avez déjà un compte ?</p>
  <a href="?page=connexion">Se connecter</a>
</div>