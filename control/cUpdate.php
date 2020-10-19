<?php

    if (!empty($_POST["codeDuree"]) && !empty($_POST['categoProd']) && !empty($_POST['prix']))
    {
        global $bdd;
    
        $_SESSION["codeDureeEnv"] = $_POST['codeDuree'];
        $_SESSION["codeProdEnv"] = $_POST['categoProd'];
    
        $sql = $bdd -> prepare("UPDATE tarifer SET prixLocation = :prixEnv WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");
        //Requetes SQL
        $sql -> execute(array(
            'prixEnv' => $_POST['prix'],
            'codeDureeEnv' => $_POST['codeDuree'],
            'codeProdEnv' => $_POST['categoProd']
        ));
    
        header ("location:index.php?action=gestionT&req=upd&success=ok");
    
    }

    else
    {
        header ("location:index.php?action=gestionT");
    }

    
?>