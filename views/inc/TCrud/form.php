<section id="tarCrud">
    <div class="container">
        <div class="bloc location">
            <!-- Change le titre selon valeur de vue -->
            <h2><?php echo $titre ?></h2>

            <div>
                <!-- Message concernant l'état de la requête -->
                <?php
                    echo $etatRequete;
                ?>
            </div>

            <!-- Formulaire du CRUD -->
            <form id="formUpd" action="index.php?action=TCrud&vue=<?php echo $vue ?>" method="POST">
                <label for="codeDuree">Choisissez un code duree: </label>
                <input list="codeDurees" name="codeDuree" id="codeDuree" value="<?php echo $cdRecup; ?>" required>
                <datalist id="codeDurees">
                    <?php
                        //Permet à la liste de selectionner tous les code durées
                        foreach($tabTarif as $tarif)
                        {
                            $code = $tarif['codeDuree'];

                            echo "<option value = \"$code\">";
                        }
                    ?>
                
                </datalist>

                <br><br>

                <label for="categoProd">Choisissez un code produit: </label>
                <input list="categoProds" name="categoProd" id="categoProd" value="<?php echo $ccRecup; ?>" required>
                <datalist id="categoProds">
                    <?php
                        //Permet à la liste de selectionner toutes les categories de produit
                        foreach($tabProd as $listeProd)
                        {
                            $categoProd = $listeProd['categoProd'];

                            echo "<option value = \"$categoProd\">";
                        }
                    ?>
                
                </datalist>

                <br><br>

                <?php
                    //Input de type number apparaissant uniquement pour créer ou modifier un tarif
                    if($vue == "update" || $vue == "new")
                    {
                
                ?>
                        <label for="prix">Saisissez une valeur: </label>
                        <input type="number" id="prix" name="prix" value="<?php echo $prRecup; ?>" required>
        
                        <br><br>
                

                <?php
                    }

                ?>  
                
                <input type="submit">

            <form>

            <br><br>

            <?php
                //Concerne la partie "Lire", permet d'afficher le resultat de la recherche sous forme d'une ligne de tableau
                if($vue == "read"  && (!empty($ppCodeDuree) && !empty($ppCategoProd) && !empty($test)))
                {
                    foreach($liTarif as $reTarif)
                    {
                        $duree = $reTarif['codeDuree'];
                        $categoProd = $reTarif['categoProd'];
                        $libDuree = $reTarif['libDuree'];
                        $prix = $reTarif['prixLocation'] ."€";
    
                        echo "
                        <table>
                            <thead>
                                <tr>
                                    <th>Code Duree</th>
                                    <th>Catego. Prod.</th>
                                    <th>Lib. Duree</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                <tr>
                                    <td>$duree</td>
                                    <td>$categoProd</td>
                                    <td>$libDuree</td>
                                    <td>$prix</td>
                                </tr>
                            </tbody>
                        </table>    
                        ";
                    }
                }
                
            ?>

            <br><br>

            <a href="index.php?action=gestionT" class="btn btn-lg crud">Retour</a>
                    

        </div>
            
    </div>
</section>


