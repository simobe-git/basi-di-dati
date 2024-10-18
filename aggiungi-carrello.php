<?php
session_start(); // Inizializza la sessione

// Verifica che il form sia stato inviato con i dati corretti
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codice'])) {
    $codice = $_POST['codice'];  // Codice del gioco
    $nome = $_POST['gioco'];     // Nome del gioco
    $prezzo = $_POST['prezzo'];   // Prezzo del gioco

    // Se il carrello non esiste ancora, inizializzalo come un array vuoto
    if (!isset($_SESSION['carrello'])) {
        $_SESSION['carrello'] = [];
    }

    // Se il gioco è già nel carrello, incrementa la quantità, altrimenti aggiungilo
    if (isset($_SESSION['carrello'][$codice])) {
        $_SESSION['carrello'][$codice]['quantita']++;
    } else {
        $_SESSION['carrello'][$codice] = [
            'nome' => $nome,
            'prezzo' => $prezzo,
            'quantita' => 1
        ];
    }
}

// Dopo aver aggiunto il prodotto al carrello, reindirizza l'utente alla pagina dei giochi
header('Location: carrello.php');
exit();
?>
