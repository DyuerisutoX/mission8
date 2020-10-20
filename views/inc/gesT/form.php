<section id="tarCrud">
    <div class="container">
        <div class="bloc location">
            <h2><?php echo $titre ?></h2>

            <div>
                    <?php
                        
                        //echo $requeteSuccess;

                    ?>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Code Duree</th>
                        <th>PS</th>
                        <th>BB</th>
                        <th>CO</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        //Affiche le tableau tarif
                        foreach($tabTarif as $tarif)
                        {
                            $code = $tarif['codeDuree'];
                            $prixPS = $tarif['PS'];
                            $prixBB = $tarif['BB'];
                            $prixCO = $tarif['CO'];

                            echo "
                            <tr>
                                <td>$code</td>
                                <td>$prixPS €</td>
                                <td>$prixBB €</td>
                                <td>$prixCO €</td>
                            </tr>
                            ";
                        }
                    ?>

                </tbody>

            </table>

            <form id="formUpd" action="index.php?action=gestionT&req=update" method="POST">
                <label for="codeDuree">Choisissez un code duree: </label>
                <input list="codeDurees" name="codeDuree" id="codeDuree">
                <datalist id="codeDurees">
                    <?php
                        foreach($tabTarif as $tarif)
                        {
                            $code = $tarif['codeDuree'];

                            echo "<option value = \"$code\">";
                        }
                    ?>
                
                </datalist>

                <br><br>

                <label for="categoProd">Choisissez un code produit: </label>
                <input list="categoProds" name="categoProd" id="categoProd">
                <datalist id="categoProds">
                    <?php
                        foreach($tabProd as $listeProd)
                        {
                            $categoProd = $listeProd['categoProd'];

                            echo "<option value = \"$categoProd\">";
                        }
                    ?>
                
                </datalist>

                <br><br>

                <label for="prix">Saisissez la nouvelle valeur: </label>
                <input type="number" id="prix" name="prix">

                <br><br>

                <input type="submit">

            <form>


        </div>
            
    </div>
</section>


