<?php
function getDbConnection() {
    // Database host
    $host = 'localhost';

    // Database naam
    $dbname = 'news_website';

    // Database gebruikersnaam
    $user = 'root';

    // Database wachtwoord
    $pass = ''; // Lokale server zonder wachtwoord

    // Data Source Name
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    // Opties voor PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
}
?>
