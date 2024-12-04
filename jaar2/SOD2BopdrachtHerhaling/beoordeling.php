<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verbinding maken met de database
    $conn = new PDO("mysql:host=localhost;dbname=dierentuin_gids", 'root', '');
    $dier_id = $_POST['dier_id'];
    $beoordeling = $_POST['beoordeling'];
    $opmerking = $_POST['opmerking'];

    // Invoegen van de beoordeling in de database
    $query = "INSERT INTO beoordelingen (dier_id, beoordeling, opmerking) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$dier_id, $beoordeling, $opmerking]);

    // Terug naar de detailpagina van het dier
    header("Location: dier_detail.php?id=" . $dier_id);
    exit();
}
?>