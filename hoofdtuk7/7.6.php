<?php

//auteur: Dylan Mahn
//gemiddelde uitrekenen

session_start();

// Controleer of de sessievariabele al is aangemaakt
if (!isset($_SESSION['cijfers'])) {
    $_SESSION['cijfers'] = array();
}

// Voeg het ingevoerde cijfer toe aan de reeks wanneer het formulier wordt verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cijfer']) && is_numeric($_POST['cijfer'])) {
        $cijfer = floatval($_POST['cijfer']);
        $_SESSION['cijfers'][] = $cijfer;
    }
}

// Bereken het gemiddelde van de reeks cijfers
$gemiddelde = count($_SESSION['cijfers']) > 0 ? array_sum($_SESSION['cijfers']) / count($_SESSION['cijfers']) : 0;
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemiddelde Berekenen</title>
</head>
<body>
    <h1>Gemiddelde Berekenen</h1>

    <form method="post">
        <label for="cijfer">Voer een cijfer in:</label>
        <input type="text" id="cijfer" name="cijfer" required>
        <button type="submit">Verzenden</button>
    </form>

    <?php
    if (count($_SESSION['cijfers']) > 0) {
        echo '<p>Aantal ingevoerde cijfers: ' . implode(', ', $_SESSION['cijfers']) . '</p>';
        echo '<p>Gemiddelde: ' . $gemiddelde . '</p>';
    } else {
        echo '<p>Voer eerst cijfers in om het gemiddelde te berekenen.</p>';
    }
    ?>
</body>
</html>
