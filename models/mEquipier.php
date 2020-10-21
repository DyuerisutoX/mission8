<?php

    function getEquipe () : array
    {
        global $bdd;
        
        $sql = $bdd -> prepare("SELECT * FROM equipier ORDER BY noRole");

        $sql -> execute();
        
        //Stocke sous la forme d'un tableau
        $listeEqu = $sql -> fetchall(PDO::FETCH_ASSOC);
        return $listeEqu;
    
    }

    // function getEquipeAPI ()
    // {
    //     global $bdd;
    //     header('Content-Type: application/json');
    //     $stmt = $bdd -> prepare("SELECT * FROM equipier");

    //     $stmt -> execute();

    //     $result = $stmt -> fetchall(PDO::FETCH_ASSOC);
    //     return $result;
    // }

?>