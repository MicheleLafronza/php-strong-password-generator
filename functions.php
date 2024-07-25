<?php
// funzione di generazione password
// come argomento della funzione abbiamo un numero che sarà preso dal dato fornito dall'utente
function passGen($num) {
    // selezioniamo i caratteri disponibili
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?&%$<>^+-*/()[]{}@#_=';
    // trasformiamo i caratteri disponibili in un numero che utilizzeremo per pescarli successivamente
    $charactersLength = strlen($characters);
    // creaimo la variabile vuota della password
    $password = '';
    
    // ciclo per generare la password che si basa sulla lunghezza fornita dall'utente
    for ($i = 0; $i < $num; $i++) {
        // settiamo ogni volta un valore randomico da 0 al massimo della lunghezza dei caratteri disponibili
        $index = rand(0, $charactersLength - 1);
        // inseriamo nella variabile password il carattere corrispondente al numero random venuto fuori dall'index
        $password .= $characters[$index];
    }

    // finito il ciclo ritorniamo la password completa
    return $password;
}