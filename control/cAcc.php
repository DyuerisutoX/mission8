<?php

    //Si notre $_GET['action'] vaut accueil
    if ($pgAction && $action == "acc")
    {
        require "models/mTarif.php";
        require "models/mEquipier.php";

        $tabTarif = getTarif();
        $tabEquipe = getEquipe();
        
        //Si on a un $_GET['erreur']
        if($pgErreur)
        {
            //Cas où la connexion à échoué
            if ($erreur == 1)
            {
                $msgErreur = "Identifiants ou mot de passe incorrects";
                $view = "views/vAcc.php";
            }
            //Cas où la session à expiré
            else if ($erreur == 2)
            {
                $msgErreur = "Session déconnecté ou expiré";
                $view = "views/vAcc.php";
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