<?php
    try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=db_randonnee', 'root', '');}
    catch (PDOException $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
    
?>