<?php

    session_start();
    require "models/data.php";

    $pgAction = (isset($_GET['action'])) ? (isset($_GET['action'])) : null;
    $pgErreur = (isset($_GET['error'])) ? (isset($_GET['error'])) : null;
    $pgVue = (isset($_GET['vue'])) ? (isset($_GET['vue'])) : null;

    $ppCodeDuree = (isset($_POST['codeDuree'])) ? htmlspecialchars($_POST['codeDuree']) : null;
    $ppCategoProd = (isset($_POST['categoProd'])) ? htmlspecialchars($_POST['categoProd']) : null;
    $ppPrix = (isset($_POST['prix'])) ? htmlspecialchars($_POST['prix']) : null;

    $pgReq = (isset($_GET['req'])) ? (isset($_GET['req'])) : null;

    $vsEmail = (isset($_SESSION["valEmail"])) ? (isset($_SESSION["valEmail"])) : null;
    $vsPassword = (isset($_SESSION["valPassword"])) ? (isset($_SESSION["valPassword"])) : null;

    $action = ($pgAction) ? $_GET['action'] : null;
    $erreur = ($pgErreur) ? $_GET['error'] : null;  //Verifie et stocke la valeur de "erreur"
    $vue = ($pgVue) ? $_GET['vue'] : null;
    $requete = ($pgReq) ? $_GET['req'] : null;

    //$_SESSION['msgReq'] = "";
    // $success = ($pgSucc) ? $_GET['success'] : null;
    

    // echo "Valeur de \$action.....(" .$action. ")";
    // echo "Valeur de \$erreur.....(" .$erreur. ")";
    // echo "Valeur de \$_SESSION[\"valEmail\"].....(" . $_SESSION["valEmail"]. ")";
    // echo "Valeur de \$_SESSION[\"valPassword\"].....(" . $_SESSION["valPassword"]. ")";

    // echo "Valeur de \$ppCodeDuree.....(" .$ppCodeDuree. ")<br>";
    // echo "Valeur de \$ppCategoProd.....(" .$ppCategoProd. ")<br>";
    // echo "Valeur de \$ppPrix.....(" .$ppPrix. ")<br><br>";


   

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