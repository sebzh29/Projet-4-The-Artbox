<?php
require 'bdd.php';
$db = connectDB();

$postData = $_POST;

if(empty($postData['titre']) 
  || empty($postData['artiste']) 
  || empty($postData['image']) 
  || strlen($postData['description']) < 3
  || !filter_var($postData['image'], FILTER_VALIDATE_URL))
  {
    // Au moins un des champs est vide
    header('Location: ajouter.php?error=true');    
  }
  else
  {
    $titre = htmlspecialchars($postData['titre']);
    $artiste = htmlspecialchars($postData['artiste']);
    $image = htmlspecialchars($postData['image']);
    $description = htmlspecialchars($postData['description']);
  }

$insert = $db->prepare("INSERT INTO oeuvres (titre, artiste, image, description) VALUES (?, ?, ?, ?)");
$insert->execute([$titre, $artiste, $image, $description]);

header('Location: oeuvre.php?id='.$db->lastInsertId()); 

?>