<?php

//auteur: Dylan mahn
//functie: jaren berekenen

function berekenJaren($uitstaandBedrag, $rentePercentage, $opnameBedrag) {
    $jaren = 0;

    while ($uitstaandBedrag > 0) {
        $uitstaandBedrag = $uitstaandBedrag * (1 + $rentePercentage / 100) - $opnameBedrag;
        $jaren++;

        // Voorkom oneindige loop na 100 jaar
        if ($jaren > 100) {
            echo "Geert kan het bedrag zijn hele leven lang opnemen.\n";
            return "Levenslang";
        }
    }

    return $jaren;
}

// Gegeven waarden
$startBedrag = 100000;
$rentePercentage = 4;
$opnameBedrag = 5000;

// Bereken het aantal jaren
$resultaat = berekenJaren($startBedrag, $rentePercentage, $opnameBedrag);

if ($resultaat != "Levenslang") {
    echo "Geert kan het bedrag $resultaat jaar lang opnemen.\n";
}

?>