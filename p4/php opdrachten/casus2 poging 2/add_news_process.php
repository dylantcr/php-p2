<?php
//auteur: Dylan mahn
// add_news_process.php

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang de ingediende gegevens van het formulier
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Voeg de gegevens toe aan de database (moet nog worden geïmplementeerd)
    // Hier zou je code moeten schrijven om de gegevens toe te voegen aan de nieuwsberichten tabel in de database

    // Redirect naar de adminpanel pagina na het toevoegen van het nieuwsbericht
    header("Location: adminpanel.php");
    exit(); // Stop het uitvoeren van het resterende script
}
?>
