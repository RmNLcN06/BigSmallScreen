<?php
session_start();
require('../admin/req/_functions.php');

// Si l'utilisateur essaie d'aller sur une page 
// protégée par une connexion et qu'il n'est pas authentifié,
// il est redirigé vers la page de connexion
if(!isset($_SESSION['authAdmin']) && empty($_SESSION['authAdmin'])) 
{
    redirection('deny'); // interdit l'accès à la page
}