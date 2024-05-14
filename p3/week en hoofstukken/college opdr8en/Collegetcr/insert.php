<?php

//auteur: Dylan Mahn
//functie: toevoegen van 1 fiets
   //testen
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Er is gepost<br>";
        print_r($_POST);
    

        //conect data
        include "connect.php";

        //maak een query
        $sql = "INSERT INTO fietsen (id, leerling, cijfer,)
        VALUES (:id, :leerling, :cijfer,);";

        //prepare
        $stmt = $conn->prepare($sql);

        //uitvoeren
        $stmt->execute([
            ':merk'=>$_POST['id'],
            ':type'=>$_POST['leerling'],
            ':prijs'=>$_POST['cijfer'],
        ]);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cijfer Formulier</title>
</head>
<body>
    <h2>Voeg cijfers toe</h2>
    
    <form action="" method="post">
        <label for="merk">id:</label>
        <input type="text" name="id" required><br>
        
        <label for="type">leerling:</label>
        <input type="text" name="tleerling" required><br>
        
        <label for="prijs">cijfer:</label>
        <input type="number" name="cijfer" required><br>
        
        <label for="foto">Foto URL:</label>
        <input type="text" name="foto" required><br>

        <input type="submit" value="Voeg Fiets Toe">
    </form>
</body>
</html>
