<?php

function connectDB() {
    $host = 'localhost';
    $db   = 'artbox';
    $user = 'root';
    $pass = 'password';

    try 
    {
      $mySqlClient = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    } 
    catch (PDOException $e) 
    {
      die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
   
    return $mySqlClient;
}