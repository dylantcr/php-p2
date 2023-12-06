<?php

//auteur: Dylan Mahn
// Variabelen instellen
$currentHour = date('H'); // Huidige uur in 24-uurs formaat
$temperature = 22; // Vervang dit door de werkelijke temperatuur
$humidity = 70; // Vervang dit door de werkelijke luchtvochtigheid

// Controleren of de airco aan of uit moet
if ($currentHour >= 17 || ($temperature < 20 && $humidity < 85)) {
    echo "De airco is uit.";
} else {
    echo "De airco is aan.";
}

?>