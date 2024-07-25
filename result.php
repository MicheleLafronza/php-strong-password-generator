<?php
// avviamo la sessione
session_start();

// controlliamo se esiste il dato e quindi è stato passato correttamente
if (isset($_SESSION['risultato'])) {
    // impostiamo una variabile per la password ricevuta
    $result = $_SESSION['risultato'];
} else {
    // se il dato non esiste, messaggio di errore
    $result = 'Errore, nessun dato ricevuto.';
}



?>


<div class="container my-5">

<h2><?php echo $result ?></h2>
</div>