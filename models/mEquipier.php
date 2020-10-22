<?php

    /**
     * function getEquipe ()
     * M: Récupère toutes les valeurs de la table 'equipier' dans la BDD 'Surfwave'
     * O: Ø
     * I: @return $listeEqu
     */
    function getEquipe () : array
    {
        global $bdd;
        
        $sql = $bdd -> prepare("SELECT * FROM equipier ORDER BY noRole");

        $sql -> execute();
        
        //Stocke sous la forme d'un tableau
        $listeEqu = $sql -> fetchall(PDO::FETCH_ASSOC);
        return $listeEqu;
    
    }

?>