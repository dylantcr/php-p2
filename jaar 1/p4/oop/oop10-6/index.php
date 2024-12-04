<?php
//Auteur: D.Mahn
//Functie: importeert en toont inhoud

declare(strict_types=1);
// Importeer de Music en ListenList classes
require_once 'Music.php';
require_once 'ListenList.php';

// Maak een nieuwe ListenList aan
$kees = new ListenList();

// Maak twee nieuwe Music objecten aan
$music1 = new Music("Bohemian Rhapsody", "Rock", 354);
$music2 = new Music("ABC", "House", 220);

// Voeg de muziekstukken toe aan de ListenList
$kees->addMusic($music1);
$kees->addMusic($music2);

// Geef de inhoud van de ListenList weer met var_dump
echo '<pre>';
var_dump($kees->getMusic());
echo '</pre>';
?>