<?php

    //Test si on a une valeur dans action
    if($pgAction && $action == "gestionT")
    {
        if (!$vsEmail && !$vsPassword)
        {//Si session n'existe pas direction vers page 403
            header("location:index.php?action=403");
        }

        $titre = "Tableau des Tarif";

        require "models/mTarif.php";

        //Récupère tableau des tarifs
        $tabTarif = getTarif();

            
        $view = "views/vGesT.php";

    }
        
?>