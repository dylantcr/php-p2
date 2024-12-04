<?php
//auteur: D.Mahn
//functie: verbinding met database

// Verbindingsparameters voor de database
$servername = "localhost";
$username = "root";
$password = "";
$database = "ziekmeldsysteem";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $database);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
