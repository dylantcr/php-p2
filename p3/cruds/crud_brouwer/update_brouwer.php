<?php
    // functie: update brouwer
    // auteur: D.Mahn
    
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updatebrouwer($_POST) == true){
            echo "<script>alert('brouwer is gewijzigd')</script>";
        } else {
            echo '<script>alert("brouwer is NIET gewijzigd")</script>';
        }
    }

    // Test of brouwcode is meegegeven in de URL
    if(isset($_GET['brouwcode'])){  
        // Haal alle info van de betreffende brouwcode $_GET['brouwcode']
        $brouwcode = $_GET['brouwcode'];
        $row = getbrouwer($brouwcode);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wbrouwcodeth=device-wbrouwcodeth, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig brouwer</title>
</head>
<body>
  <h2>Wijzig brouwer</h2>
  <form method="post">
    
    <input type="hidden" brouwcode="naam" name="brouwcode" required value="<?php echo $row['brouwcode']; ?>"><br>
    <label for="naam">naam:</label>
    <input type="text" brouwcode="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <label for="type">land:</label>
    <input type="text" brouwcode="land" name="land" required value="<?php echo $row['land']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_brouwer.php'>Home</a>
</body>
</html>

<?php
    } else {
        "Geen brouwcode opgegeven<br>";
    }
?>