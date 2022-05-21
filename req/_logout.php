<?php

session_start();
session_unset();
session_destroy();

// Retour vers la page index
header('Location: ../?page=accueil');