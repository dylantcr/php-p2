<?php
// Auteur: Dylan Mahn
// Functie: Voeg dingen toe aan tabel
 
// Verbinding maken met de sql
include "Connect.php";
?>
 
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fietsenshop</title>
</head>
<body>
 
<h1 style="text-align: left;">Fietsenshop Dylan Mahn</h1>
 
<?php
// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $merk = htmlspecialchars($_POST["merk"]); 
    $type = htmlspecialchars($_POST["type"]); 
    $prijs = intval($_POST["prijs"]); 
 
    $sql = "INSERT INTO fietsen (merk, type, prijs) VALUES (:merk, :type, :prijs)"; 
    $stmt = $conn->prepare($sql);
 
    $stmt->bindParam(':merk', $merk); 
    $stmt->bindParam(':type', $type); 
    $stmt->bindParam(':prijs', $prijs); 
 
    // Voer de query uit
    if ($stmt->execute()) { 
        
        echo "Gegevens zijn toegevoegd aan de database.";
    } else {
        
        echo "Er is een fout opgetreden bij het toevoegen van gegevens aan de database.";
    }
}
 
// Maak een query om gegevens op te halen
$sql = "SELECT * FROM fietsen"; 
// Prepare query
$stmt = $conn->prepare($sql); 
// Uitvoeren
$stmt->execute();
// Ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 
if (!empty($result)) {
    // Print de data rij voor rij
    echo "<br>";
    echo "<div style='text-align: left;'><a href='insert.php'>Fiets toevoegen</a></div><br><br>";
    echo "<table border=1px>";
    // Eerste rij voor kolomnamen, inclusief een kolom voor het verwijderen
    echo "<thead><tr><th>Merk</th><th>Type</th><th>Prijs</th><th>Wijzig</th><th>Verwijderen</th><th>ID</th></tr></thead>";
    foreach ($result as $row) {
       // Controleer of de prijs niet leeg is voordat je de rij afdrukt
if (!empty($row['prijs'])) {
    echo "<tr>";
    echo "<td>" . $row['merk'] . "</td>"; 
    echo "<td>" . $row['type'] . "</td>"; 
    echo "<td>" . $row['prijs'] . "</td>"; 
    echo "<td><a href='edit.php?id=" . $row['id'] . "'>Wijzig</a></td>"; 
    echo "<td><form method='post'><button type='submit' name='verwijderen' value='" . $row['id'] . "' style='background-color: white; color: blue; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px;'>Verwijderen</button></form></td>";
    echo "<td>" . $row['id'] . "</td>"; 
   
    echo "</tr>";
}
    }
    echo "</table>";
} else {
    echo "Geen gegevens gevonden in de database.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verwijderen'])) {

    $verwijder_id = htmlspecialchars($_POST['verwijderen']);
 
    $sql_delete = "DELETE FROM fietsen WHERE id = :verwijder_id"; 
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bindParam(':verwijder_id', $verwijder_id); 
 
    // Voer de DELETE-query uit
    if ($stmt_delete->execute()) { 
        // Vernieuw de pagina
        header("Refresh:0"); 
        exit(); 
    } else {
      
        echo "Er is een fout opgetreden bij het verwijderen van de fiets.";
    }
}
// Sluit de databaseverbinding
$conn = null;
?>
 
</body>
</html>
 