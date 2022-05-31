<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./?page=critiques&pages=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($pages = 1; $pages <= $nbrPages; $pages++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $pages) ? "active" : "" ?>">
                <a href="./?page=critiques&pages=<?= $pages ?>" class="page-link"><?= $pages ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $nbrPages) ? "disabled" : "" ?>">
            <a href="./?page=critiques&pages=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>