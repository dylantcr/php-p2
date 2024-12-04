<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="opmaak.css">
</head>
<body>

    <!-- zoekveld -->
    <form method="GET">
        <input type="text" name="search_term" placeholder="Zoek in alle tabellen">
        <button type="submit">Zoek</button>
    </form>

    <?php
    // functie: CRUD bestelling met zoekveld
    // auteur: D.Mahn

    // verbinden
    include 'functions.php';

    // Zoekopdracht verwerking
    if(isset($_GET['search_term'])) {
        $search_term = $_GET['search_term'];
    }

    // Aanroep functie 
    crudbestelling();
    ?>

</body>
</html>
