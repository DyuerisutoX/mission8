<?php

    session_start();
    require "models/data.php";


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

        //Verifie la valeur de "vue"
        if (isset($_GET['vue']))
        {
            //Stocke la valeur de $_GET['error'] dans une var
            $vue = $_GET['vue'];
        }

    }

    // echo "Valeur de \$action.....(" .$action. ")";
    // echo "Valeur de \$erreur.....(" .$erreur. ")";
    // echo "Valeur de \$_SESSION[\"valEmail\"].....(" . $_SESSION["valEmail"]. ")";
    // echo "Valeur de \$_SESSION[\"valPassword\"].....(" . $_SESSION["valPassword"]. ")";

   

    //Si $action vaut une de ces valeurs, charger le controlleur adéquate
    switch ($action)
    {
        case "acc":
        include "control/cAcc.php";
        break;

        case "connex":
        include "control/cLog.php";
        break;

        case "deconn":
        include "control/cDeco.php";
        break;

        case "admin";
        include "control/cAdmin.php";
        break;

        case "gestionT":
        include "control/cGesT.php";
        break;

        case "update":
        include "control/cUpdate.php";
        break;
    
        default:
        include "control/cAcc.php";
        break;

    }

    //Afficher la vue issue du controleur
    include $view;




?>