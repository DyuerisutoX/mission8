<?php

    
    //Test si on a une valeur dans action
    if(isset($action) && $action == "gestionT")
    {
        if (!(isset($_SESSION["valEmail"])) && !(isset($_SESSION["valPassword"])))
        {//Si session n'existe pas direction vers page 403
            header("location:index.php?action=403");
        }

        require "models/mTarif.php";
        $tabTarif = getTarif();


        if(isset($vue) && (($vue == "new") || ($vue == "update") || ($vue == "delete")))
        {
            require "models/mProd.php";
            $tabProd = getProd();
            
            $view = "views/vGesT.php";
        }

        
        
        $view = "views/vGesT.php";



    }
        
?>