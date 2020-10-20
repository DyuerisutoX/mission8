<?php

    //Test si on a une valeur dans action
    if($pgAction && $action == "TCrud")
    {
        if (!$vsEmail && !$vsPassword)
        {//Si session n'existe pas direction vers page 403
            header("location:index.php?action=403");
        }

        require "models/mTarif.php";
        require "models/mProd.php";
        global $bdd;
        $tabTarif = getTarif();
        $tabProd = getProd();
        $requeteSuccess = "";

        if($pgVue && $vue == "new")
        {

            $titre = "Créer un Tarif";
            if(!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($ppPrix))
            {
                
                $sql = $bdd -> prepare("INSERT INTO tarifer VALUES(:codeDureeEnv, :codeProdEnv, :prixEnv)");
                //Variables SQL
                $sql -> execute(array(
                    'prixEnv' => $ppPrix,
                    'codeDureeEnv' => $ppCodeDuree,
                    'codeProdEnv' => $ppCategoProd
                ));
    
                
                $requeteSuccess = "<p class=\"alert alert-success\"> Requete creer effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";
    
            }

        }

        // if(isset($vue) && (($vue == "new") || ($vue == "update") || ($vue == "delete")))
        else if($pgVue && $vue == "update")
        {
            $titre = "Modifier un Tarif";

            if(!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($ppPrix))
            {
                        
                $sql = $bdd -> prepare("UPDATE tarifer SET prixLocation = :prixEnv WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");
                //Variables SQL
                $sql -> execute(array(
                    'prixEnv' => $ppPrix,
                    'codeDureeEnv' => $ppCodeDuree,
                    'codeProdEnv' => $ppCategoProd
                ));

                
                $requeteSuccess = "<p class=\"alert alert-success\"> Requete update effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";

            }
            
                
        }

        else if($pgVue && $vue == "delete")
        {
            $titre = "Supprimer un Tarif";
            //if(!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($ppPrix))
            if(!empty($ppCodeDuree) && !empty($ppCategoProd))
            {
                        
                // $sql = $bdd -> prepare("SELECT * 
                // FROM tarifer 
                // WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");

                $sql = $bdd -> prepare("DELETE FROM tarifer WHERE codeDuree = :codeDureeEnv AND categoProd = :codeProdEnv");

                //Requetes SQL
                $sql -> execute(array(
                    'codeDureeEnv' => $ppCodeDuree,
                    'codeProdEnv' => $ppCategoProd
                ));

                //$resultat = $sql -> fetchall(PDO::FETCH_ASSOC);

                $requeteSuccess = "<p class=\"alert alert-success\"> Requete delete effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";
                

            }
        }

        else
        {
            header("location:index.php?action=404");
        }

        $view = "views/vTCrud.php";

    }

    
        
?>