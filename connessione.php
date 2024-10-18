<?php 

// file per connettersi, non viene specificato il databe per capire  
// se deve essere implementato anche un file install.php se non dovesse essere utilizzato
// aggiungere variabile db in connessione.php e dati-connessione.php


require_once("dati-connessione.php");   

$connessione = mysqli_connect($hostname,$user,$password,$db);

if(mysqli_connect_errno()){

    printf("Errore di connessione: %s\n",mysqli_connect_error());
    exit();
}

?>