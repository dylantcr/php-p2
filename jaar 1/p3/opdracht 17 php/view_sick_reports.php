<?php
//auteur: D.Mahn
//functie: het zien van de de ziekmeldingen en ze kunnen verwijderen

include 'db_connection.php'; // inclusief databaseverbinding

// SQL-query om alle ziekmeldingen op te halen
$sql = "SELECT * FROM sick_reports";
$result = $conn->query($sql);

// Als een ziekmelding verwijderd moet worden
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM sick_reports WHERE report_id = $delete_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Ziekmelding succesvol verwijderd";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($result->num_rows > 0) {
    // Output van de ziekmeldingen in een tabel
    echo "<table><tr><th>Docent ID</th><th>Datum</th><th>Reden</th><th>Actie</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["teacher_id"]."</td>";
        echo "<td>".$row["date"]."</td>";
        echo "<td>".$row["reason"]."</td>";
        echo "<td><a href='view_sick_reports.php?delete_id=".$row['report_id']."'>Verwijder</a></td>"; // Verwijder link
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Geen ziekmeldingen gevonden";
}
?>
<a href="add_sick_report.php">Bekijk Ziekmeldingen</a>
