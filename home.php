
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negozio di Videogiochi</title>
    <link rel="stylesheet" href="home.css">
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

    <section class="hero-section">
      <div class="hero-content">
          <h1>Benvenuti su GameShop</h1>
          <p>Il miglior negozio di videogiochi online</p>
          <a href="#" class="cta-button">Scopri di più</a>
      </div>
      <img src="../isset/banner-image.jpg" alt="Immagine di Videogioco" class="additional-image">
    </section>

    <section class="featured-games">
      <h2>Top 3 Videogiochi pi&uacute; venduti</h2>
      <div class="games-grid">
          <div class="game-card">
              <img src="../isset/game-image/dragonball.jpg" alt="Gioco 1">
              <h3>Gioco 1</h3>
              <p>Descrizione breve del gioco 1.</p>
              <a href="#" class="cta-button">Acquista ora</a>
          </div>
          <div class="game-card">
            <img src="../isset/game-image/fc25.jpg" alt="Gioco 1">
            <h3>Gioco 1</h3>
            <p>Descrizione breve del gioco 2.</p>
            <a href="#" class="cta-button">Acquista ora</a>
        </div>
        <div class="game-card">
          <img src="../isset/game-image/headerthrone.jpg" alt="Gioco 1">
          <h3>Gioco 1</h3>
          <p>Descrizione breve del gioco 3.</p>
          <a href="#" class="cta-button">Acquista ora</a>
      </div>
      </div>
  </section>
  
  
  <footer class="footer">
      <div class="footer-content">
          <div class="footer-section">
              <h4>Contattaci</h4>
              <p>Email: info@gameshop.com</p>
              <p>Telefono: +39 123 456 789</p>
          </div>
          <div class="footer-section">
              <h4>Seguici</h4>
              <p>
                  <a href="#">Facebook</a> | 
                  <a href="#">Twitter</a> | 
                  <a href="#">Instagram</a>
              </p>
          </div>
          <div class="footer-section">
              <h4>Copyright</h4>
              <p>&copy; 2024 GameShop. Tutti i diritti riservati.</p>
          </div>
      </div>
  </footer>
  
    <script>
        // Script per il menu mobile
        const hamburgerMenu = document.querySelector('.hamburger-menu');
        const navLinks = document.querySelector('.nav-links');

        hamburgerMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>
