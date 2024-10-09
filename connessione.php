<?php
require_once("dati-connessione");

$connessione = new mysqli($hostname, $username, $password);

if(mysqli_connect_errno()){
    
    printf("Errore di connessione: %s\n",mysqli_connect_error($connessione));
    exit();
}
?>