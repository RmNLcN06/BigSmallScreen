<?php
$sheme = $_SERVER['REQUEST_SCHEME'];  // http
// echo $sheme . '<br>';
$host = $_SERVER['HTTP_HOST'];  // localhot ou monsite.com
// echo $host;
$localdir = [];

if($host == 'localhost'){
    $ruri = explode('/', $_SERVER['REQUEST_URI']);
    // print_r($ruri);
    // SI c'est le cas on ajoute le dossier local
    $localdir = $ruri[1].'/';
    $dir = $ruri[2] . '/';
    $file = $ruri[3];
    // echo $localdir;
  }
  
  // Reconstruction URL racine du site
  echo $sheme.'://'.$host.'/'.$localdir . $dir . $file;
?>

<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./admin_dashboard_user.php?numPages=<?= $currentPage - 1 ?>" class="page-link">Page Précédente</a>
        </li>
        <?php for($i = 1; $i <= $nbrPages; $i++) { ?>
            <li class="page-item <?= ($currentPage == $i) ? "active" : "" ?>">
                <a href="./admin_dashboard_user.php?numPages=<?= $i ?>" class="page-link"><?= $i ?></a>
            </li>
        <?php } ?>
        <li class="page-item <?= ($currentPage == $nbrPages) ? "disabled" : "" ?>">
        <a href="./admin_dashboard_user.php?numPages=<?= $currentPage + 1 ?>" class="page-link">Page Suivante</a>
        </li>
    </ul>
</nav>

