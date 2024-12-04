<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="opmaak.css">
</head>
<body>
<style>
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
    </style>
<div class="navbar">
        <a href="index.html">Home</a>
        <a href="webshop.php">Producten</a>
        <a href="overons.html">Over Ons</a>
        <a href="crud_bestelling.php">Bestelling </a>
        <a href="crud_producten.php">Product toevoegen </a>

        <a class="active" href="contact.html">Contact</a>
        <a href="login.php" style="float: right;">Inloggen</a>
        <a href="register" style="float: right;">register</a>
    </div>
    <?php
    // functie: Programma CRUD bestelling
    // auteur: D.Mahn

    // Initialisatie
    include 'functionsproducten.php';

    // Main

    // Aanroep functie 
    crudbestelling();
    ?>

</body>
</html>



