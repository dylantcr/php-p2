<?php
//auteur: Dylan Mahn
// Functie om te controleren of een getal even of oneven is

//even of oneven
function checkEvenOdd($number) {
    if ($number % 2 == 0) {
        return "Het getal $number is even.";
    } else {
        return "Het getal $number is oneven.";
    }
}

$inputNumber = 9;  // Je kunt hier het getal invoeren

$result = checkEvenOdd($inputNumber);
echo $result;

?>