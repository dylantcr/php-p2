<?php
    // functie: update bestelling
    // auteur: D.Mahn

    require_once('functionsproducten.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updatebestelling($_POST) == true){
            echo "<script>alert('bestelling is gewijzigd')</script>";
        } else {
            echo '<script>alert("bestelling is NIET gewijzigd")</script>';
        }
    }

    // Test of bestelcode is meegegeven in de URL
    if(isset($_GET['productcode'])){  
        // Haal alle info van de betreffende bestelcode $_GET['bestelcode']
        $bestelcode = $_GET['productcode'];
        $row = getbestelling($bestelcode);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig bestelling</title>
  <link rel="stylesheet" href="opmaak.css">
</head>
<body>
  <h2>Wijzig bestelling</h2>
  <form method="post">
    
  <label for="productcode">productcode:</label>
        <input type="text" bestelcode="productcode" name="productcode" required><br>

        <label for="naam">naam:</label>
        <input type="text" bestelcode="naam" name="naam" required><br>

        <label for="merk">merk:</label>
        <input type="merk" bestelcode="merk" name="merk" required><br>

        <label for="prijs">prijs:</label>
        <input type="prijs" bestelcode="prijs" name="prijs" required><br>
        
        <label for="foto">foto:</label>
        <input type="foto" bestelcode="foto" name="foto" required><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_producten.php'>Home</a>
</body>
</html>

<?php
    } else {
        "Geen bestelcode opgegeven<br>";
    }
?>