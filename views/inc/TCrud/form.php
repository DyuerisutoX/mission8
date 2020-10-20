<section id="tarCrud">
    <div class="container">
        <div class="bloc location">
            <h2><?php echo $titre ?></h2>

            <div>
                    <?php
                        
                        echo $requeteSuccess;

                    ?>
            </div>

            <form id="formUpd" action="index.php?action=TCrud&vue=<?php echo $vue ?>" method="POST">
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

                <?php

                    if($vue == "update" || $vue == "new")
                    {
                
                ?>
                        <label for="prix">Saisissez une valeur: </label>
                        <input type="number" id="prix" name="prix">
        
                        <br><br>
        
                        <input type="submit">

                <?php
                    }

                    else
                    {
                ?>  

                        <input type="submit" value="Supprimer">
                        <br><br>

                        
                
                <?php
                    }
                    
                ?>
                

            <form>

            <br><br>
            <a href="index.php?action=gestionT" class="btn btn-lg crud">Retour</a>


        </div>
            
    </div>
</section>


