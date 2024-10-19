<?php
session_start();
// Connessione al database
require_once('connessione.php'); // Inserisci il tuo file di connessione qui

// Variabili per il criterio di ordinamento e il genere
$ordina_per = isset($_GET['ordina_per']) ? $_GET['ordina_per'] : 'nome';
$direzione = isset($_GET['direzione']) ? $_GET['direzione'] : 'ASC'; // Default ordinamento crescente
$genere_selezionato = isset($_GET['genere']) ? $_GET['genere'] : '';

// Query di base per selezionare i giochi
$query = "SELECT * FROM videogiochi";

// Aggiunta di un filtro per il genere, se specificato
if (!empty($genere_selezionato)) {
    $query .= " WHERE genere = '$genere_selezionato'";
}

// Aggiunta del criterio di ordinamento
$query .= " ORDER BY $ordina_per $direzione";

// Esecuzione della query
$result = $connessione->query($query);

//-------------------------------
$editore_selezionato = isset($_GET['editore']) ? $_GET['editore'] : '';

$sql1 = "SELECT * FROM videogiochi WHERE 1";

if (!empty($editore_selezionato)) {
    $sql1 .= " AND nome_editore = '" . $connessione->real_escape_string($editore_selezionato) . "'";
}

$result1 = $connessione->query($sql1);

//---------------------------------------------
$pegi_selezionato = isset($_GET['pegi']) ? $_GET['pegi'] : '';

$sql2 = "SELECT * FROM videogiochi WHERE 1";

if (!empty($pegi_selezionato)) {
    $sql2 .= " AND id_pegi = '" . $connessione->real_escape_string($pegi_selezionato) . "'";
}

$result2 = $connessione->query($sql2);
//----------------------------------------------
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo Videogiochi</title>
    <link rel="stylesheet" href="giochi.css">
</head>
<body>
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="offerte.php">Offerte</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="contatti.php">Contatti</a></li>
            <li><a href="carrello.php">Carrello (<?php echo isset($_SESSION['carrello']) ? count($_SESSION['carrello']) : 0; ?>)</a></li>
            <?php if(isset($_SESSION['statoLogin'])) : ?>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="scrivi_recensione.php">Recensioni</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="visualizza_recensioni.php">Recensioni</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <h1>Catalogo dei Videogiochi</h1>

    <!-- Form per scegliere il criterio di ordinamento e filtrare per genere -->
    <form method="GET" action="giochi.php" style="margin-top: 3em;">
        <label for="ordina_per">Ordina per:</label>
        <select name="ordina_per" id="ordina_per" style="border-radius: 10px;">
            <option value="nome" <?php if ($ordina_per == 'nome') echo 'selected'; ?>>Nome</option>
            <option value="prezzo_attuale" <?php if ($ordina_per == 'prezzo_attuale') echo 'selected'; ?>>Prezzo</option>
            <option value="data_rilascio" <?php if ($ordina_per == 'data_rilascio') echo 'selected'; ?>>Anno di uscita</option>
        </select>

        <label for="direzione">Ordine:</label>
        <select name="direzione" id="direzione" style="border-radius: 10px;">
            <option value="ASC" <?php if ($direzione == 'ASC') echo 'selected'; ?>>Crescente</option>
            <option value="DESC" <?php if ($direzione == 'DESC') echo 'selected'; ?>>Decrescente</option>
        </select>

        <label for="genere">Filtra per genere:</label>
        <select name="genere" id="genere" style="border-radius: 10px;">
            <option value="" <?php if (empty($genere_selezionato)) echo 'selected'; ?>>Tutti</option>
            <option value="Azione" <?php if ($genere_selezionato == 'Azione') echo 'selected'; ?>>Azione</option>
            <option value="Avventura" <?php if ($genere_selezionato == 'Avventura') echo 'selected'; ?>>Avventura</option>
            <option value="Sport" <?php if ($genere_selezionato == 'Sport') echo 'selected'; ?>>Sport</option>
            <!-- Aggiungi altri generi se necessario -->
        </select>

        <label for="editore">Seleziona Editore:</label>       <!--NUOVA PARTE-->
        <select name="editore" id="editore" style="border-radius: 10px;">
            <option value="">Tutti gli editori</option>
            <?php
            $result_editori = $connessione->query("SELECT DISTINCT nome_editore FROM videogiochi");
            while ($editore = $result_editori->fetch_assoc()) {
                echo "<option value='" . $editore['nome_editore'] . "'>" . $editore['nome_editore'] . "</option>";
            }
            ?>
        </select>

        <form method="GET" action="giochi.php">
        <!-- Filtro per PEGI -->
        <label for="pegi">Seleziona PEGI:</label>
        <select name="pegi" id="pegi" style="border-radius: 10px;">
            <option value="">Tutte le età</option>
            <?php
            $result_pegi = $connessione->query("SELECT DISTINCT id, eta_minima FROM pegi");
            while ($pegi = $result_pegi->fetch_assoc()) {
                echo "<option value='" . $pegi['id'] . "'>PEGI " . $pegi['eta_minima'] . "+</option>";
            }
            ?>
        </select>

        <button type="submit" name="submit">Ordina</button>
    </form>

    <main>
        <div class="catalogo">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="gioco">
                        <img src="<?php echo $row['immagine']; ?>" alt="<?php echo $row['nome']; ?>">
                        <h3><?php echo $row['nome']; ?></h3>
                        <p>Prezzo: €<?php echo number_format($row['prezzo_attuale'], 2); ?></p>
                        <p>Genere: <?php echo $row['genere']; ?></p>
                        <p>Anno di rilascio: <?php echo date('Y', strtotime($row['data_rilascio'])); ?></p>  <!-- estraiamo solo l'anno -->
                        <form method="POST" action="aggiungi-carrello.php">
                            <input type="hidden" name="gioco" value="<?php echo $row['nome']; ?>">
                            <input type="hidden" name="prezzo" value="<?php echo $row['prezzo_attuale']; ?>">
                            <button type="submit"name="codice" value="<?php echo $row['codice']?>">Acquista</button>
                        </form>
                        <form method="POST" action="dettagli.php">
                            <button type="submit"name="codice" value="<?php echo $row['codice']?>">Dettagli</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nessun videogioco disponibile.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
