<?php

    //Si notre $_GET['action'] vaut accueil
    if (isset($action) && $action == "acc")
    {
        //Si on a un $_GET['erreur']
        if(isset($erreur))
        {
            //Cas où la connexion à échoué
            if ($action == "accueil" && $erreur == 1)
            {
                $msgErreur = "Identifiants ou mot de passe incorrects";
                $view = "vues/vAccueil.php";
            }
            //Cas où la session à expiré
            else if ($action == "accueil" && $erreur == 2)
            {
                $msgErreur = "Session déconnecté ou expiré";
                $view = "vues/vAccueil.php";
            }

            else
            {
                header("location:index.php?action=acc");
            }

        
        }

        //Affiche le contenu de accueil dans le fichier index
        else
        {
            $msgErreur = "";
            $view = "views/vAcc.php";

        }

    }

    //Si la saisie de action est accueil ou bien une autre valeur quelquonque, la page se redirige vers accueil
    else
    {
        header("location:index.php?action=acc");
    }
        
?>