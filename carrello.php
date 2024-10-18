<?php

session_start();
require_once"connessione.php";

//controlla se variabile del login è impostata in caso sia falsa reindirizza l'utente sulla pagina di login
 
if(!isset($_SESSION['statoLogin'])){
    
    $id = $_SESSION['id'];
    header('Location: login.php');
    exit();
}

?>
