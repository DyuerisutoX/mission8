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
                            $prixPS = ($tarif['PS']) ? $tarif['PS'] ."€" : "- - -";
                            $prixBB = ($tarif['BB']) ? $tarif['BB'] ."€" : "- - -";
                            $prixCO = ($tarif['CO']) ? $tarif['CO'] ."€" : "- - -";

                            echo "
                            <tr>
                                <td>$code</td>
                                <td>$prixPS</td>
                                <td>$prixBB</td>
                                <td>$prixCO</td>
                            </tr>
                            ";
                        }
                    ?>

                </tbody>

            </table>

            <div class="row btnCrud">
    
                <div class="produit col-lg-3 col-md-12">
                    <a href="index.php?action=TCrud&vue=new" class="btn btn-lg crud">Ajouter Tarif</a>
                </div>

                <div class="produit col-lg-3 col-md-12">
                    <a href="index.php?action=TCrud&vue=read" class="btn btn-lg crud">Lire Tarif</a>
                </div>

                <div class="produit col-lg-3 col-md-12">
                    <a href="index.php?action=TCrud&vue=update" class="btn btn-lg crud">Modifier Tarif</a>
                </div>

                <div class="produit col-lg-3 col-md-12">
                    <a href="index.php?action=TCrud&vue=delete" class="btn btn-lg crud">Supprimer Tarif</a>
                </div>

            </div>                 
        </div>
    </div>
</section>
