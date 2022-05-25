<div class="form__wrapper">
  <form action="../../BigSmallScreen/req/_login.php" method="post">
    <fieldset>  
        <legend>
            Une question en rapport avec l'utilisation de notre site ou sur un autre sujet ?
        </legend>
        <legend>
            N'hésitez pas à nous contacter. Nous vous répondrons le plus rapidement possible.
        </legend>

        <?php if(isset($mailErr)){echo '<span class="error">' . $mailErr . '</span>';}?>

        <div class="form__wrapper--label">
            <label for="mail">Votre e-mail: </label>
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
            <label for="msg">Votre message: </label>
        </div>
        <div class="form__wrapper--input">
            <textarea id="msg" name="msg" rows="8" cols="70"></textarea>
        </div>
        <?php if(isset($msgErr)){echo '<span class="error">' . $msgErr . '</span>';}?>
      <!-- 
          (?=.*\d) : digitale
          (?=.*[a-z]) : minuscule
          (?=.*[A-Z]) : majuscule
          (?=.*[!@#$%^&_/*]) : caractère spécial
          {8,} : 8 caractères minimum
      -->
      <button type="submit" name="submit">Envoyer</button>
    </fieldset>
  </form>
</div>
