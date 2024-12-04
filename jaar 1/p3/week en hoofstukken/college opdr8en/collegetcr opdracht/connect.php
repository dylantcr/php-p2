<?php
// Auteur: Dylan Mahn
// Functie: connectie maken met de database college
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "collegetcr";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
// Query om gegevens uit de database te halen
$query = "SELECT id, leerling, cijfer FROM cijfers";
 
// Voer de query uit
try {
    $stmt = $conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    // Laat de resultaten zien
    if ($result) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Leerling</th><th>Cijfers</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['leerling']."</td>";
            echo "<td>".$row['cijfer']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Geen resultaten gevonden";
    }
} catch(PDOException $e) {
    echo "Query mislukt: " . $e->getMessage();
}
 
// Sluit de databaseverbinding
$conn = null;
?>