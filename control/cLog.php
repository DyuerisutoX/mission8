<?php

    global $bdd;
    require "models/mLogin.php";

    //page de contrôle de login
    // session_start();
    $_SESSION["valEmail"] = $_POST["email"];                //Enregistre la valeur de l'input email dans une variable session
    $_SESSION["valPassword"] = $_POST["password"];          //Enregistre la valeur de l'input password dans une variable session

    $tabLogin = getLogin();

    for ($i = 0; $i < count($tabLogin); $i++)
    {
        if ($_SESSION["valEmail"] == $tabLogin[$i][0])    
        //Si valeur de la variable SESSION["valEmail"] correspond aux valeur du tableau login
        {
            break;
        }


    }

    if ($_SESSION["valEmail"] == $tabLogin[$i][0] && $_SESSION["valPassword"] == $tabLogin[$i][1])
    {//Si valeur de la variable SESSION["valEmail"] et SESSION["valPassword"] correspond aux valeur du tableau login
        header ("location:index.php?action=admin");
    }

    else
    {
        session_unset();
        header ("location:index.php?action=acc&error=1");
    }
?>