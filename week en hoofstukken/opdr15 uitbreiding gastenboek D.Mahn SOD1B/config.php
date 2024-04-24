<?php
//auteur: D.Mahn
// Database configuratie . connectie
$dbHost = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'guestbook';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}
?>
