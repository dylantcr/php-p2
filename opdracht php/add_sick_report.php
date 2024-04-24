<?php
//auteur: D.Mahn
//functie: ziekmeldingen maken  

include 'db_connection.php'; // inclusief databaseverbinding

// Controleer of de benodigde gegevens zijn ontvangen via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_id = $_POST['teacher_id'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];

    // SQL-query om een nieuwe ziekmelding toe te voegen
    $sql = "INSERT INTO sick_reports (teacher_id, date, reason) VALUES ('$teacher_id', '$date', '$reason')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Ziekmelding succesvol toegevoegd";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ziekmelding Toevoegen</title>
</head>
<body>
    <h2>Ziekmelding Toevoegen</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        naam: <input type="text" name="teacher_id"><br><br>
        Datum: <input type="date" name="date"><br><br>
        Reden: <input type="text" name="reason"><br><br>
        <input type="submit" value="Toevoegen">
    </form>
    <a href="view_sick_reports.php">Bekijk Ziekmeldingen</a>

</body>
</html>