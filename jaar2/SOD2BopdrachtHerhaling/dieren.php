<?php
// Verbinding maken met de database
$host = 'localhost';
$db = 'dierentuin_gids';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    die();
}


// Ophalen van de dieren uit de database
$query = "SELECT * FROM dieren";
$stmt = $conn->prepare($query);
$stmt->execute();
$dieren = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dieren - Dierentuin Gids</title>
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

    <section id="dieren-lijst">
        <h2>Onze Dieren</h2>
        <?php foreach ($dieren as $dier): ?>
            <div class="dier-item">
                <img src="<?php echo $dier['afbeelding']; ?>" alt="<?php echo $dier['naam']; ?>">
                <h3><?php echo $dier['naam']; ?></h3>
                <p><?php echo $dier['soort']; ?></p>
                <a href="dierDetail.php?id=<?php echo $dier['id']; ?>" class="lees-meer">Lees meer</a>

            </div>
        <?php endforeach; ?>
    </section>

    <footer>
        <p>&copy; 2024 Dierentuin Gids</p>
    </footer>
</body>
</html>
