<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastpagina</title>
    <style>
        /* Stijl voor het modale venster */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Maakt de achtergrond wazig */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        /* Stijl voor de nieuwsbericht knoppen */
        .news-btn {
            display: block;
            margin: 0 auto;
            margin-bottom: 10px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Nieuwsberichten</h1>
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

        // Query om nieuwsberichten op te halen
        $sql = "SELECT * FROM nieuwsberichten";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Als er nieuwsberichten zijn, toon deze als knoppen
        if ($stmt->rowCount() > 0) {
            // Output data van elke rij
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<button class="news-btn" onclick="openModal(\''. addslashes($row["inhoud"]) .'\')">' . $row["titel"] . '</button>';
            }
        } else {
            echo "Geen nieuwsberichten gevonden.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>

    <!-- Het modale venster voor het weergeven van het volledige nieuwsbericht -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="newsContent"></p>
        </div>
    </div>

    <script>
        // Open het modale venster met het volledige nieuwsbericht
        function openModal(content) {
            var modal = document.getElementById('myModal');
            modal.style.display = "block";
            document.getElementById('newsContent').innerHTML = content;
        }

        // Sluit het modale venster
        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = "none";
        }

        // Sluit het modale venster als er buiten het venster wordt geklikt
        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
