<?php
session_start();

// Si l'utilisateur essaie d'aller sur une page 
// protégée par une connexion et qu'il n'est pas authentifié,
// il est redirigé vers la page de connexion
if(!isset($_SESSION['auth'])) 
{
    header('Location: ?page=connexion');
}