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
        $etatRequete = "";
        $msgErreur ="";
        $liTarif = "";
        $cdRecup = "";
        $ccRecup = "";
        $prRecup = "";

        if($pgVue && $vue == "new")
        {

            $titre = "Créer un Tarif";
            if(!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($ppPrix))
            {
                $test = control($ppCodeDuree,$ppCategoProd);
                if(empty($test))
                {
                    newTarif($ppCodeDuree, $ppCategoProd, $ppPrix);
                    $etatRequete = "<p class=\"alert alert-success\"> Requete creer effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";
                }

                else
                {
                    $etatRequete = "<p class=\"alert alert-danger\">Erreur, tarif déjà présent sur " .$ppCodeDuree." et " .$ppCategoProd. ".</p>";
                }
                
            }

        }

        else if ($pgVue && $vue == "read")
        {
            $titre = "Lire un Tarif";
            if(!empty($ppCodeDuree) && !empty($ppCategoProd))
            {
                $test = control ($ppCodeDuree,$ppCategoProd);

                if (!empty($test))
                {
                    $liTarif = readTarif($ppCodeDuree, $ppCategoProd);
                    $etatRequete = "<p class=\"alert alert-success\"> Requete Lire effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";

                }
                
                else
                {
                    $cdRecup = $ppCodeDuree;          $ccRecup = $ppCategoProd;
                    $etatRequete = "<p class=\"alert alert-danger\"> Valeur inexistante dans le tableau</p>";
                }
                

            }
        }

        else if($pgVue && $vue == "update")
        {
            $titre = "Modifier un Tarif";

            if(!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($ppPrix))
            {

                $test = control ($ppCodeDuree,$ppCategoProd);

                if(!empty($test))
                {
                    updTarif($ppCodeDuree, $ppCategoProd, $ppPrix);

                    $etatRequete = "<p class=\"alert alert-success\"> Requete update effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";
                }

                else
                {
                    $cdRecup = $ppCodeDuree;          $ccRecup = $ppCategoProd;          $prRecup = $ppPrix;
                    $etatRequete = "<p class=\"alert alert-danger\"> Erreur dans la saisie du formulaire. Le code duree, code produit ou le prix sont peut-être erronés.</p>";
                }
                

            }
            
                
        }

        else if($pgVue && $vue == "delete")
        {
            $titre = "Supprimer un Tarif";

            if(!empty($ppCodeDuree) && !empty($ppCategoProd))
            {
                $test = control ($ppCodeDuree,$ppCategoProd);

                if(!empty($test))
                {
                    deleteTarif($ppCodeDuree, $ppCategoProd);

                    $etatRequete = "<p class=\"alert alert-success\"> Requete delete effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";
                }

                else
                {
                    $etatRequete = "<p class=\"alert alert-danger\"> Tarif est déjà inexistant dans le tableau</p>";
                }

            }
        }

        else
        {
            header("location:index.php?action=404");
        }

        $view = "views/vTCrud.php";

    }

    
        
?>