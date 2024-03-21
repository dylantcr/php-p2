<?php
//auteur: D.Mahn
// Inclusief het configuratiebestand
require_once('config.php');

// Registratieverwerking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gebruikersgegevens uit het formulier ophalen
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Controleer of de gebruikersnaam al bestaat in de database
    $check_sql = "SELECT * FROM users WHERE username='$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Gebruikersnaam bestaat al, toon foutmelding of neem andere maatregelen
        echo "Gebruikersnaam is al in gebruik.";
    } else {
        // Gebruikersnaam is uniek, voeg gebruiker toe aan de database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($insert_sql) === TRUE) {
            // Registratie succesvol, neem verdere maatregelen zoals het doorsturen naar een inlogpagina
            echo "Registratie succesvol!";
        } else {
            // Fout bij het toevoegen van de gebruiker, toon foutmelding of neem andere maatregelen
            echo "Fout bij registratie: " . $conn->error;
        }
    }
}
?>
\