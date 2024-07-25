<?php

// includiamo file delle funzioni
include __DIR__  . "/functions.php";


// controllo se il dato è stato passato correttamente e setto un output di conseguenza
if (!isset($_GET['char-num'])) {
    // se non esiste ancora un dato partiamo con il messaggio di default
    $result = 'Inserisci la lunghezza dei caratteri e premi il bottone per generare una password';
} elseif (($_GET['char-num']) < 8 || ($_GET['char-num']) > 32) {
    // se il dato non corrisponde ai requisiti generiamo messaggio di errore
    $result = 'Errore. Il numero inserito deve essere compreso tra 8 e 32';
} else {
    // se il dato esiste e rispetta i requisiti avviamo la funzione di generazione della password
    // prendiamo tutti i dati dal form se esistono, altrimenti mettiamo in false
    $char_num = ($_GET['char-num']);


    if (!isset($_GET['letters'])) {
        $char = false;
    } else {
        $char = ($_GET['letters']);
    }

    

    if (!isset($_GET['numbers'])) {
        $numbers = false;
    } else {
        $numbers = ($_GET['numbers']);
    }

    

    if (!isset($_GET['sym'])) {
        $sym = false;
    } else {
        $sym = ($_GET['sym']);
    }


    if (!isset($_GET['repeat'])) {
        $repeat = false;
    } else {
        $repeat = ($_GET['repeat']);
    }
    // inseriamo i dati come argomenti nella funzione
    $result = 'La tua password è:' . ' ' . passGen($char_num, $char, $numbers, $sym, $repeat);
    // dopo aver generato la password avviamo la session
    session_start();
    // impostiamo il risultato finale come variabile in session
    $_SESSION['risultato'] = $result;
    // ci reindirizziamo sulla pagina di risultato
    header('Location: result.php');
    exit();
}

?>

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

<div class="container my-5 text-center">

    <h1>PASSWORD GENERATOR</h1>

    <div class="my-4">
        <p><?php echo $result ?></p>
    </div>

    <form action="index.php" method="get">

        <label for="char-numbers">Inserisci il numero di caratteri</label>
        <input type="number" id="char-numbers" name="char-num"><br>
        <label for="letters">Lettere:</label>
        <input type="checkbox" name="letters" id="letters"><br>
        <label for="numbers">Numeri:</label>
        <input type="checkbox" name="numbers" id="numbers"><br>
        <label for="sym">Simboli:</label>
        <input type="checkbox" name="sym" id="sym"><br>

        <h3>Ripetizione caratteri identici?</h3>
        <label for="si">Sì</label>
        <input type="radio" name="repeat" value="si" id="si">
        <label for="no">No</label>
        <input type="radio" name="repeat" value="no" id="no">

        <button class="btn btn-primary" type="submit">Invia</button>
        <a class="btn btn-primary" href="index.php">Annulla</a>
    </form>
</div>
    
</body>
</html>