<?php

    //Variables stockant les identifiants de notre bdd

    $hostname = "localhost";
    $dbname = "surfwave";
    $username = "root";
    $password = "";

    try
    {
        //Connexion à mySQL
        $bdd = New PDO("mysql:host=$hostname;dbname=$dbname;charset=UTF8", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    catch(PDOException $e)
    {
        // Affiche le message d'erreur
        die("Echec de la connexion à la BDD: ......(" .$e->getMessage(). ")");

    }    


?>

