<?php 
session_start();
?> 

<div class="header__title">
    <div class="header__title--logo">
        <a href="?page=accueil">
            <h1>BSS</h1>
            <h3>Big&SmallScreen</h3>
        </a>
    </div>
    <ul class="header__title--links">
        <li>
            <a href="?page=premium">
                <i class="fa-solid fa-user-check"></i> Devenir Premium
            </a>  
        </li>
        <?php if(($_SESSION)) { ?>
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
        <?php } ?>
        <li>
            <a href="?page=inscription">
                <i class="fa-solid fa-user-plus"></i> Inscription
            </a>
        </li>
    </ul>
</div>