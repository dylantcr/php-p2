<?php
session_start();

// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleren of het fruit
    if (!empty($_POST["fruit"])) {
        // Toevoegen van het ingediende fruit
        $_SESSION["fruits"][] = $_POST["fruit"];
    }

    // Controleren
    if (isset($_POST["sorteren"])) {
        // Sorteer de array van a naar z
        sort($_SESSION["fruits"]);
    }

    // Controleren op de schudknop
    if (isset($_POST["schudden"])) {
        // Schud de array
        shuffle($_SESSION["fruits"]);
    }
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 8 Dylan Mahn</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Voeg fruit toe: <input type="text" name="fruit">
    <input type="submit" value="Toevoegen">
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="submit" name="sorteren" value="Sorteer van A naar Z">
    <input type="submit" name="schudden" value="Schud de array">
</form>

<?php
// Weergave van de inhoud
if (!empty($_SESSION["fruits"])) {
    echo "<h2>Inhoud van de array:</h2>";
    echo "<ul>";
    foreach ($_SESSION["fruits"] as $fruit) {
        echo "<li>$fruit</li>";
    }
    echo "</ul>";
}
?>

</body>
</html>
