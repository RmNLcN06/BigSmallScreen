<?php
    $host = "localhost";
    $port = "3306";
    $dbname = "bdd_bigsmallscreen";
    $user = "root";
    $password= "";

    // Définition du DSN (Data Source Name) de connexion
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    try
    {
        // Connexion à la base de données en instanciant PDO
        $bdd = new PDO($dsn, $user, $password);

        // Définition de la méthode de récupération des données (fetch)
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Définition du charset à "UTF8"
        $bdd->exec('SET NAMES "UTF8"');
    }
    catch(PDOException $e)
    {
        // Avec PDOException, récupération des erreurs provoquées lors de problème de connexion
        die('Erreur: ' . $e->getMessage());
    }
?>