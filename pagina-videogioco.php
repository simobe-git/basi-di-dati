<?php

session_start();
require_once("connessione.php");

//Si controlla se l'utente ha effettuato il login solo quando preme sul pulsante per acquistare  

$id = $_GET['id'];
echo $id;

//ricerca videogioco con codice passato dalla pagina giochi.php
$sql = "SELECT * FROM videogiochi WHERE codice=$id";
$result = mysqli_query($connessione,$sql);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutti gli Articoli del Negozio</title>
    <link rel="stylesheet" href="giochi.css">
</head>
<body>
    <!-- Barra di navigazione -->
    <nav class="navbar">
        <div class="logo">
            <a href="#">GameShop</a>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="giochi.php">Giochi</a></li>
            <li><a href="offerte.php">Offerte</a></li>
            <?php if(isset($_SESSION['statoLogin'])) : ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            <li><a href="contatti.php">Contatti</a></li>
        </ul>
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    
    <!-- Titolo della pagina -->
    <header class="shop-header">
        <h1>Tutti gli Articoli</h1>
    </header>

    <div class="product-grid">
        
        <?php
            //controlla se query precedente restituisce un risultato
            if(mysqli_num_rows($result) == 1){

                echo'PROVA';
            }else{
                echo '<p>Nessun prodotto trovato</p>';
            }
        ?>
    </div>
    
</body>
</html>