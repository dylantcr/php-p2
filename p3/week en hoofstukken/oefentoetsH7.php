<?php

//auteur: Dylan Mahn
//functie: oefentoets

function BepaalGemiddelde($cijfers) {
    $aantalElementen = count($cijfers);

    if ($aantalElementen === 0) {
        // Voorkom deling door nul als de array leeg is
        return 0;
    }

    $totaal = 0;

    foreach ($cijfers as $cijfer) {
        $totaal += $cijfer;
    }

    $gemiddelde = $totaal / $aantalElementen;

    return $gemiddelde;
}

// Voorbeeld:
$cijfers = array(2, 3, 4);
$gemiddelde = BepaalGemiddelde($cijfers);
echo $gemiddelde;

/*
$cijfers = array(2,3,4);
$gemiddelde = BepaalGemiddelde($cijfers);
echo $gemiddelde; */

?>

function BepaalGemiddelde($cijfers) {
    $aantal = 0;
    $aantal = count($cijfers);

    for ($i = 0; $i < $aantal; $i++) {
        $totaal += $cijfers[$i];
    }

    if
}