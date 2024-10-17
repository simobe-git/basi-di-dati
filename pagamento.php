<?php

session_start();
require_once"connessione.php";

//controlla se variabile del login è impostata e se il pulsante pagamento è stato premuto
//in caso una delle due condizioni sia falsa reindirizza l'utente sulla pagina di login
if(isset($_SESSION['statoLogin']) && isset($_POST['pagamento'])){
    
    
    
}else{
    header('Location: http://localhost/progetto-basi/basi-di-dati/login.php');
    exit();
}
?>