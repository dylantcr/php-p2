<?php
    // functie: update bestelling
    // auteur: D.Mahn

    require_once('functions.php');

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
    if(isset($_GET['bestelcode'])){  
        // Haal alle info van de betreffende bestelcode $_GET['bestelcode']
        $bestelcode = $_GET['bestelcode'];
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
    
    <input type="hidden" bestelcode="klantcode" name="bestelcode" required value="<?php echo $row['bestelcode']; ?>"><br>
    <label for="klantcode">klantcode:</label>
    <input type="text" bestelcode="klantcode" name="klantcode" required value="<?php echo $row['klantcode']; ?>"><br>

    <label for="productcode">productcode:</label>
    <input type="text" bestelcode="productcode" name="productcode" required value="<?php echo $row['productcode']; ?>"><br>

    <label for="aantal">aantal:</label>
    <input type="text" bestelcode="aantal" name="aantal" required value="<?php echo $row['aantal']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_bestelling.php'>Home</a>
</body>
</html>

<?php
    } else {
        "Geen bestelcode opgegeven<br>";
    }
?>