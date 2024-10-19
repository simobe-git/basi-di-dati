<?php
session_start();
if (!isset($_SESSION['statoLogin'])) {
    die("Devi essere loggato per scrivere una recensione.");
}

include 'connessione.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $codice_videogioco = $_POST['codice_videogioco'];
    $contenuto_recensione = $_POST['contenuto'];

    // Verifica se esiste già una recensione
    $sql = "SELECT * FROM recensioni WHERE email_utente = ? AND codice_videogioco = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $codice_videogioco);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Aggiorna recensione esistente
        $sql_update = "UPDATE recensioni SET contenuto = ? WHERE email_utente = ? AND codice_videogioco = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssi", $contenuto_recensione, $email, $codice_videogioco);
        $stmt_update->execute();
    } else {
        // Inserisci nuova recensione
        $sql_insert = "INSERT INTO recensioni (email_utente, codice_videogioco) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("si", $email, $codice_videogioco);
        $stmt_insert->execute();
        
        // Aggiungi la recensione al file XML
        $xml = simplexml_load_file('recensioni.xml');
        $recensione = $xml->addChild('recensione');
        $recensione->addChild('utente', $email);
        $recensione->addChild('codice_videogioco', $codice_videogioco);
        $recensione->addChild('contenuto', htmlspecialchars($contenuto_recensione));
        $xml->asXML('recensioni.xml');
    }
}
?>

<form method="post" action="scrivi_recensione.php">
    <label for="codice_videogioco">Scegli un videogioco:</label>
    <select name="codice_videogioco">
        <?php
        // Estrarre i videogiochi dal database per popolare il menu a tendina
        $sql = "SELECT codice, nome FROM videogiochi";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['codice'] . "'>" . $row['nome'] . "</option>";
        }
        ?>
    </select>
    <br>
    <label for="contenuto">Scrivi la tua recensione:</label>
    <textarea name="contenuto" rows="4" cols="50"></textarea>
    <br>
    <input type="submit" value="Invia recensione">
</form>
