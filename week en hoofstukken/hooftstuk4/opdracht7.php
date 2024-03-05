<?php

//auteur: Dylan Mahn.
// Variabele instellen.
$spaargeld = 800; // Vervang dit door het werkelijke bedrag.
$prijsTelefoon = 1000;

// Controleren of je de telefoon kunt kopen.
if ($spaargeld < $prijsTelefoon) {
    $tekort = $prijsTelefoon - $spaargeld;
    
    //tekort
    if ($tekort > 250) {
        echo "Helaas, je hebt een tekort van €$tekort. Het wordt aanbevolen een baantje te zoeken.";
    } else {
        echo "Je bent er bijna! Nog €$tekort en je kunt de telefoon kopen.";
    }
} else {
    $over = $spaargeld - $prijsTelefoon;
    echo "Gefeliciteerd! Je hebt genoeg geld om de telefoon te kopen en hebt nog €$over over voor een hoesje.";
}

?>
