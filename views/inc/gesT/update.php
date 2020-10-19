<section id="tarCrud">
    <div class="container">
        <div class="bloc location">
            <h2>Modifier un Tarif</h2>

            <form id="formUpd" action="index.php?action=update" method="POST">
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
                            $code = $listeProd['categoProd'];

                            echo "<option value = \"$code\">";
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
