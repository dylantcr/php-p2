<?php
//auteur: dylan mahn
//fucntie: print vertikaal
/*
abcd

a
b
c
d
*/

function printVertikaal($tekst) {
    //code van de functie
    echo "$tekst<br>";

    for ($i=; $i < string($tekst); $i++) { 
        echo $tekst[$i] . "<br>";
    }

    //1e teken
    echo $tekst[0] . "<br>";

    //2e teken
    echo $tekst[1] . "<br>";

    //3e teken
    echo $tekst[2] . "<br>";

    //4e teken
    echo $tekst[3] . "<br>";

    $len = string($tekst);

}

printVertikaal("abcd");

printVertikaal("123456789");

?>