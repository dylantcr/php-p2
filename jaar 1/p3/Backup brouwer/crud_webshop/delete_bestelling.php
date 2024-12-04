<?php
// auteur: D.Mahn
// functie: verwijder een bestelling op basis van de bestelcode
include 'functions.php';

// Haal bestelling uit de database
if(isset($_GET['bestelcode'])){

    // test of insert gelukt is
    if(deletebestelling($_GET['bestelcode']) == true){
        echo '<script>alert("bestelcode: ' . $_GET['bestelcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('crud_bestelling.php'); </script>";
    } else {
        echo '<script>alert("bestelling is NIET verwijderd")</script>';
    }
}
?>

