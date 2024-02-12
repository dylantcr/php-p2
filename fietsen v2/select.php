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
 
<h1 style="text-align: left;">Fietsenshop</h1>
 
<?php
// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formuliergegevens ophalen en valideren (aanvullende validatie is aan te bevelen)
    $merk = htmlspecialchars($_POST["merk"]); // Haalt de ingediende waarde van het formulier op voor 'merk' en beveiligt deze tegen HTML-injectie
    $type = htmlspecialchars($_POST["type"]); // Haalt de ingediende waarde van het formulier op voor 'type' en beveiligt deze tegen HTML-injectie
    $prijs = intval($_POST["prijs"]); // Haalt de ingediende waarde van het formulier op voor 'prijs' en zet deze om naar een geheel getal
 
    // Voorbereiden en uitvoeren van de SQL-query om gegevens toe te voegen
    $sql = "INSERT INTO fietsen (merk, type, prijs) VALUES (:merk, :type, :prijs)"; // SQL-query om gegevens in de database toe te voegen
    $stmt = $conn->prepare($sql); // Voorbereiden van de SQL-query voor uitvoering
 
    // Bind de waarden aan de queryparameters
    $stmt->bindParam(':merk', $merk); // Bind de waarde van 'merk' aan de queryparameter ':merk'
    $stmt->bindParam(':type', $type); // Bind de waarde van 'type' aan de queryparameter ':type'
    $stmt->bindParam(':prijs', $prijs); // Bind de waarde van 'prijs' aan de queryparameter ':prijs'
 
    // Voer de query uit
    if ($stmt->execute()) { // Controleert of de query succesvol is uitgevoerd
        // Melding weergeven als de gegevens zijn toegevoegd
        echo "Gegevens zijn toegevoegd aan de database.";
    } else {
        // Melding weergeven als er een fout optrad bij het toevoegen van gegevens
        echo "Er is een fout opgetreden bij het toevoegen van gegevens aan de database.";
    }
}
 
// Maak een query om gegevens op te halen
$sql = "SELECT * FROM fietsen"; // SQL-query om alle gegevens op te halen uit de tabel 'Fietsenmaker'
// Prepare query
$stmt = $conn->prepare($sql); // Voorbereiden van de SQL-query voor uitvoering
// Uitvoeren
$stmt->execute(); // Uitvoeren van de voorbereide query
// Ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Ophalen van alle resultaten als associatieve array
 
// Controleer of de resultaten niet leeg zijn voordat je de tabel afdrukt
if (!empty($result)) {
    // Print de data rij voor rij
    echo "<br>";
    echo "<div style='text-align: left;'><a href='insecrt.php'>Fiets toevoegen</a></div><br><br>";
    echo "<table border=1px>";
    // Eerste rij voor kolomnamen, inclusief een kolom voor het verwijderen
    echo "<thead><tr><th>Merk</th><th>Type</th><th>Prijs</th><th>Wijzig</th><th>Verwijderen</th><th>ID</th></tr></thead>";
    foreach ($result as $row) {
       // Controleer of de prijs niet leeg is voordat je de rij afdrukt
if (!empty($row['prijs'])) {
    echo "<tr>";
    echo "<td>" . $row['merk'] . "</td>"; // Toont de waarde van 'merk' in de huidige rij
    echo "<td>" . $row['type'] . "</td>"; // Toont de waarde van 'type' in de huidige rij
    echo "<td>" . $row['prijs'] . "</td>"; // Toont de waarde van 'prijs' in de huidige rij
    echo "<td><a href='edit.php?id=" . $row['id'] . "'>Wijzig</a></td>"; // Toont een hyperlink om de gegevens van deze rij te wijzigen
    echo "<td><form method='post'><button type='submit' name='verwijderen' value='" . $row['id'] . "' style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px;'>Verwijderen</button></form></td>"; // Toont een knop om de rij te verwijderen
    echo "<td>" . $row['id'] . "</td>"; // Toont de waarde van 'id' in de huidige rij
   
    echo "</tr>";
}
    }
    echo "</table>";
} else {
    echo "Geen gegevens gevonden in de database."; // Melding weergeven als er geen gegevens zijn gevonden in de database
}
 
// Controleer of er een POST-verzoek is gedaan om een fiets te verwijderen
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verwijderen'])) {
    // Ontvang de ID van de fiets die moet worden verwijderd en valideer deze
    $verwijder_id = htmlspecialchars($_POST['verwijderen']);
 
    // Bereid een SQL DELETE-query voor om de fiets met de opgegeven ID te verwijderen
    $sql_delete = "DELETE FROM fietsen WHERE id = :verwijder_id"; // SQL-query om een rij te verwijderen uit de tabel 'Fietsenmaker' op basis van de ID
    $stmt_delete = $conn->prepare($sql_delete); // Voorbereiden van de SQL-query voor uitvoering
    $stmt_delete->bindParam(':verwijder_id', $verwijder_id); // Bind de waarde van 'verwijder_id' aan de queryparameter ':verwijder_id'
 
    // Voer de DELETE-query uit
    if ($stmt_delete->execute()) { // Controleert of de query succesvol is uitgevoerd
        // Vernieuw de pagina
        header("Refresh:0"); // Vernieuwt de pagina na 0 seconden
        exit(); // Stop het script om verdere uitvoering te voorkomen
    } else {
        // Melding weergeven als er een fout optrad bij het verwijderen van de fiets
        echo "Er is een fout opgetreden bij het verwijderen van de fiets.";
    }
}
// Sluit de databaseverbinding
$conn = null; // Sluit de databaseverbinding om resources vrij te geven
?>
 
</body>
</html>
 