<?php
    //Verifie la valeur de "action"
    if (isset($_GET['action']))
    {
        //Stocke la valeur de $_GET['action'] dans une var
        $action = $_GET['action'];

        //Verifie la valeur de "erreur"
        if (isset($_GET['error']))
        {
            //Stocke la valeur de $_GET['error'] dans une var
            $erreur = $_GET['error'];
        }

    }

    //Si $action vaut une de ces valeurs, charger le controlleur adéquate
    switch ($action)
    {
        case "acc":
        include "control/cAcc.php";
        break;
    
        default:
        include "control/cAcc.php";
        break;

    }

    //Afficher la vue issue du controleur
    include $view;



?>