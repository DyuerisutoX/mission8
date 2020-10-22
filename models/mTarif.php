<?php

    /**
     * function getTarif ()
     * M: Récupère toutes les valeurs de la table 'tarifer' dans la BDD 'Surfwave'
     * O: Ø
     * I: @return $resultat
     */

    function getTarif () : array
    {
        global $bdd;
        
        $sql = $bdd -> prepare(
            "SELECT codeDuree, libDuree, (SELECT prixLocation
            FROM tarifer
               WHERE tarifer.categoProd = 'PS' AND tarifer.codeDuree = duree.codeDuree) AS 'PS', 
               (SELECT prixLocation
            FROM tarifer
               WHERE tarifer.categoProd = 'BB' AND tarifer.codeDuree = duree.codeDuree) AS 'BB',
               (SELECT prixLocation
            FROM tarifer
               WHERE tarifer.categoProd = 'CO' AND tarifer.codeDuree = duree.codeDuree) AS 'CO'
                FROM duree
                GROUP BY codeDuree
                ORDER BY 3"
        );

        $sql -> execute();
        
        //Stocke sous la forme d'un tableau
        $resultat = $sql -> fetchall(PDO::FETCH_ASSOC);
    
       return $resultat;

    }

    /**
     * function control ()
     * M: Permet de controler si un tarif existe sur un code durée et une catégorie produit
     * O: @param{string} $codeDuree, @param{string} $categoProd
     * I: @return $control
     */

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


    /**
     * function newTarif ()
     * M: Effectue requete SQL permettant d'insérer un tarif dans la table 'tarifer' de la BDD 'Surfwave'
     * O: @param{string} : $codeDuree, @param{string} : $categoProd, @param{number} : $prix
     * I: Ø
     */

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

    /**
     * function raedTarif ()
     * M: Effectue requete SQL permettant d'e un tarif dans la table 'tarifer' de la BDD 'Surfwave'
     * O: @param{string} : $codeDuree, @param{string} : $categoProd
     * I: @return $control
     */


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

    /**
     * function updTarif ()
     * M: Effectue requete SQL permettant de modifier un tarif dans la table 'tarifer' de la BDD 'Surfwave'
     * O: @param{string} : $codeDuree, @param{string} : $categoProd, @param{number} : $prix
     * I: Ø
     */

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

    /**
     * function deleteTarif ()
     * M: Effectue requete SQL permettant de supprimer un tarif dans la table 'tarifer' de la BDD 'Surfwave'
     * O: @param{string} : $codeDuree, @param{string} : $categoProd
     * I: Ø
     */

    function deleteTarif ($codeDuree, $categoProd)
    {
        global $bdd;

        $sql = $bdd -> prepare("DELETE FROM tarifer WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");

        //Variables SQL
        $sql -> execute(array(
            'codeDureeEnv' => $codeDuree,
            'codeProdEnv' => $categoProd
        ));

    }

?>