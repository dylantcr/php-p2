<?php
//Auteur: Dylan Mahn
//Functie: selecteer datas
 
//connect database
include "connect.php";
 
//Maak een query
$sql = "SELECT * FROM fietsen";
//Prepare query
$stmt = $conn->prepare($sql);
//Uitvoeren
$stmt-> execute();
//Ophalen alle data
$result =  $stmt-> fetchAll(PDO::FETCH_ASSOC);
 
//var_dump($resultt);
 
//print de data rij voor rij
echo "<br>";
echo "<table border=1px>";
echo "<tr>";
echo "<th>merk</th>";
echo "<th>type</th>";
echo "<th>prijs</th>";
echo "<th>id</th>";
echo "<th>foto</th>";
echo "</tr>";
;
foreach ($result as $row) {
    echo "<tr>";
   
    echo "<td>" . $row['merk'] .  "</td>";
    echo "<td>" . $row['type'] .  "</td>";
    echo "<td>" . $row['prijs'] .  "</td>";
    echo "<td><a href='edit.php?id=" . $row['id'] . "'>"  . "Wijzig</a></td>";
    echo "<td>" . $row['id'] .  "</td>";
    echo "<tr>";
}
 
?>
