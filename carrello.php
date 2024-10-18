<?php

session_start();
require_once"connessione.php";

//controlla se variabile del login è impostata e se il pulsante pagamento è stato premuto
//in caso una delle due condizioni sia falsa reindirizza l'utente sulla pagina di login
if(isset($_SESSION['statoLogin'])){
    
    $id = $_SESSION['id'];
 
}else{
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il Mio Carrello</title>
    <link rel="stylesheet" href="carrello.css">
</head>
<body>
    <h1>Il Mio Carrello</h1>

</body>
</html>