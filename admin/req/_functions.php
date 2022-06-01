<?php
// Page regroupant les fonctions utiles dans le site

// Fonction pour rediriger l'utilisateur
function redirection($to){
    // l'URL racine du site http://localhost/BigSmallScreen/
  $rootpath = rootpath(); 
  switch($to)
  {
    case 'accueil':  
        $towards = $rootpath.'?page=accueil'; 
        break;

    case 'connexion': 
        $towards = $rootpath.'?page=connexion'; 
        break;

    case 'admin': 
        $towards = $rootpath.'admin/admin_accueil.php'; 
        break;

    case 'deny' : 
        $towards = $rootpath.'?page=deny'; 
        break;

    default : 
        $towards = $rootpath.'/'; 
  }
  //echo $rootpath.$towards;
  header("Location:$towards");
  exit;
}


// Fonction qui recrée l'URL racine du site
function rootpath(){
  $sheme = $_SERVER['REQUEST_SCHEME'];  // http
  echo $sheme;
  $host = $_SERVER['HTTP_HOST'];  // localhot ou monsite.com
  echo $host;
  // SI en localhost on a un dossier local
  // donc on le déclare vide pour le cas ou nous ne serions pas en local.
  $localdir = []; 
  

  // Test pour savoir si on est en localhost
  if($host == 'localhost'){
    $ruri = explode('/', $_SERVER['REQUEST_URI']);
    // SI c'est le cas on ajoute le dossier local
    $localdir = $ruri[1].'/';
  }
  
  // Reconstruction URL racine du site
  return $sheme.'://'.$host.'/'.$localdir;
}