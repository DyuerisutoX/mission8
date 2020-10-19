<!-- Ajout nouvelle section pour le form de co -->
<section>
    <div class="container">
        <form id="formConnex" class="bloc" action="index.php?action=connex" method="POST">
            <label>Entrer votre email:</label><br />

            <input type="email" id="email" name="email" placeholder="exemple@gmail.com" size="25" required><br /><br />

            <label>Mot de passe:</label><br />

            <input type="password" id="pass" name="password" size="25" required><br /><br />

            <input type ="submit" value ="Se connecter"/>
        <form>
    </div>
</section>