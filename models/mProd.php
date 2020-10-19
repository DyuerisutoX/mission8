<?php

    function getProd () : array
    {
        global $bdd;
        
        $sql = $bdd -> prepare("SELECT * FROM catprod");

        $sql -> execute();
        
        //Stocke sous la forme d'un tableau
        $prod = $sql -> fetchall(PDO::FETCH_ASSOC);
    
        return $prod;

    }

?>