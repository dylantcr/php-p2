<?php
//auteur: Dylan mahn
// Database configuratie
$servername = "localhost";
$username = "root"; // Gebruikersnaam van de database
$password = "";     // Wachtwoord van de database
$dbname = "case2";  // Naam van de database

try {
    // Maak een verbinding met de database met PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Stel de foutmodus in op uitzonderingen
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ontvang de gegevens van het formulier
    $titel = $_POST['title'];
    $inhoud = $_POST['content'];

    // Voeg het nieuwsbericht toe aan de database
    $sql = "INSERT INTO nieuwsberichten (titel, inhoud) VALUES (:titel, :inhoud)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':titel', $titel);
    $stmt->bindParam(':inhoud', $inhoud);
    $stmt->execute();

    // Stuur de gebruiker terug naar de adminpagina
    header("Location: adminpanel.php");
    exit();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
