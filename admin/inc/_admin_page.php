<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <?php if($currentPage > 1) { ?>
            <li class="page-item">
                <a href="./admin_dashboard_user.php&numPages=<?= $currentPage - 1 ?>" class="page-link">Page Précédente</a>
            </li>
        <?php } ?>
        
        <?php for($i = 1; $i <= $nbrPages; $i++) { ?>
        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
        <li class="page-item <?= ($currentPage == $i) ? "active" : "" ?>">
            <a href="./admin_dashboard_user.php&numPages=<?= $i ?>" class="page-link"><?= $i ?></a>
        </li>
        <?php } ?>


        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <?php if($currentPage < $nbrPages) { ?>
        <li class="page-item">
            <a href="./admin_dashboard_user.php&numPages=<?= $currentPage + 1 ?>" class="page-link">Page Suivante</a>
        </li>
        <?php } ?>

        
    </ul>
</nav>