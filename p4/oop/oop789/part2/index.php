<?php
//auteur: D.Mahn
//Functie: aanmaken item

// Importeer de Music class
require_once 'Music.php';

// Maak een nieuw muziek item aan
$music1 = new Music(name: 'Bach', genre: 'Klassiek', listen: 3);
echo $music1->getName() . "\n";  // Toon de naam van de muziek

// Toon details van het muziek object
var_dump($music1);
?>