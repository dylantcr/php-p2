<?php
    //auteur: D.Mahn
    //functie: server instellingen, voorbeelden PDO connectie
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gastenboek";

    // connectiem maken met de PDO.
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>