<?php   
    
    if ($vsEmail  && $vsPassword)
    {//Si valeur de la variable SESSION["valEmail"] et SESSION["valPassword"] correspond aux valeur du tableau login
        session_unset();
        session_destroy(); //destroy the session
    
    
        header("location:index.php?action=acc"); //redirection  vers la page accueil
    }
?>