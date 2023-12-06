<?php
// auteur: Dylan Mahn
    // functie: Opdracht 4.2: maak opdracht 1 met switch inplaats van if/else.
 
   
// Gebruik je kan ook de uur die je wilt in type of date('G') dan pakt het huidige uur van je laptop/pc.
$uur = 5;
$dagdeel = "";
 
// Gebruik een switch statement om het dagdeel te bepalen
switch (true) {
    case ($uur >= 6 && $uur < 12):
        $dagdeel = "ochtend";
        break;
    case ($uur >= 12 && $uur < 18):
        $dagdeel = "middag";
        break;
    case ($uur >= 18 && $uur < 24):
        $dagdeel = "avond";
        break;
    default:
        $dagdeel = "nacht";
        break;
}
 
echo "Het is nu $dagdeel.";
?>