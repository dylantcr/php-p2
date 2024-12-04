<?php
// Verbinding maken met de database en gegevens ophalen van het geselecteerde dier
$host = 'localhost';
$dbname = 'dierentuin_gids';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id']; // Dier ID uit de URL
$query = "SELECT * FROM dieren WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$dier = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dier['naam']; ?> - Detailpagina</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welkom bij de Dierentuin Gids</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="kaart.php">Kaart</a></li>
                <li><a href="dieren.php">Dieren</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="dier-detail">
        <h2><?php echo $dier['naam']; ?></h2>
        <p><strong>Soort:</strong> <?php echo $dier['soort']; ?></p>
        <p><strong>Beschrijving:</strong> <?php echo $dier['beschrijving']; ?></p>

        <!-- Beoordelingsformulier -->
        <h3>Laat een beoordeling achter:</h3>
        <form method="post" action="beoordeling.php">
            <input type="hidden" name="dier_id" value="<?php echo $dier['id']; ?>">
            <label for="beoordeling">Beoordeling (1-5):</label>
            <input type="number" name="beoordeling" min="1" max="5" required><br>
            <label for="opmerking">Opmerking:</label>
            <textarea name="opmerking" rows="4" cols="50"></textarea><br>
            <button type="submit">Verstuur Beoordeling</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Dierentuin Gids</p>
    </footer>
</body>
</html>
