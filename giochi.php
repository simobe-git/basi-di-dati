<?php

session_start();
// non viene eseguito il controllo sullo stato login poiché un utente 
// può accedere al catalogo in modo anonimo ma per effettuare acquisti 
// dovrà necessariamente identificarsi
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
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="shop.html">Negozio</a></li>
            <li><a href="contact.html">Contatti</a></li>
        </ul>
    </nav>

    <!-- Titolo della pagina -->
    <header class="shop-header">
        <h1>Tutti gli Articoli</h1>
    </header>

    <div class="product-grid">
        <div class="product-item">
            <img src="product1.jpg" alt="Product 1">
            <h3>Nome del Prodotto 1</h3>
            <p>Breve descrizione del prodotto 1.</p>
            <span class="price">€ 49,99</span>
            <a href="#" class="btn-add-to-cart">Aggiungi al carrello</a>
        </div>
        <!-- Aggiungi altri prodotti -->
    </div>
    
</body>
</html>
