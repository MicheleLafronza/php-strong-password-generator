<?php
// funzione di generazione password
// come argomento della funzione abbiamo tutti i dati necessari per generare la password
function passGen($num, $char, $numbers, $sym, $repeat) {
    // variabile finale vuota
    $finalchar = '';
    // stringa di sole lettere
    $only_char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // stringa di soli numeri
    $only_numbers = '0123456789';
    // stringa di soli simboli
    $only_sym = '!?&%$<>^+-*/()[]{}@#_=';

    // se non è stata selezionata nessuna preferenza prendiamo tutti i caratteri possibili
    if ($char === false && $numbers === false && $sym === false) {
        $finalchar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?&%$<>^+-*/()[]{}@#_=';
    }
    
    // se il dato delle lettere è true, le inseriamo nella generazione finale
    if ($char) {
        $finalchar .= $only_char;
    }

    // se il dato dei numeri è true, le inseriamo nella generazione finale
    if ($numbers) {
        $finalchar .= $only_numbers;
    }

    // se il dato dei simboli è true, li inseriamo nella generazione finale
    if ($sym) {
        $finalchar .= $only_sym;
    }
    // trasformiamo i caratteri disponibili in un numero che utilizzeremo per pescarli successivamente
    $charactersLength = strlen($finalchar);
    // creaimo la variabile vuota della password
    $password = '';
    
    // ciclo per generare la password che si basa sulla lunghezza fornita dall'utente
    for ($i = 0; $i < $num; $i++) {
        // settiamo ogni volta un valore randomico da 0 al massimo della lunghezza dei caratteri disponibili
        $index = rand(0, $charactersLength - 1);
        
        // se la ripetizione non è consentita continuiamo fin quando non otteniamo un carattere che non è già stato pescato
        if ($repeat === 'no'){
            if (!str_contains($password, $finalchar[$index])) {
                $password .= $finalchar[$index];
            } else {
                $i--;
            }
        } else {
            // inseriamo nella variabile password il carattere corrispondente al numero random venuto fuori dall'index
            $password .= $finalchar[$index];
        }
    }

    // finito il ciclo ritorniamo la password completa
    return $password;
}

?>