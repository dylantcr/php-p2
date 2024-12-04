<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Functies Oefening</title>
</head>
<body>

<?php

//auteur: DYlan Mahn
//Functie: Opdracht 9

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de ingevoerde tekst op
    $ingevuldeTekst = $_POST["ingevuldeTekst"];

    // Controleer de geselecteerde methode en pas deze toe
    if ($_POST["methode"] == "uppercase") {
        $resultaat = strtoupper($ingevuldeTekst);
    } elseif ($_POST["methode"] == "lowercase") {
        $resultaat = strtolower($ingevuldeTekst);
    } elseif ($_POST["methode"] == "capitalize") {
        $resultaat = ucwords($ingevuldeTekst);
    } elseif ($_POST["methode"] == "reverse") {
        $resultaat = strrev($ingevuldeTekst);
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="ingevuldeTekst">Voer tekst in:</label>
    <input type="text" name="ingevuldeTekst" id="ingevuldeTekst" required>
    
    <br>
    
    <input type="radio" name="methode" value="uppercase" checked> Hoofdletters
    <input type="radio" name="methode" value="lowercase"> Kleine letters
    <input type="radio" name="methode" value="capitalize"> Eerste letter hoofdletter
    <input type="radio" name="methode" value="reverse"> Omgekeerde volgorde
    
    <br>
    
    <input type="submit" value="Verzenden">
</form>

<?php
// Toon het resultaat als het beschikbaar is
if (isset($resultaat)) {
    echo "<h2>Resultaat:</h2>";
    echo "<p>" . $resultaat . "</p>";
}
?>

</body>
</html>
