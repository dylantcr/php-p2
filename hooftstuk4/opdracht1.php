<?php
// auteur: Dylan Mahn
// functie: Opdracht 4.1: 4 verschillende dagdelen met date functie en if/else
 
 
 
// Gebruik je kan ook de uur die je wilt in type of date('G') dan pakt het huidige uur van je laptop/pc.
$uur = 5;
 
// Bepaal het dagdeel op basis van het huidige uur
if ($uur >= 6 && $uur < 12) {
    $dagdeel = "ochtend";
} elseif ($uur >= 12 && $uur < 18) {
    $dagdeel = "middag";
} elseif ($uur >= 18 && $uur < 24) {
    $dagdeel = "avond";
} else {
    $dagdeel = "nacht";
}
 
echo "Het is nu $dagdeel.";
?>