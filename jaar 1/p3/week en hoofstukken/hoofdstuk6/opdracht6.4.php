<?php

//Auteur: Dylan Mahn
// Functie om de oppervlakte en omtrek van een cirkel te berekenen

function calculateCircleProperties($radius) {
    // Pi-waarde
    $pi = 3.14;

    // Bereken de omtrek van de cirkel
    $circumference = 2 * $pi * $radius;

    // Bereken de oppervlakte van de cirkel
    $area = $pi * pow($radius, 2); // pow() wordt gebruikt om de straal tot de macht van 2 te verheffen

    // Geef de resultaten terug als een associatieve array
    return array(
        'omtrek' => $circumference,
        'oppervlakte' => $area
    );
}

// Voorbeeldgebruik
$straal = 5;
$resultaten = calculateCircleProperties($straal);

// Toon de resultaten op het scherm
echo "<h1>Cirkel Eigenschappen</h1>";
echo "<p>Straal: $straal</p>";
echo "<p>Omtrek: " . $resultaten['omtrek'] . "</p>";
echo "<p>Oppervlakte: " . $resultaten['oppervlakte'] . "</p>";
?>