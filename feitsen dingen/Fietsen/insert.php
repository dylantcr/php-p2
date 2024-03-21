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
        $sql = "INSERT INTO fietsen (merk, type, prijs, foto,)
        VALUES (:merk, :type, :prijs, :foto,);";

        //prepare
        $stmt = $conn->prepare($sql);

        //uitvoeren
        $stmt->execute([
            ':merk'=>$_POST['merk'],
            ':type'=>$_POST['type'],
            ':prijs'=>$_POST['prijs'],
            ':foto'=>$_POST['foto'],
        ]);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fietsen Formulier</title>
</head>
<body>
    <h2>Voeg een fiets toe</h2>
    
    <form action="" method="post">
        <label for="merk">Merk:</label>
        <input type="text" name="merk" required><br>
        
        <label for="type">Type:</label>
        <input type="text" name="type" required><br>
        
        <label for="prijs">Prijs:</label>
        <input type="number" name="prijs" required><br>
        
        <label for="foto">Foto URL:</label>
        <input type="text" name="foto" required><br>

        <input type="submit" value="Voeg Fiets Toe">
    </form>
</body>
</html>
