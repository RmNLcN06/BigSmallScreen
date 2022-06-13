<div class="form__wrapper">
  <div class="form-container">
    <div class="form__title">
      <h1>Vous avez une question ?</h1>
      <h3>N'hésitez pas à nous contacter. Nous vous répondrons le plus rapidement possible. .</h3>
    </div>
  
    <div class="form__login">
      <div class="form__img">
        <img src="img/help.png" alt="Trois personnes sur un canapé">
      </div>
      <form class="user-form" action="../../BigSmallScreen/req/_contact.php" method="post">
        <fieldset>  
        <h2>Nous contacter</h2>


        <?php if(isset($mailErr)){echo '<span class="error">' . $mailErr . '</span>';}?>

        <div class="form__wrapper--label">
            <label for="mail"></label>
        </div>
        <div class="form__wrapper--input">
            <input type="email" name="mail" id="mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$" placeholder="Email" >
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
            <label for="msg"></label>
        </div>
        <div class="form__wrapper--input">
            <textarea id="msg" name="msg" rows="20" cols="70" placeholder="Votre message"></textarea>
        </div>
        <?php if(isset($msgErr)){echo '<span class="error">' . $msgErr . '</span>';}?>

          <!-- 
              (?=.*\d) : digitale
              (?=.*[a-z]) : minuscule
              (?=.*[A-Z]) : majuscule
              (?=.*[!@#$%^&_/*]) : caractère spécial
              {8,} : 8 caractères minimum
          -->

          <input class="btn" type="submit" name="connect" value="Envoyer">
        </fieldset> 
      </form>
    </div>
  </div>
</div>


