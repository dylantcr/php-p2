<?php

//auteur: dylan Mahn.
//functie: omtrek berekenen.

function berekenenOmtrekCirkel($straal) {
    //pi: 3.14
    $omtrek = 2 * pi() * $straal;
    return $omtrek;
}

$uitkomst = berekenenOmtrekCirkel(5);
echo berekenenOmtrekCirkel(5);


?>