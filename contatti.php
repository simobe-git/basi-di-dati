<?php

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di Contatto</title>
    <link rel="stylesheet" href="contatti.css">
</head>
<body>

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

    <div class="contact-page">
        <!-- Sezione a sinistra -->
        <div class="left-section">

            <div class="content">
                <h2>Tutto quello che cerchi</h2>
                <p>Il nostro catalogo pu&oacute; soddifare qualsiasi esigenza</p>
                <a href="giochi.php" class="learn-more-btn">VAI AL CATALOGO</a>
            </div>
        </div>

        
       <!-- Sezione di contatto a destra -->
       <div class="right-section">
            <div class="contact-info">
                <h2>Contact Us</h2>
                <p>In caso di problemi non esitare a contattarci:</p>
                <ul>
                    <li><strong>Indirizzo:</strong> Via Roma, 123, 00100 Roma, Italia</li>
                    <li><strong>Email:</strong> info@vibrant.com</li>
                    <li><strong>Telefono:</strong> +39 06 12345678</li>
                    <li><strong>Orari di apertura:</strong> Lun - Ven: 9:00 - 18:00</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
