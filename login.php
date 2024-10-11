<?php

// Controllo se utente ha effettuato il login se si  lo reindirizzo alla pagina di home  
session_start();
if(isset($_SESSION['statoLogin'])){
    header('Location: home.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <nav class="navbar">
        <div class="logo">
            <a href="#">GameShop</a>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Giochi</a></li>
            <li><a href="#">Offerte</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="#">Contatti</a></li>
        </ul>
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <div class="login-container">
        <div class="login-form">
            <h2>SIGN <span class="highlight">IN</span></h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username or Email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group check-forgot">
                    <label><input type="checkbox"> Stay signed in</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="cta-button">SIGN IN</button>
                <p class="signup-link">Not a member? <a href="#">Sign Up</a></p>
            </form>
        </div>
        <div class="login-image">
            <img src="../isset/background-login.jpg" alt="background">
        </div>
    </div>
</body>
</html>
