<?php
// Verbinding maken met de database
$host = 'localhost';
$db = 'dierentuin_gids';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    die();
}

// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['naam'];
    $soort = $_POST['soort'];
    $beschrijving = $_POST['beschrijving'];
    $afbeelding = $_POST['afbeelding'];

    // Voeg het pad naar de afbeelding toe (de map 'image')
    $afbeeldingPad = 'image/' . $afbeelding;

    // Invoeren van het nieuwe dier in de database
    $query = "INSERT INTO dieren (naam, soort, beschrijving, afbeelding) 
              VALUES (:naam, :soort, :beschrijving, :afbeelding)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':soort', $soort);
    $stmt->bindParam(':beschrijving', $beschrijving);
    $stmt->bindParam(':afbeelding', $afbeeldingPad); // Het volledige pad naar de afbeelding wordt opgeslagen

    if ($stmt->execute()) {
        echo "Dier toegevoegd!";
    } else {
        echo "Er is iets mis gegaan bij het toevoegen van het dier.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg Dier Toe</title>
</head>
<body>
    <h2>Voeg een nieuw dier toe</h2>
    <form action="add_dier.php" method="POST">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required><br><br>

        <label for="soort">Soort:</label>
        <input type="text" id="soort" name="soort" required><br><br>

        <label for="beschrijving">Beschrijving:</label>
        <textarea id="beschrijving" name="beschrijving" required></textarea><br><br>

        <label for="afbeelding">Afbeelding (bestandsnaam):</label>
        <input type="text" id="afbeelding" name="afbeelding" required><br><br>

        <button type="submit">Voeg Dier Toe</button>
    </form>
</body>
</html>
