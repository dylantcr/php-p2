<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dierentuin Gids - Kaart</title>
    <link rel="stylesheet" href="style.css">

    <!-- Voeg Leaflet CSS toe -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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

    <section id="kaart">
        <h2>Onze Dierentuin Kaart</h2>
        <p>Gebruik de interactieve kaart om door onze dierentuin te navigeren.</p>

        <!-- De interactieve kaart zal hier verschijnen -->
        <div id="map" style="height: 500px;"></div>

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            // Maak een nieuwe map aan
            var map = L.map('map').setView([52.0907, 5.1214], 13);  // Dit zijn voorbeeldcoördinaten (pas aan voor jouw dierentuinlocatie)

            // Voeg OpenStreetMap tegeltegels toe
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Voeg een marker toe voor de ingang van de dierentuin (verander de coördinaten naar jouw voorkeur)
            L.marker([52.0907, 5.1214]).addTo(map)
                .bindPopup("<b>Ingang Dierentuin</b><br>Welkom bij de dierentuin!")
                .openPopup();

            // Voeg meer markers toe voor andere locaties in de dierentuin
            L.marker([52.0915, 5.1230]).addTo(map)
                .bindPopup("<b>Leeuw</b><br>De koning van de jungle!");

            L.marker([52.0898, 5.1200]).addTo(map)
                .bindPopup("<b>Giraffe</b><br>De lange nekken!");
        </script>
    </section>

    <footer>
        <p>&copy; 2024 Dierentuin Gids</p>
    </footer>
</body>
</html>
