<?php
// controllo se il dato è stato passato correttamente
if (!isset($_GET['char-num'])) {
    $result = 'Inserisci la lunghezza della password e premi il bottone per generare';
} elseif (($_GET['char-num']) < 8 || ($_GET['char-num']) > 32) {
    $result = 'Errore. Il numero inserito deve essere compreso tra 8 e 32';
} else {
    $char_num = ($_GET['char-num']);
    var_dump($char_num);
    $result = 'Password generata.';
}



?>

<!-- Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Password Generator</title>
</head>
<body>

<div class="container my-5">

    <div class="my-4">
        <?php echo $result ?>
    </div>

    <form action="index.php" method="get">
        <label for="char-numbers">Inserisci il numero di caratteri</label>
        <input type="number" id="char-numbers" name="char-num">
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
</div>
    
</body>
</html>