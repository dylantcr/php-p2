<?php
//auteur: Mahn
//funcite: voorbeeld operatoren blz 4.36

// optellen 1000 + 2000
$getal = 1000;
$uitkomst = $getal + 2000;
echo "Uitkomst = $uitkomst";

echo "<br>";

// $uitkomst verhogen met 10%
//formule: 3000 + 3000 * 10/100
//formule 2: $uitkomst * 1.1
$uitkomst = $uitkomst *1.1;
$uitkomst2 = $uitkomst *1.1;

echo $uitkomst;

echo "<br>";
// 1000 vanaf
$uitkomst2 = $uitkomst -1000;
echo $uitkomst2;

//print resultaat
echo "<br> Eindresultaat $uitkomst2";
?>