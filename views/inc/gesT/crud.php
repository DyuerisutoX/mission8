<section id="tarCrud">
    <div class="container">
        <div class="bloc location">
            <h2>Tableau des Tarif</h2>

            <div>
                    <?php
                        echo $requeteSuccess;

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
            
            <div class="row btnCrud">
                <div class="produit col-lg-4 col-md-12">
                    <a href="index.php?action=gestionT&vue=new" class="btn btn-lg crud">Ajouter Tarif</a>
                </div>

                <div class="produit col-lg-4 col-md-12">
                    <a href="index.php?action=gestionT&vue=update" class="btn btn-lg crud">Modifier Tarif</a>
                </div>

                <div class="produit col-lg-4 col-md-12">
                    <a href="index.php?action=gestionT&vue=delete" class="btn btn-lg crud">Supprimer Tarif</a>
                </div>

            </div>     

        </div>
    </div>
</section>
<!-- <section id="tarCrud">
    <div class="container">
        <div class="bloc">
            <h2>Tableau des Tarif</h2>

            <table class="tabCrud">
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
                        // foreach($tabTarif as $tarif)
                        // {
                        //     $code = $tarif['codeDuree'];
                        //     $prixPS = $tarif['PS'];
                        //     $prixBB = $tarif['BB'];
                        //     $prixCO = $tarif['CO'];

                        //     echo "
                        //     <tr>
                        //         <td>$code</td>
                        //         <td>$prixPS €</td>
                        //         <td>$prixBB €</td>
                        //         <td>$prixCO €</td>
                        //     </tr>
                        //     ";
                        // }
                    ?>

                </tbody>

            </table>
            
            <div class="row">
                <div class="produit col-lg-4 col-md-12">
                    <button type="button" class="btn btn-lg crud">Ajouter Tarif</button>
                </div>

                <div class="produit col-lg-4 col-md-12">
                    <button type="button" class="btn btn-lg crud">Modifier Tarif</button>
                </div>

                <div class="produit col-lg-4 col-md-12">
                    <button type="button" class="btn btn-lg crud">Supprimer Tarif</button>
                </div>

            </div>     

        </div>
    </div>
</section> -->