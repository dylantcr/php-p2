<?php
// Verbinding maken met de database en dieren ophalen
$conn = new PDO("mysql:host=localhost;dbname=dierentuin_gids", 'root', '');
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
                <li><a href="kaart.php">Attracties</a></li>
                <li><a href="dieren.php">Dieren</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="dieren-lijst">
        <h2>Onze Dieren</h2>
        <ul>
            <?php foreach ($dieren as $dier): ?>
                <li>
                    <a href="dier_detail.php?id=<?php echo $dier['id']; ?>"><?php echo $dier['naam']; ?></a> - 
                    <?php echo $dier['soort']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <footer>
        <p>&copy; 2024 Dierentuin Gids</p>
    </footer>
</body>
</html>
