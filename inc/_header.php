<?php 
session_start();
?> 

<div class="header__title">
    <div class="header__title--logo">
        <a href="?page=accueil">
            <img src="img/logo/logo.svg" alt="Logo du site">
            <h3> Big&Small Screen</h3>
        </a>
    </div>
    <ul class="header__title--links">
        <!-- 
            Pour version(s) futures :    
            <li>
                <a href="?page=premium">
                    <i class="fa-solid fa-user-check"></i> Devenir Premium
                </a>  
            </li> 
        -->
        <?php if(isset($_SESSION['authUser'])) { ?>
            <li>Bonjour <?= $_SESSION['nickname'] ?></li>
            <li>
                <a href="?page=profil">
                    <i class="fa-solid fa-user"></i> Mon Profil
                </a>
            </li>
            <li>
                <a href="req/_logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i> Se Déconnecter
                </a>
            </li>
        <?php } else { ?>
            <li>
                <a href="?page=connexion">
                    <i class="fa-solid fa-right-to-bracket"></i> Se Connecter
                </a>
            </li>
            <li>
                <a href="?page=inscription">
                    <i class="fa-solid fa-user-plus"></i> Inscription
                </a>
            </li>
        <?php } ?>
    </ul>
</div>