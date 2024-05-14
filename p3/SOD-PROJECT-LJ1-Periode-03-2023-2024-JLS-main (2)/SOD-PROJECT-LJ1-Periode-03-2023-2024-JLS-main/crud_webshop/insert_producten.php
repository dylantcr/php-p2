<?php
    // functie: formulier en database insert bestelling
    // auteur: Dmahn

    echo "<h1>Insert bestelling</h1>";

    require_once('functionsproducten.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertbestelling($_POST) == true){
            echo "<script>alert('bestelling is toegevoegd')</script>";
        } else {
            echo '<script>alert("bestelling is NIET toegevoegd")</script>';
        }
    }
?>
<html>
<link rel="stylesheet" href="opmaak.css">
    <body>
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

  <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='crud_bestelling.php'>Home</a>
    </body>
</html>