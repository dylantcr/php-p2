<?php

//auteur: Dylan mahn
//functie: welkom gebruiker

session_start(); // Start of hervat de sessie

// Controleer of de sessievariabele voor gebruiker bestaat 
if (!isset($_SESSION['gebruiker'])) {
    // Zo niet, omleiden naar de inlogpagina
    header("Location: inloggen.php");
    exit();
}

// Als de sessie wel bestaat, toon dan de welkomstboodschap 
$gebruikersnaam = $_SESSION['gebruiker'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Welkom</title>
        </head>
            <body>
            <h1>Welkom, <?php echo htmlspecialchars($gebruikersnaam); ?>!</h1>
            <p>Je bent succesvol ingelogd.</p>
        <?php
            if ($gebruikersnaam == 'admin') {
                echo "<p><a href='wachtwoordwijzigen.php'>Admin kan wachtwoorden wijzigen</a></p>";
            }
        ?>
            <a href="logout.php">Uitloggen</a>
</body>
</html>
