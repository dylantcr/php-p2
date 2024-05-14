<?php

//auteur: Dylan mahn
//functie: inloggen gebruiker

// Voeg de database configuratie toe vanuit een extern bestand
require 'config.php'; // Pas dit pad aan indien je config.php ergens anders staat
// Start een nieuwe sessie of hervat de bestaande sessie
session_start();
// Controleer of het inlogformulier is verzonden
if (isset($_POST["inloggen"])) {
    try {
        // Maak een nieuwe databaseverbinding met de PDO class
        $db = new PDO($dsn, $user, $pass, $options);
        // De gebruikersnaam filteren om XSS-aanvallen te voorkomen
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        // Haal het wachtwoord direct uit de POST array
        $password = $_POST['password'];
        // Bereid een SQL-query voor om de gebruiker te zoeken op gebruikersnaam
        $query = $db->prepare("SELECT * FROM gebruikers WHERE username= :user");
        // Bind de ingevoerde gebruikersnaam aan de query
        $query->bindParam(":user", $username, PDO::PARAM_STR);
        // Voer de query uit
        $query->execute();
        // Controleer of er precies één gebruiker is gevonden
        if ($query->rowCount() == 1) {
            // Haal de gebruikersgegevens op
            $result = $query->fetch();
            // Controleer of het ingevoerde wachtwoord overeenkomt met het gehashte wachtwoord in de database
            if (password_verify($password, $result["password"])) {
                // Sla de gebruikersnaam op in een sessievariabele
                $_SESSION['gebruiker'] = $username;
                // Stuur de gebruiker door naar de welkom-pagina
                header("Location: welkom.php");
                exit();
            } else {
                // Toon een foutmelding als het wachtwoord niet klopt
                echo "Onjuiste gegevens";
            }
        } else {
            // Toon een foutmelding als de gebruikersnaam niet gevonden is
            echo "Onjuiste gegevens";
        }
    } catch (PDOException $e) {
        // Vang eventuele databaseverbindingsfouten op
        die("Error!: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inloggen</title>
    </head>
        <body>
            <h2>Inloggen</h2>
                <form action="" method="post">
                <div>
                    <label for="username">Gebruikersnaam: </label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Wachtwoord: </label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <input type="submit" name="inloggen" value="Inloggen">
                </div>
                </form>
            <br/><a href="registreren.php">Registreren</a>
    </body>
</html>