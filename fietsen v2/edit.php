<?php
// Auteur: Dylan Mahn
// Functie: edit tabel
 

include "Connect.php";
 

if (isset($_GET['id'])) { 
   
    $id = htmlspecialchars($_GET['id']); 
 
 
    $sql = "SELECT * FROM fietsen WHERE id = :id"; // SQL-query om fietsgegevens op te halen op basis van de ID
    $stmt = $conn->prepare($sql); // Bereid de SQL-query voor
    $stmt->bindParam(':id', $id); // Bind de ID-parameter aan de query
    $stmt->execute(); // Voer de query uit
    $fiets = $stmt->fetch(PDO::FETCH_ASSOC); // Haal de fietsgegevens op en sla ze op in een associatieve array
 
    // Controleer op de fiets
    if (!$fiets) { 
        echo "Fiets niet gevonden."; 
        exit; // Stop 
    }
} else {
    echo "Geen fiets-ID opgegeven.";
    exit; // Stop 
}
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $merk = htmlspecialchars($_POST["merk"]); 
    $type = htmlspecialchars($_POST["type"]);
    $prijs = intval($_POST["prijs"]); 
 
    $sql = "UPDATE fietsen SET merk = :merk, type = :type, prijs = :prijs WHERE id = :id";
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(':merk', $merk); 
    $stmt->bindParam(':type', $type); 
    $stmt->bindParam(':prijs', $prijs); 
    $stmt->bindParam(':id', $id);
 
    // Voer de query uit
    if ($stmt->execute([
        ':merk' => $merk,
        ':type' => $type,
        ':prijs' => $prijs,
        ':id' => $id
    ])) {
      
        header("Location: Select.php?id=$id");
        exit(); 
    } else {
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
    <label for="type">Type:</label> <!-- Dit is een label voor het invoerveld 'Type' -->
    <input type="text" id="type" name="type" value="<?php echo $fiets['type']; ?>" required><br> <!-- Dit is een invoerveld voor het type van de fiets -->
 
    <label for="prijs">Prijs:</label> <!-- Dit is een label voor het invoerveld 'Prijs' -->
    <input type="number" id="prijs" name="prijs" value="<?php echo $fiets['prijs']; ?>" required><br> <!-- Dit is een invoerveld voor de prijs van de fiets -->
 
    <input type="submit" value="Bewaar Wijzigingen"> <!-- Dit is een knop om het formulier te verzenden -->
</form>
 
</body>
</html>
 
<?php
// Sluit de databaseverbinding
$conn = null;
?>