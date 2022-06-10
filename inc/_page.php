<nav class="page">
    <ul class="page__list">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <?php if($currentPage > 1) { ?>
            <li class="page__list--item">
                <a href="./?page=<?= $_GET['page']; ?>&numPages=<?= $currentPage - 1 ?>" class="item-link"><i class="fa-solid fa-chevron-left"></i></a>
            </li>
        <?php } ?>
        
        <?php for($i = 1; $i <= $nbrPages; $i++) { ?>
        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
        <li class="page__list--item <?= ($currentPage == $i) ? "active" : "" ?>">
            <a href="./?page=<?= $_GET['page']; ?>&numPages=<?= $i ?>" class="item-link"><?= $i ?></a>
        </li>
        <?php } ?>


        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <?php if($currentPage < $nbrPages) { ?>
        <li class="page__list--item">
            <a href="./?page=<?= $_GET['page']; ?>&numPages=<?= $currentPage + 1 ?>" class="item-link"><i class="fa-solid fa-chevron-right"></i></a>
        </li>
        <?php } ?>
    </ul>
</nav>