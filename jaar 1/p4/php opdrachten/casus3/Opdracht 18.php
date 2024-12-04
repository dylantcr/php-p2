<?php
//auteur: D.Mahn
//functie: informatie ophalen van de bezoeker

$servername = "localhost"; 
$username = "root"; // Je database gebruikersnaam
$password = ""; // Je database wachtwoord
$dbname = "statistiekensysteem"; // De naam van je database

// Maak de database verbinding
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getCountryByIP($ip) {
    $api_key = '54928e88a87549e8af27b4be57b11548'; // Gebruik je API-sleutel
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey=$api_key&ip=$ip&fields=country_name";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Controleer op fouten of ongeldig antwoord
    if (curl_errno($ch) || $httpcode != 200) {
        curl_close($ch);
        return 'Onbekend'; // Standaard terugval als er een fout optreedt
    }

    curl_close($ch);
    $data = json_decode($response, true);
    return $data['country_name'] ?? 'Onbekend'; // Gebruik 'Onbekend' als het land niet gevonden kan worden
}


// Verzamel bezoekersinformatie
$ip_adres = $_SERVER['REMOTE_ADDR'];
$land = getCountryByIP($ip_adres); // Gebruik de functie om het land op te halen
$provider = gethostbyaddr($ip_adres); // Dit is een benadering
$browser = $_SERVER['HTTP_USER_AGENT'];
$datum_tijd = date('Y-m-d H:i:s');
$referer = $_SERVER['HTTP_REFERER'] ?? 'direct bezoek';

// SQL om een nieuwe record in te voegen
$sql = "INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer)
VALUES ('$land', '$ip_adres', '$provider', '$browser', '$datum_tijd', '$referer')";

if ($conn->query($sql) === TRUE) {
    echo "Nieuwe record succesvol toegevoegd";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>