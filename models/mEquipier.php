<?php

    function getEquipe () : array
    {
        global $bdd;
        
        $sql = $bdd -> prepare("SELECT surnomEq, fonctionEq FROM equipier");

        $sql -> execute();
        
        //Stocke sous la forme d'un tableau
        $listeEqu = $sql -> fetchall(PDO::FETCH_ASSOC);
        return $listeEqu;
    
    }

?>