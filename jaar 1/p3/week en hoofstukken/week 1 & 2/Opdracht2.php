<?php

// Auteur: Dylan
// functie: datum functie

//instalisatie
$datum = date('l d F Y');

//main
echo "De datum is: $datum";

echo "<br>";

$time = date("h:i");
echo "Het is nu: $time uur";

echo "<br>";

$month = date("F");
$daysInMonth = date("t");
echo "Deze maand, $month heeft $daysInMonth dagen";

echo "<br>";

$week = date("W");
echo "Deze week is het week: $week";

echo "<br>";

function isLeapYear($year) {
    if(!is_numeric($year)) {
        echo "String is not allowed. Input should be a number.";
        return;
    }
    if(($year%4 == 0 && $year%100!=0) || $year%400==0) {
        echo "Het jaar $year is een schrikkeljaar";
    }else{
        echo "Het jaar $year is geen schrikkeljaar";
    }
}
 
$year = date('Y');
isLeapYear($year);

?>