<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "collegetcr";
 
// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Stel de PDO-foutmodus in op uitzondering
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        // Haal de waarden op van het formulier
        $leerling = $_POST['leerling'];
        $cijfers = $_POST['cijfers'];
        $docenten = $_POST['docenten'];
        $vakken = $_POST['vakken'];
 
        // Bereid de SQL-query voor om gegevens in te voegen
        $stmt = $conn->prepare("INSERT INTO Cijfers (leerling, cijfers, Docenten, Vakken) VALUES (:leerling, :cijfers, :docenten, :vakken)");
 
        // Voer de query uit met de ingediende waarden
        $stmt->execute(array(':leerling' => $leerling, ':cijfers' => $cijfers, ':docenten' => $docenten, ':vakken' => $vakken));
 
        // Stuur de gebruiker door naar Connect.php
        header("Location: Connect.php");
        exit(); // Zorg ervoor dat het script stopt na de doorverwijzing
    } catch(PDOException $e) {
        echo "Fout bij toevoegen van cijfers: " . $e->getMessage();
    }
 
    // Sluit de databaseverbinding
    $conn = null;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cijfers Toevoegen</title>
</head>
<body>
 
<h2>Cijfers Toevoegen</h2>
 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="leerling">Leerling:</label>
    <input type="text" id="leerling" name="leerling" required><br>
 
    <label for="cijfers">Cijfers:</label>
    <input type="text" id="cijfers" name="cijfers" required><br>
 
    <label for="vakken">Vakken:</label>
    <input type="text" id="vakken" name="vakken" required><br>
 
    <label for="docenten">Docenten:</label>
    <input type="text" id="docenten" name="docenten" required><br>
 

    <input type="submit" value="Voeg Toe">
</form>
 
</body>
</html>
 