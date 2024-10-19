<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensioni</title>
    <link rel="stylesheet" type="text/css" href="giochi.css">
</head>
<body>
    <main>
        <h1>Qui puoi <?php if(isset($_SESSION['statoLogin'])){ ?> scrivere <?php }else{ ?> visualizzare <?php } ?> recensioni sui videogiochi</h1>
        <div class="catalogo">
            <?php require_once("connessione.php");
                $query = "SELECT * FROM videogiochi";
                $result = $connessione->query($query);
                if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="gioco">
                        <img src="<?php echo $row['immagine']; ?>" alt="<?php echo $row['nome']; ?>">
                        <h3><?php echo $row['nome']; ?></h3>
                        <p>Prezzo: €<?php echo number_format($row['prezzo_attuale'], 2); ?></p>
                        <p>Genere: <?php echo $row['genere']; ?></p>
                        <p>Anno di rilascio: <?php echo date('Y', strtotime($row['data_rilascio'])); ?></p>  <!-- estraiamo solo l'anno -->
                        <form method="POST" action="leggi_recensioni.php">
                            <input type="hidden" name="gioco" value="<?php echo $row['nome']; ?>">
                            <input type="hidden" name="prezzo" value="<?php echo $row['prezzo_attuale']; ?>">
                            <input type="hidden" name="codice" value="<?php echo $row['codice']; ?>">
                            <?php if(isset($_SESSION['statoLogin'])){ ?>
                                <button namme="submit" type="submit">Scrivi recensione</button>
                            <?php }else{ ?>
                                  <button name="submit" type="submit">Visualizza recensioni</button> <?php } ?>
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

