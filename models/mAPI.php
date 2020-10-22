<?php

    header('Content-Type: application/json');

    require 'data.php';

    global $bdd;


        $requete = $bdd -> prepare("SELECT QD.codeEq, EQ.nomEq, EQ.surnomEq, QD.idQuest, QU.libQuest, QD.reponse
        FROM (qdp AS QD  INNER JOIN equipier AS EQ 
            ON QD.codeEq = EQ.codeEq)
        INNER JOIN question AS QU ON QD.idQuest = QU.idQuest");


    $requete->execute();
    
    $resultats = $requete -> fetchall(PDO::FETCH_ASSOC);

    $retour["success"] = true;
    $retour["message"] = "Voici l'équipe";
    $retour["results"]["nb"] = count($resultats);
    $retour["results"]["membre"] = $resultats;

    echo json_encode($retour);

?>