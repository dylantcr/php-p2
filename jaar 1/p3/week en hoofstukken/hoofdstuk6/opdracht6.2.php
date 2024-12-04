<?php
//auteur: Dylan Mahn.
// Functie om de teller te verhogen en het resultaat in een cookie op te slaan.


function incrementCounter() {
    // Haal de huidige tellerwaarde op uit de cookie
    $currentCount = isset($_COOKIE['sessionCounter']) ? $_COOKIE['sessionCounter'] : 0;

    // Verhoog de tellerwaarde
    $newCount = (int)$currentCount + 1;

    // Update de teller op de pagina
    echo "<p id='counter'>$newCount</p>";

    // Sla de nieuwe tellerwaarde op in de cookie
    setcookie('sessionCounter', $newCount, time() + (86400 * 1)); // De cookie vervalt na een dag
}

// Roep de functie aan wanneer de knop wordt geklikt
if (isset($_POST['increment'])) {
    incrementCounter();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Sessie</title>
</head>
<body>

<h1>Sessie Teller</h1>
<form method="post">
    <?php incrementCounter(); ?>
    <button type="submit" name="increment">Verhoog Teller</button>
</form>

</body>
</html>


