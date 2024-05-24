<?php
//auteur: Dylan mahn
//functie: verwijderen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuratie
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "case2";

    try {
        // Maak een verbinding met de database met PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Stel de foutmodus in op uitzonderingen
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verkrijg de geposte gegevens
        $id = $_POST['id'];

        // Delete query
        $sql = "DELETE FROM nieuwsberichten WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Succes";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
} else {
    echo "Ongeldige aanvraag.";
}
?>
