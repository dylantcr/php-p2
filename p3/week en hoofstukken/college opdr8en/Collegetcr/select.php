<?php
//auteur: Dylan Mahn
//Functie: selecteer functie

//conect data
include "connect.php";

//maak een query
$sql = "SELECT * FROM cijfers";

//prepare
$stmt = $conn->prepare($sql);

//uitvoeren
$stmt->execute();

//ophalen
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($result);

//print de data rij voor rij
echo "<br>";
echo "<table border=1px>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>leerling</th>";
echo "<th>cijfer</th>";
echo "</tr>";
;
foreach ($result as $row) {
    echo "<tr>";
   
    echo "<td>" . $row['id'] .  "</td>";
    echo "<td>" . $row['leerling'] .  "</td>";
    echo "<td>" . $row['cijfer'] .  "</td>";
    echo "<td><a href='edit.php?id=" . $row['id'] . "'>"  . "Wijzig</a></td>";
    echo "<tr>";
}
 