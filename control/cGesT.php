<?php

    
    //Test si on a une valeur dans action
    if(isset($action) && $action == "gestionT")
    {
        if (!(isset($_SESSION["valEmail"])) && !(isset($_SESSION["valPassword"])))
        {//Si session n'existe pas direction vers page 403
            header("location:index.php?action=403");
        }


        require "models/mTarif.php";
        $requeteSuccess = "";
        $tabTarif = getTarif();


        // if(isset($vue) && (($vue == "new") || ($vue == "update") || ($vue == "delete")))
        if(isset($vue) && $vue == "update")
        {
            require "models/mProd.php";
            $tabProd = getProd();
            
        }

        if (isset($_GET['req']) && $_GET['req'] == "upd" && isset($_GET['success']) && $_GET['success'] == "ok")
        {
            $requeteSuccess = "<p class=\"alert alert-success\"> Requete update effectuer sur " .$_SESSION["codeDureeEnv"]. " et " .$_SESSION["codeProdEnv"]. "</p>";

        }

        
        
        $view = "views/vGesT.php";



    }
        
?>