<?php
//auteur: Dylan mahn
//functie: controleren login
session_start();

// Database configuratie
$servername = "localhost";
$username = "root"; // Standaard gebruikersnaam
$password = "";     // Standaard wachtwoord
$dbname = "case2";  // De naam van de database die we hebben gemaakt

// Controleer of het inlogformulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Ontvang de ingediende gegevens van het inlogformulier
    $username = $_POST["username"];
    $password = $_POST["password"];
    $login_type = $_POST["login_type"];

    // Controleer de inloggegevens
    if ($login_type === "admin" && $username === "admin" && $password === "admin123") {
        // Als de gebruiker als admin wil inloggen en de inloggegevens correct zijn, stel de sessievariabele in en stuur de gebruiker door naar de adminpanel pagina
        $_SESSION["admin_logged_in"] = true;
        header("Location: adminpanel.php");
        exit(); // Stop het uitvoeren van het resterende script
    } elseif ($login_type === "guest" && $username === "guest" && $password === "guest123") {
        // Als de gebruiker als gast wil inloggen en de inloggegevens correct zijn, stel de sessievariabele in en stuur de gebruiker door naar de gastpagina
        $_SESSION["guest_logged_in"] = true;
        header("Location: guestpage.php");
        exit(); // Stop het uitvoeren van het resterende script
    } else {
        // Als de inloggegevens niet correct zijn, stuur de gebruiker terug naar de loginpagina
        header("Location: login.php");
        exit(); // Stop het uitvoeren van het resterende script
    }
}
?>
