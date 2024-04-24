<?php
// auteur: D.Mahn
// functie: verwijder een bestelling op basis van de bestelcode
include 'functionsproducten.php';

// Haal bestelling uit de database
if(isset($_GET['productcode'])){

    // test of insert gelukt is
    if(deletebestelling($_GET['productcode']) == true){
        echo '<script>alert("productcode: ' . $_GET['productcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('crud_producten.php'); </script>";
    } else {
        echo '<script>alert("product is NIET verwijderd")</script>';
    }
}
?>

