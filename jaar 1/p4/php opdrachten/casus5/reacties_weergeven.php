<?php
$host = 'localhost';
$db = 'reacties_db';
$user = 'root';
$pass = '';

// Maak een verbinding met de database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kan geen verbinding maken met de database: " . $e->getMessage());
}

// Reacties ophalen uit de database
$sql = "SELECT naam, bericht, datum FROM reacties ORDER BY datum DESC";
$stmt = $pdo->query($sql);
$reacties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reacties Weergeven</title>
</head>
<body>
    <h1>Reacties</h1>
    <?php foreach ($reacties as $reactie): ?>
        <div>
            <p><strong><?php echo htmlspecialchars($reactie['naam']); ?></strong> op <?php echo $reactie['datum']; ?></p>
            <p><?php echo $reactie['bericht']; ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>
