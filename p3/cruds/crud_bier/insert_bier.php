<?php
    // functie: formulier en database insert bier
    // auteur: Dmahn

    echo "<h1>Insert bier</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertbier($_POST) == true){
            echo "<script>alert('bier is toegevoegd')</script>";
        } else {
            echo '<script>alert("bier is NIET toegevoegd")</script>';
        }
    }
?>
<html>
<link rel="stylesheet" href="opmaak.css">
    <body>
        <form method="post">

        <label for="naam">naam:</label>
        <input type="text" biercode="naam" name="naam" required><br>

        <label for="soort">soort:</label>
        <input type="text" biercode="soort" name="soort" required><br>

        <label for="stijl">stijl:</label>
        <input type="text" biercode="stijl" name="stijl" required><br>

        <label for="alcohol">alcohol:</label>
        <input type="text" biercode="alcohol" name="alcohol" required><br>

    <?php
    dropDownbrouwer();
    ?>
  <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='crud_bier.php'>Home</a>
    </body>
</html>