<?php
session_start();

require_once"connessione.php";

//controlla se il pulsante è stato premuto e controllo utilizzo metodo post 
if(isset($_POST['login']) && $_SERVER["REQUEST_METHOD"] === "POST"){ 

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_utente = "SELECT email,nome,password FROM utenti WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connessione,$query_utente);

    if(mysqli_num_rows($result)===1){

        //se dovesse servire qui va aggiunta associazione della riga ottenuta dalla query
        //con un array che conterrà gli elemeti della riga

        $_SESSION['statoLogin'] = true;
        header('Location: home.php');
        exit();
    }
}else{
    echo"Errore";
}

?>