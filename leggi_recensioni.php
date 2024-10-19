<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni</title>
    <link rel="stylesheet" type="text/css" href="recensioni.css">
</head>
<body>

<?php
if(isset($_POST['submit'])){
    
    $codice_videogioco = $_POST['codice'];

    echo "<h2>Recensioni per il gioco con codice: $codice_videogioco</h2>";      //anzichè il codice scrivere il nome del videogioco

    $xml = simplexml_load_file('recensioni.xml');

    foreach ($xml->recensione as $recensione) {
        if ($recensione->codice_videogioco == $codice_videogioco) {
            echo "<div class='recensione'>";
            echo "<strong>Utente: " . $recensione->utente . "</strong><br>";
            echo "<p>" . $recensione->contenuto . "</p>";
            echo "</div><br>";
        }
    }
}
    ?>

</body>
</html>