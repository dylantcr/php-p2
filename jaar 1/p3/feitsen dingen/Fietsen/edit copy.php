<?php
// Auteur: Dylan Mahn
// Functie: Bewerk gegevens in de database
 
// Verbinding maken met de database
include "Connect.php";
 
// Controleer of er een ID is meegegeven via de URL
if (isset($_GET['id'])) {
    // Ontvang en beveilig de ID van de fiets die moet worden bewerkt
    $id = htmlspecialchars($_GET['id']);
 
    // Bereid een query voor om de gegevens van de fiets op te halen op basis van de ID
    $sql = "SELECT * FROM Fietsenmaker WHERE id = :id"; // Change 'fiets_id' to 'id'
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $fiets = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // Controleer of de fiets is gevonden
    if (!$fiets) {
        echo "Fiets niet gevonden.";
        exit;
    }
} else {
    echo "Geen fiets-ID opgegeven.";
    exit;
}
 
// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formuliergegevens ophalen en valideren (aanvullende validatie is aan te bevelen)
    $merk = htmlspecialchars($_POST["merk"]);
    $type = htmlspecialchars($_POST["type"]);
    $prijs = intval($_POST["prijs"]);
 
    // Voorbereiden en uitvoeren van de SQL-query om gegevens bij te werken
    $sql = "UPDATE Fietsenmaker SET merk = :merk, type = :type, prijs = :prijs WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':merk', $merk);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':prijs', $prijs);
    $stmt->bindParam(':id', $id);
 
    // Voer de query uit
    if ($stmt->execute([
        ':id' => $_GET['id']
    ])) {
        // Melding weergeven als de gegevens zijn bijgewerkt
        echo "Gegevens zijn bijgewerkt in de database.";
    } else {
        // Melding weergeven als er een fout optrad bij het bijwerken van gegevens
        echo "Er is een fout opgetreden bij het bijwerken van gegevens in de database.";
    }
   
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Fiets</title>
</head>
<body>
 
<h2>Bewerk Fiets</h2>
 
<form action="" method="post">
    <label for="merk">Merk:</label>
    <input type="text" id="merk" name="merk" value="<?php echo $fiets['merk']; ?>" required><br>
 
    <label for="type">Type:</label>
    <input type="text" id="type" name="type" value="<?php echo $fiets['type']; ?>" required><br>
 
    <label for="prijs">Prijs:</label>
    <input type="number" id="prijs" name="prijs" value="<?php echo $fiets['prijs']; ?>" required><br>
 
    <input type="submit" value="Bewaar Wijzigingen">
</form>
 
</body>
</html>
 
<?php
// Sluit de databaseverbinding
$conn = null;
?>
 