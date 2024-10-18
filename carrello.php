<?php
session_start(); // Inizializza la sessione

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
    <link rel="stylesheet" href="giochi.css">
</head>
<body>
    <h1>Il tuo Carrello</h1>

    <?php if (empty($carrello)): ?>
        <p>Il carrello è vuoto.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($carrello as $codice => $prodotto): ?>
                <li>
                    <h3><?php echo $prodotto['nome']; ?></h3>
                    <p>Prezzo: €<?php echo number_format($prodotto['prezzo'], 2); ?></p>
                    <p>Quantità: <?php echo $prodotto['quantita']; ?></p>
                    <p>Totale: €<?php echo number_format($prodotto['prezzo'] * $prodotto['quantita'], 2); ?></p>
                    <form method="POST" action="carrello.php" style="display:inline;">
                        <input type="hidden" name="codice" value="<?php echo $codice; ?>">
                        <button type="submit" name="rimuovi">Rimuovi</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>

        <p><strong>Totale complessivo:</strong> €<?php
            $totale = 0;
            foreach ($carrello as $prodotto) {
                $totale += $prodotto['prezzo'] * $prodotto['quantita'];
            }
            echo number_format($totale, 2);
        ?></p>

        <a href="checkout.php">Procedi al Checkout</a>
    <?php endif; ?>

    <a href="giochi.php">Torna al Catalogo</a>
</body>
</html>
