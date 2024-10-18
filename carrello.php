<?php
session_start(); // Inizializza la sessione

//controllo se utente loggato
if(!isset($_SESSION['statoLogin'])){
    header('Location: login.php');
    exit();
}

// Recupera i prodotti nel carrello
$carrello = isset($_SESSION['carrello']) ? $_SESSION['carrello'] : [];

// Gestisci la richiesta di rimozione del prodotto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rimuovi'])) {
    $codiceDaRimuovere = $_POST['codice'];
    unset($_SESSION['carrello'][$codiceDaRimuovere]); // Rimuove il prodotto dal carrello
    // Se il carrello è vuoto, puoi anche decidere di distruggere la variabile di sessione
    if (empty($_SESSION['carrello'])) {
        unset($_SESSION['carrello']);
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo Carrello</title>
    <link rel="stylesheet" href="carrello.css">
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

    <h1 class="carrello-titolo">Il tuo Carrello</h1>

<?php if (empty($carrello)): ?>
    <p class="carrello-vuoto">Il carrello è vuoto.</p>
<?php else: ?>
    <ul class="carrello-lista">
        <?php foreach ($carrello as $codice => $prodotto): ?>
            <li class="carrello-prodotto">
                <h3 class="prodotto-nome"><?php echo $prodotto['nome']; ?></h3>
                <p class="prodotto-prezzo">Prezzo: €<?php echo number_format($prodotto['prezzo'], 2); ?></p>
                <p class="prodotto-quantita">Quantità: <?php echo $prodotto['quantita']; ?></p>
                <p class="prodotto-totale">Totale: €<?php echo number_format($prodotto['prezzo'] * $prodotto['quantita'], 2); ?></p>
                <form method="POST" action="carrello.php" class="form-rimuovi">
                    <input type="hidden" name="codice" value="<?php echo $codice; ?>">
                    <button type="submit" name="rimuovi" class="pulsante-rimuovi">Rimuovi</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <p class="totale-complessivo"><strong>Totale complessivo:</strong> €<?php
        $totale = 0;
        foreach ($carrello as $prodotto) {
            $totale += $prodotto['prezzo'] * $prodotto['quantita'];
        }
        echo number_format($totale, 2);
    ?></p>

    <a href="checkout.php" class="pulsante-checkout">Procedi al Checkout</a>
<?php endif; ?>

<a href="giochi.php" class="link-torna">Torna al Catalogo</a>

</body>
</html>
