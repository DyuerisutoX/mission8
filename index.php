<?php

    session_start();
    
    //Requiert le fichier data
    require "models/data.php";

    //$pg___ : Permet de gérer les paramètres GET pour vérifier si elle contiennent bien des valeurs, si vrai prend comme valeur la fonction isset()

    $pgAction = (isset($_GET['action'])) ? (isset($_GET['action'])) : null;
    $pgErreur = (isset($_GET['error'])) ? (isset($_GET['error'])) : null;
    $pgVue = (isset($_GET['vue'])) ? (isset($_GET['vue'])) : null;
    $pgReq = (isset($_GET['req'])) ? (isset($_GET['req'])) : null;

    //$pp___ : Permet de gérer les paramètres POST pour vérifier si elle contiennent bien des valeurs, si vrai prend comme valeur les $_POST


    $ppCodeDuree = (isset($_POST['codeDuree'])) ? htmlspecialchars($_POST['codeDuree']) : null;
    $ppCategoProd = (isset($_POST['categoProd'])) ? htmlspecialchars($_POST['categoProd']) : null;
    $ppPrix = (isset($_POST['prix'])) ? htmlspecialchars($_POST['prix']) : null;

    $vsEmail = (isset($_SESSION["valEmail"])) ? (isset($_SESSION["valEmail"])) : null;
    $vsPassword = (isset($_SESSION["valPassword"])) ? (isset($_SESSION["valPassword"])) : null;

    //si $pg___ non null, stocke les valeur de $_GET
    $action = ($pgAction) ? $_GET['action'] : null;
    $erreur = ($pgErreur) ? $_GET['error'] : null; 
    $vue = ($pgVue) ? $_GET['vue'] : null;
    $requete = ($pgReq) ? $_GET['req'] : null;

    //Si $action vaut une de ces valeurs, inclus le controlleur adéquate
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

        case "TCrud":
        include "control/cTCrud.php";
        break;

        case "403":
        include "control/cP403.php";
        break;

        case "404":
        include "control/cP404.php";
        break;
    
        default:
        include "control/cAcc.php";
        break;

    }

    //Afficher la vue issue du controleur
    include $view;

?>