<?php
// db.php
// Database configuratie
$host = 'localhost';
$db = 'calculator';
$user = 'root'; // Pas aan naar jouw databasegebruikersnaam
$pass = ''; // Pas aan naar jouw databasewachtwoord
$charset = 'utf8mb4';
// DSN (Data Source Name) configuratie
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
// Probeer verbinding te maken met de database
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
