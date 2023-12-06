<?php

//auteur: Dylan Mahn.
// Variabelen instellen
$leeftijd = 20; // Vervang dit door de werkelijke leeftijd
$heeftStempas = false; // Vervang dit door true als de persoon een stempas heeft, anders false

// Controleer of iemand een scooter rijbewijs mag halen
if ($leeftijd >= 16) {
    echo "Je mag een scooter rijbewijs halen.";
} else {
    echo "Sorry, je bent te jong om een scooter rijbewijs te halen.";
}

// Controleer of iemand mag stemmen.
if ($leeftijd >= 18) {
    if ($heeftStempas) {
        echo " Je mag stemmen.";
    } else {
        echo " Je bent ouder dan 18, maar je hebt geen stempas ontvangen, dus je mag niet stemmen.";
    }
} else {
    echo "Je bent te jong om te stemmen.";
}

?>
