<?php
//auteur: Dylan Mahn
//functie: page visits

session_start();

// Controleer of de sessievariabele is ingesteld, zo niet, initialiseer deze met 0
if (!isset($_SESSION['page_visits'])) {
    $_SESSION['page_visits'] = 0;
}

// Verhoog het aantal paginabezoeken
$_SESSION['page_visits']++;

// laat het aantal paginabezoeken zien
echo "Aantal paginabezoeken: " . $_SESSION['page_visits'];
?>