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

        //Initialisation des messages
        $etatRequete = "";
        $msgErreur ="";
        $liTarif = "";
        $cdRecup = "";
        $ccRecup = "";
        $prRecup = "";

        //On se positionne sur la partie 'créer'
        if($pgVue && $vue == "new")
        {
            $titre = "Créer un Tarif";

            //Au submit du formulaire, si on a envoyer toutes nos données
            if(!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($ppPrix))
            {
                //Controle si on a une valeur
                $test = control($ppCodeDuree,$ppCategoProd);

                //Si aucune valeur ne se trouve dans notre table tarifer 
                if(empty($test))
                {
                    //Efectue la requete
                    newTarif($ppCodeDuree, $ppCategoProd, $ppPrix);
                    $etatRequete = "<p class=\"alert alert-success\"> Requete creer effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";
                }

                else
                {   //Si une valeur se trouve déjà sur le codeDuree et la categoProd sélectionner
                    $etatRequete = "<p class=\"alert alert-danger\">Erreur, tarif déjà présent sur " .$ppCodeDuree." et " .$ppCategoProd. ".</p>";
                }
                
            }

        }

        //Partie 'lire'
        else if ($pgVue && $vue == "read")
        {
            $titre = "Lire un Tarif";

            if(!empty($ppCodeDuree) && !empty($ppCategoProd))
            {
                $test = control ($ppCodeDuree,$ppCategoProd);

                //Si la valeur trouvée existe
                if (!empty($test))
                {
                    $liTarif = readTarif($ppCodeDuree, $ppCategoProd);
                    $etatRequete = "<p class=\"alert alert-success\"> Requete Lire effectuer sur " .$ppCodeDuree. " et " .$ppCategoProd. ".</p>";

                }
                
                else
                {
                    //Sinon, reste sur la vue 'read'
                    $cdRecup = $ppCodeDuree;          $ccRecup = $ppCategoProd;
                    $etatRequete = "<p class=\"alert alert-danger\"> Valeur inexistante dans le tableau</p>";
                }
                

            }
        }

        //Partie 'modifier'
        else if($pgVue && $vue == "update")
        {
            $titre = "Modifier un Tarif";

            if(!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($ppPrix))
            {

                $test = control ($ppCodeDuree,$ppCategoProd);

                //Si il trouve une valeur
                if(!empty($test))
                {
                    //Modifie le tarif
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

        //Partie 'supprimer'
        else if($pgVue && $vue == "delete")
        {
            $titre = "Supprimer un Tarif";

            //Si une valeur existe
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