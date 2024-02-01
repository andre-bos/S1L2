<?php
// Questo è un commento a singola linea
# Questo è un commento a singola linea
/*
    Questo è un commento 
    multi linea
*/

// Operatori aritmetici in PHP
// * / + - %

// Operatori aritmetici di assegnameto in PHP
// += -= *= /= %=

// Operatori relazionali in PHP
// > < >= <=

// Operatori di confronto in PHP
// == === != <>(Diverso da) !== 

// Da PHP7 è stato introdotto un nuovo operatore <=> (Spaceship)
// Serve per confrontare due espressioni. Mi restituisce 3 possibili risultati -1 0 1
$x = 1;
$y = 3;
echo ($x <=> $y) . '<br>'; // Output -1
$x = 1;
$y = 1;
echo ($x <=> $y) . '<br>'; // Output 0
$x = 3;
$y = 1;
echo ($x <=> $y) . '<br>'; // Output 1

// Operatore ternario
// (condizione) ? valore1 : valore2

// Operatori unari in PHP
// ++ --

// Operatori logici in PHP
// AND => &&, OR => ||, NOT => !

// Concatenazione di Stringhe 
// . .=

// Strutture di Controllo
// if(condizione) { blocco di istruzioni }
// else if(condizione) { blocco di istruzioni }
// else { blocco di istruzioni }
$num1 = 10;
$num2 = 5;

?>

<?php if($num1 > $num2) {
    echo '<h2>'.$num1 . ' è maggiore di ' . $num2 . '</h2>';
} else if($num1 === $num2) {
    echo '<h2>'.$num1 . ' è uguale a ' . $num2 . '</h2>';
} else {
    echo '<h2>'.$num1 . ' è minore di ' . $num2 . '</h2>';
}
?>

<?php if($num1 > $num2) : ?>
    <h2><?= $num1 . ' è maggiore di ' . $num2 ?> </h2>
<?php elseif($num1 === $num2) : ?>
    <h2><?= $num1 . ' è uguale a ' . $num2 ?> </h2>
<?php else : ?>
    <h2><?= $num1 . ' è minore di ' . $num2 ?> </h2>
<?php endif ?>

<?php

// Strutture di Controllo
// switch
$result;
$espressione = 2;
switch ($espressione) {
    case 1:
        # code...
        $result = 'Gennaio';
        break;
    case 2:
        # code...
        $result = 'Febbraio';
        break;
    case 3:
        # code...
        $result = 'Marzo';
        break;
    default:
        # code...
        $result = 'Error';
        break;
}

echo $result;

// Da php8
// è stato introdotto un costrutto simile a switch
// a differenza dello switch ritorna un risultato
// match()

$result = match ($espressione) {
    12, 1, 2 => 'Inverno',
    3, 4, 5 => 'Primavera',
    6, 7, 8 => 'Estate',
    9, 10, 11 => 'Autunno',
    default => 'Error'
};

$result = match (true) {
    $espressione > 0 && $espressione <5 => 'Ciao',
    $espressione >= 5 && $espressione <10 => 'Abc',
    default => 'Error'
};

echo $result;

// Cicli e strutture iterative
// while

$a = 1;
while ($a <= 10) {
    # code...
    $a++;
}

//do while

do {
    # code...
    $a++;
} while ($a <= 10);

// break e continue

// For e Foreach

for ($i=0; $i < 10; $i++) { 
    # code...
    if($i % 2 === 0) {
        continue;
    } else if($i === 5) {
        break;
    }
    echo('stampa');
}
$variable = [];
foreach ($variable as $key => $value) {
    # code...
}

?>


<?php 

    echo '<h1>Funzioni Native PHP</h1>';

    // Funzioni native di PHP

    # echo => stampare a video una stringa
    # print => stampare a video una stringa
    # print_r => stampare a video il contenuto di un array
    # var_dump => stampare a video il valore ed il tipo di una variabile
    # isset => verifica se una varibile esiste e se non ha valore NULL
    $ciao = null;
    if(isset($ciao)) {
        echo 'Result isset: true'; 
    } else {
        echo 'Result isset: false'; 
    }
    # empty => verifica se una varibile è vuota;
    # sono considerate vuote le variabili con "" - 0 - 0.0 - "0" - null - false - [] - 
    # $var => Variabile dichiarata ma non inizializzata  
    if(empty($ciao)) {
        echo 'Result empty: true'; 
    } else {
        echo 'Result empty: false'; 
    }
    # is_string() => verifica se una varibile è di tipo stringa;
    # is_numeric() => verifica se una varibile è di tipo number;
    # is_int() => verifica se una varibile è di tipo intero;
    # is_float() => verifica se una varibile è di tipo float;
    # is_bool() => verifica se una varibile è di tipo boolean;
    # is_array() => verifica se una varibile è di tipo array;
    # is_null() => verifica se una varibile è null;
    # gettype() => restituisce il tipo di una varibile 


    // Custom function

    //func();
    function func($param1, $param2 = 3) {
        # code...
        return $param1 + $param2;
    }
    func(25);
    func(25, 5);

    function func2() {
        # code...
        echo 'Num parametri' . func_num_args(); // Ritorna il numero di parametri passati ad una funzione
        print_r(func_get_args()); // Ritorna un array con i parametri passati ad una funzione
    }
    func2(25,5);

    // Dalla versione PHP7 è stata introdotta la tipizzazione rigorosa

    declare(strict_types = 1);
    function func3(int $param1 = 2, float $param2) {
        # code...
        return $param1 + $param2;
    }

    func3(5, 25);

    function func4(int ...$args) {
        # code...
        print_r($args);
    }
    func4(5, 25, 46, 5);

    // Dalla versione PHP8 possiamo assegnare il nome ad un parametro
    function func5(int $param1 = 25, float $param2) {
        # code...
        return $param1 + $param2;
    }
    
    func5(param2: 25);

    //func6(); Errore!!!
    // Funzioni espressione in PHP
    $func6 = function() {
        # code...
    };
    $func6();

    // Da PHP7 sono state introdotte le Arrow Function
    // non è possibile inserire {} e deve ritornare un solo valore
    $func7 = fn() => 'Sono una Arrow Function';


    // Scope di una funzione
    $name = 'Mario Rossi';

    $miaFunc = function() use($name) {
        echo 'Ciao da ' . $name;
    };

    $miaFunc();

    function miaFunc2() {
        global $name;
        echo 'Ciao da ' . $name;
    };

    $miaFunc2();

    function miaFunc3() {
        echo 'Ciao da ' . $GLOBALS['name'];
    };

    $miaFunc3();
?>



