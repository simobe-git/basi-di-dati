<?php

session_start();
require_once("connessione.php");

//Si controlla se l'utente ha effettuato il login solo quando preme sul pulsante per acquistare  

$id = $_POST['codice'];
//echo $id;

//ricerca videogioco con codice passato dalla pagina giochi.php
$sql = "SELECT * FROM videogiochi WHERE codice=$id";
$result = mysqli_query($connessione,$sql);

if(mysqli_num_rows($result) == 1){

    $row = mysqli_fetch_assoc($result);
}else{
    echo '<p>Nessun prodotto trovato</p>'. mysqli_error($connessione,$result);
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($row['nome']) ?></title>
    <link rel="stylesheet" href="dettagli.css">
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
    
<!-- Dettagli del Prodotto -->
    <div class="product-details">
        <h1><?php echo $row['nome']; ?></h1>
        <div class="product-content">
            <div class="product-image">
                <img src="<?php echo $row['immagine'] ?>">
            </div>
            <div class="product-info">
                <form method="POST" action="aggiungi-carrello.php">
                    <input type="hidden" name="gioco" value="<?php echo $row['nome']; ?>">
                    <input type="hidden" name="prezzo" value="<?php echo $row['prezzo_attuale']; ?>">

                    <p><strong>Lingua originale:</strong> <?php echo $row['lingua_originale'] ?></p>
                    <p><strong>Studio:</strong> <?php echo $row['nome_studio']; ?></p>
                    <p><strong>Editore:</strong> <?php echo $row['nome_editore'] ?></p>
                    <p><strong>Genere:</strong> <?php echo $row['genere'] ?></p>
                    <p><strong>Data rilascio:</strong> <?php echo $row['data_rilascio'] ?></p>
                    <p><strong>Pegi:</strong> <?php echo $row['id_pegi'] ?></p>
                    
                    <button type="submit"name="codice" value="<?php echo $row['codice']?>">Acquista</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>