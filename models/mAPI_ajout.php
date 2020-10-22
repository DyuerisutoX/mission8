<?php

        header('Content-Type: application/json');

        require 'data.php';

        global $bdd;

        /*Requete pour ajouter*/
        if(!empty($_POST["codeEq"]) && !empty($_POST["idQuest"]) && !empty($_POST['reponse']) )
        {
            if( intval($_POST['idQuest']) > 0 && $_POST["idQuest"] == 1 || 2 || 3 || 4 || 5)
            {
                $requete = $bdd -> prepare("INSERT INTO qdp VALUES (:codeEq, :noQuest, :reponse)");
                $requete -> execute(array(
                    'codeEq' => $_POST["codeEq"],
                    'noQuest' => $_POST["idQuest"],
                    'reponse' => $_POST['reponse']

                ));

                $retour["success"] = true;
                $retour["message"] = "La réponse a bien été ajouté";
                $retour["result"] = array();

            }

            else
            {
                $retour["success"] = false;
                $retour["message"] = "Le n° de question n'existe pas";
            }


        }

        else
        {
            $retour["success"] = false;
            $retour["message"] = "Erreur, il manque des infos";

        }

        echo json_encode($retour);
?>