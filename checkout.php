<?php
session_start(); // Inizializza la sessione

//controllo se utente loggato
if(!isset($_SESSION['statoLogin'])){
    header('Location: login.php');
    exit();
}

// Recupera i prodotti nel carrello
$carrello = isset($_SESSION['carrello']) ? $_SESSION['carrello'] : [];


// Se il carrello è vuoto, puoi anche decidere di distruggere la variabile di sessione
if (empty($_SESSION['carrello'])) {
    unset($_SESSION['carrello']);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamaneto</title>
    <link rel="stylesheet" href="checkout.css">
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

    <h1 class="carrello-titolo">Riepilogo Pagamento</h1>

    <!-- RIEPILOGO ORDINE-->

    <?php if (empty($carrello)): ?>
        <p class="carrello-vuoto">Nessun gioco da acquistare</p>
    <?php else: ?>
        <ul class="carrello-lista">
        <?php foreach ($carrello as $codice => $prodotto): ?>
            <li class="carrello-prodotto">
                <div class="dettagli-prodotto">
                    <h3 class="prodotto-nome"><?php echo htmlspecialchars($prodotto['nome']); ?></h3>
                    <p class="prodotto-prezzo">Prezzo: €<?php echo number_format($prodotto['prezzo'], 2); ?></p>
                    <p class="prodotto-quantita">Quantità: <?php echo $prodotto['quantita']; ?></p>
                    <p class="prodotto-totale">Totale: €<?php echo number_format($prodotto['prezzo'] * $prodotto['quantita'], 2); ?></p>
                    <form method="POST" action="carrello.php" class="form-rimuovi">
                        <input type="hidden" name="codice" value="<?php echo $codice; ?>">
                        <button type="submit" name="rimuovi" class="pulsante-rimuovi">Rimuovi</button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
        
        <!-- TOTALE DA PAGARE-->

        <p class="totale-complessivo"><strong>Totale complessivo:</strong> €<?php
            $totale = 0;
            foreach ($carrello as $prodotto) {
                $totale += $prodotto['prezzo'] * $prodotto['quantita'];
            }
            echo number_format($totale, 2);
        ?></p>

    <!-- FORM DI PAGAMENTO-->

        <h1 class="titolo-pagamento">Inserisci i tuoi dati di pagamento</h1>
        <form action="#" method="POST" class="form-pagamento">
            <label for="nome-titolare">Nome del Titolare della Carta</label>
            <input type="text" id="nome-titolare" name="nome-titolare" required placeholder="Mario Rossi" required>
            
            <label for="numero-carta">Numero della Carta</label>
            <input type="text" id="numero-carta" name="numero-carta" required placeholder="1234 5678 9123 4567" maxlength="19" title="Inserisci un numero di carta valido a 16 cifre" required>
            
            <div class="scadenza-cvv">
                <div class="scadenza">
                    <label for="data-scadenza">Data di Scadenza</label>
                    <input type="text" id="data-scadenza" name="data-scadenza" required placeholder="MM/AA" maxlength="5" pattern="\d{2}/\d{2}" title="Inserisci la data di scadenza nel formato MM/AA" required>
                </div>
                <div class="cvv">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required placeholder="123" maxlength="3" pattern="\d{3}" title="Inserisci il codice CVV a 3 cifre" required>
                </div>
            </div>
            <button onclick="myFunction()" type="submit" class="pulsante-pagamento">Conferma Pagamento</button>    
            <a href="giochi.php" class="link-torna">Torna al Catalogo</a>
        </form>
    <?php endif; ?>    
    </ul>
         
    <!-- Script per validazione e popup -->
    <script>
        function myFunction() {
            alert("SEI APPENA STATO DERUBATO!");
        }
    </script>   

</body>
</html>

