<?php
session_start();

//se utente ha effettuato il login non gli pemettiamo di accedere alla pagina di registrazione
if(isset($_SESSION['statoLogin'])){
    header('Location: http://localhost/progetto-basi/basi-di-dati/home.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
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

    <div class="login-container">
        <div class="login-form">
            <h2>CREA UN <span class="highlight">ACCOUNT</span></h2>
            <form action="registration-form.php" method="POST">
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Repeat new password" required>
                </div>
                <button type="submit" name="registerBtn" class="cta-button">REGISTRATI</button>
                <p class="signup-link">Hai un account? <a href="login.php">Login</a></p>
            </form>
        </div>
        <div class="login-image">
            <img src="../isset/background-login.jpg" alt="background">
        </div>
    </div>
</body>
</html>