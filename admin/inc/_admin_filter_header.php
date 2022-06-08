<?php 
// session_start();
$hello = 'Bonjour ' . $_SESSION['firstname'];
?> 

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
        <h1>BSS</h1>
        <h3>Big&SmallScreen</h3>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse row justify-content-end" id="navbarNav">
      <ul class="navbar-nav row justify-content-end align-items-center">
        <li class="nav-item col-2 d-flex justify-content-center">
            <span class="nav-link"><?= $hello; ?></span>
        </li>
        <li class="nav-item col-2 d-flex justify-content-center">
            <a class="nav-link text-dark" aria-current="page" href="../../admin_profil.php">
                <i class="fa-solid fa-user"></i> Mon Profil
            </a>
        </li>
        <li class="nav-item col-2 d-flex justify-content-center">
            <a class="nav-link text-dark" href="../../../req/_logout.php">
                <i class="fa-solid fa-right-from-bracket"></i> Se Déconnecter
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>