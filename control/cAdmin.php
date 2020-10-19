<?php
    //Test si on a une valeur dans action
    if(isset($action))
    {
        //Si action vaut trombi
        if ($action == "admin")
        {

            if (!(isset($_SESSION["valEmail"])) && !(isset($_SESSION["valPassword"])))
            {//Si session n'existe pas direction vers page accueil
                header("location:index.php?action=acc&error=2");
            }

            else
            {
                $view = "views/vAdmin.php";
            }

        }
    }
        
?>