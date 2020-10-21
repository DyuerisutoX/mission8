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

    function control ($codeDuree, $categoProd)
    {
        global $bdd;
        $sql = $bdd -> prepare("SELECT * FROM tarifer WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");

        $sql -> execute(array(
            'codeDureeEnv' => $codeDuree,
            'codeProdEnv' => $categoProd
        ));

        $control = $sql -> fetchall(PDO::FETCH_ASSOC);
        return $control;
    }


    function newTarif ($codeDuree, $categoProd, $prix)
    {
        global $bdd;

        $sql = $bdd -> prepare("INSERT INTO tarifer VALUES(:codeDureeEnv, :codeProdEnv, :prixEnv)");
        //Variables SQL
        $sql -> execute(array(
            'prixEnv' => $prix,
            'codeDureeEnv' => $codeDuree,
            'codeProdEnv' => $categoProd
        ));


    }

    function readTarif ($codeDuree, $categoProd) : array
    {
        global $bdd;
        $sql = $bdd -> prepare("SELECT TA.codeDuree, categoProd, libDuree, prixLocation 
        FROM tarifer AS TA INNER JOIN duree AS DU
        ON TA.codeDuree = DU.codeDuree 
        WHERE TA.codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");

        $sql -> execute(array(
            'codeDureeEnv' => $codeDuree,
            'codeProdEnv' => $categoProd
        ));

        $read = $sql -> fetchall(PDO::FETCH_ASSOC);
        return $read;        

    }

    function updTarif ($codeDuree, $categoProd, $prix)
    {
        global $bdd;

        $sql = $bdd -> prepare("UPDATE tarifer SET prixLocation = :prixEnv WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");
        //Variables SQL
        $sql -> execute(array(
            'prixEnv' => $prix,
            'codeDureeEnv' => $codeDuree,
            'codeProdEnv' => $categoProd
        ));
    }

    function deleteTarif ($codeDuree, $categoProd)
    {
        global $bdd;

        // $sql = $bdd -> prepare("SELECT * 
        // FROM tarifer 
        // WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");

        $sql = $bdd -> prepare("DELETE FROM tarifer WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");

        //Variables SQL
        $sql -> execute(array(
            'codeDureeEnv' => $codeDuree,
            'codeProdEnv' => $categoProd
        ));

        //$resultat = $sql -> fetchall(PDO::FETCH_ASSOC);
    }

?>