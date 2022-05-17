<?php

class connexionBDD 
{
    protected function connect()
    {
        try
        {
        $host = 'localhost';
        $port = '3306';
        $database = 'login';
        $username = 'root';
        $password = '';
        $bdd = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $username, $password);
        return $bdd;
        }
        catch(PDOException $e)
        {
            die('Erreur: ' . $e->getMessage());
        }
    }
}