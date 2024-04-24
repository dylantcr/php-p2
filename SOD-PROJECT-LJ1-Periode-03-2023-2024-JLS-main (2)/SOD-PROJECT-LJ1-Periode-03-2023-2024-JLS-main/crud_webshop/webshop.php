<!DOCTYPE html>
<html>
<head>
    <title>Schoenen Webshop</title>
    <style>
        /* Stijl voor productweergave */
        h1 {
            text-align: center;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 0 -10px; /* Voeg negatieve marge toe om de container uit te breiden */
        }
        .product {
            border: 1px solid #ccc;
            margin: 10px; /* Voeg 10px marge toe rond elk product */
            padding: 10px;
            width: calc(33.33% - 20px); /* Ongeveer 1/3 van de beschikbare ruimte minus marges */
            text-align: center;
        }
        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product h3 {
            margin: 5px 0;
        }
        .product p {
            margin: 5px 0;
        }
        .product button {
            background-color: gray;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .product button:hover {
            background-color:  black;
        }
        .search-container {
            margin-bottom: 20px;
        }
        .search-container select {
            padding: 5px;
            font-size: 16px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="index.html">Home</a>
        <a href="webshop.php">Producten</a>
        <a href="overons.html">Over Ons</a>
        <a href="crud_bestelling.php">Bestelling </a>
        <a href="crud_producten.php">Product toevoegen </a>
        <a class="active" href="contact.html">Contact</a>
        <a href="login&registreer/login.php" style="float: right;">Inloggen</a>
        <a href="login&registreer/register.php" style="float: right;">register</a>
    </div>

    <h1>De collectie</h1>

    <div class="search-container">
        <label for="merk">Filter op merk:</label>
        <select id="merk" onchange="filterProducten()">
            <option value="">Alle merken</option>
            <?php
            include 'connect.php';

            // Query om unieke merken op te halen
            $sql = "SELECT DISTINCT merk FROM product";
            $result = $conn->query($sql);

            // Controleren of er resultaten zijn
            if ($result->rowCount() > 0) {
                // Opties voor dropdownmenu weergeven
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["merk"] . "'>" . $row["merk"] . "</option>";
                }
            }
            ?>
        </select>

        <label for="sorteer">Sorteer op:</label>
        <select id="sorteer" onchange="filterProducten()">
            <option value="naam_asc">Naam (A-Z)</option>
            <option value="naam_desc">Naam (Z-A)</option>
            <option value="prijs_asc">Prijs (laag naar hoog)</option>
            <option value="prijs_desc">Prijs (hoog naar laag)</option>
        </select>
    </div>

    <div class="products-container">
        <?php
        // Query om producten op te halen
        $sql = "SELECT * FROM product";
        $stmt = $conn->query($sql);

        // Controleren of er resultaten zijn
        if ($stmt->rowCount() > 0) {
            // Producten weergeven
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product'>";
                echo "<img src='img/" . $row["foto"] . "' alt='" . $row["naam"] . "'>";
                echo "<h3>" . $row["merk"] . "</h3>";
                echo "<h3>" . $row["naam"] . "</h3>";
                echo "<p>Prijs: $" . $row["prijs"] . "</p>";
                echo "<p>Maat: ";
                echo "<select>";
                for ($i = 35; $i <= 50; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                echo "</select>";
                echo "</p>";
                echo "<button>Koop nu</button>";
                echo "</div>";
            }
        } else {
            echo "Geen producten gevonden.";
        }

        // Geen close() nodig voor PDO-verbindingen
        ?>
    </div>

    <script>
        function filterProducten() {
            var merk = document.getElementById("merk").value;
            var sorteer = document.getElementById("sorteer").value;
            var producten = document.querySelectorAll(".product");

            producten.forEach(function(product) {
                var productMerk = product.querySelector("h3:nth-child(1)").innerText;
                var productPrijs = parseFloat(product.querySelector("p").innerText.replace("Prijs: $", ""));

                var merkFilter = merk == "" || productMerk == merk;
                var naamFilter = true;
                var prijsFilter = true;

                if (sorteer == "naam_asc") {
                    naamFilter = product.querySelector("h3:nth-child(3)").innerText.toLowerCase() > product.nextElementSibling.querySelector("h3:nth-child(3)").innerText.toLowerCase();
                } else if (sorteer == "naam_desc") {
                    naamFilter = product.querySelector("h3:nth-child(3)").innerText.toLowerCase() < product.nextElementSibling.querySelector("h3:nth-child(3)").innerText.toLowerCase();
                } else if (sorteer == "prijs_asc") {
                    prijsFilter = productPrijs > parseFloat(product.nextElementSibling.querySelector("p").innerText.replace("Prijs: $", ""));
                } else if (sorteer == "prijs_desc") {
                    prijsFilter = productPrijs < parseFloat(product.nextElementSibling.querySelector("p").innerText.replace("Prijs: $", ""));
                }

                if (merkFilter && naamFilter && prijsFilter) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        }
    </script>
</body
