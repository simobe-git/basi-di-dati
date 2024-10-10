<?php

// Controllo se utente ha effettuato il login lo reindirizzo alla pagina di home  

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
    <title>Login - Nome del Sito</title>
    <link rel="stylesheet" href="/css/login.css"> <!-- Collega il file CSS -->
</head>
<body>
    <div class="login-container">
        <h2>Accedi al tuo account</h2>
        <form action="#" method="POST" class="login-form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="cta-button">Accedi</button>
            <p class="signup-link">Non hai un account? <a href="register.html">Registrati qui</a></p>
        </form>
    </div>
</body>
</html>