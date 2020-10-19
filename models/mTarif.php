<?php

    function getTarif () : array
    {
        global $bdd;
        
        $sql = $bdd -> prepare(
            "SELECT DU.codeDuree, libDuree, MAX(IF (TA.categoProd = 'PS', prixLocation, null)) AS 'PS', MAX(IF (TA.categoProd = 'BB', prixLocation, null)) AS 'BB', 
            MAX(IF (TA.categoProd = 'CO', prixLocation, null)) AS 'CO'
                FROM duree AS DU INNER JOIN tarifer AS TA
                ON DU.codeDuree = TA.codeDuree
            GROUP BY DU.codeDuree ORDER BY 3"
        );

        $sql -> execute();
        
        //Stocke sous la forme d'un tableau
        $resultat = $sql -> fetchall(PDO::FETCH_ASSOC);
    
       return $resultat;

    }

?>