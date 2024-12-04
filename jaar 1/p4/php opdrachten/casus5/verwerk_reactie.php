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

// Invoer valideren en veilig opslaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = htmlspecialchars($_POST['naam']);
    $email = htmlspecialchars($_POST['email']);
    $bericht = htmlspecialchars($_POST['bericht']);

    // Scheldwoorden filteren
    $scheldwoorden = ['slechtwoord1', 'slechtwoord2']; // Voeg hier de ongewenste woorden toe
    foreach ($scheldwoorden as $woord) {
        $bericht = str_ireplace($woord, '***', $bericht);
    }

    // BBCode omzetten naar HTML
    $bericht = preg_replace('/\[b\](.*?)\[\/b\]/s', '<strong>$1</strong>', $bericht);
    $bericht = preg_replace('/\[u\](.*?)\[\/u\]/s', '<u>$1</u>', $bericht);
    $bericht = preg_replace('/\[color=(.*?)\](.*?)\[\/color\]/s', '<span style="color:$1;">$2</span>', $bericht);
    $bericht = preg_replace('/\[size=(.*?)\](.*?)\[\/size\]/s', '<span style="font-size:$1px;">$2</span>', $bericht);

    // Smileys omzetten naar afbeeldingen
    $bericht = str_replace(':)', '<img src="smile.png" alt=":)" />', $bericht);
    $bericht = str_replace(':(', '<img src="sad.png" alt=":(" />', $bericht);

    // Reactie opslaan in de database
    $sql = "INSERT INTO reacties (naam, email, bericht) VALUES (:naam, :email, :bericht)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['naam' => $naam, 'email' => $email, 'bericht' => $bericht]);

    header("Location: reacties_weergeven.php");
    exit();
}
?>
