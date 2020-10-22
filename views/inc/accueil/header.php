<header>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="#"><img src="views/images/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Boutique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cours de surf</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">L'histoire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Recherche" aria-label="Search">
            </form>

            <?php
                //Bouton admin pour se diriger sur la vue vAdmin si on a une session connecté
                if ((isset($_SESSION["valEmail"])) && (isset($_SESSION["valPassword"])))
                {
            ?>   
                    <a id="rediAdm" href="index.php?action=admin"class="btn">Admin</a>
            <?php    
                }
                else
                {  //Bouton connexion si on a une session déconnecté
            ?> 
                    <button id="btnConnex" type="button" class="btn">Connexion</button>
            <?php
                }
            ?>
            

            <!-- Ajout code msg erreur -->
            <div>
                <p id="msgKO">
                    <?php
                        echo $msgErreur;
                    ?>
                </p>
            </div>
            

        </div>
        </div>
    </nav>

</header>