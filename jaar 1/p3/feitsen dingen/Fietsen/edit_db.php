<?php

//auteur: Dylan Mahn
//functie: data fiets update in database

//test of er data gepost is
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    print_r($_POST);
 
    // doe update in de database
    // UPDATE 'fietsen' SET 'prijs' = '700'
    // WHERE 'fietsen' . 'id' = '1'
 
    //connect database
    include "connect.php";
 
    //Maak een query
    $sql = "
        UPDATE fietsen SET
        merk = :merk,
        type = :type,
        prijs = :prijs
    WHERE id = :id";
 
    //Prepare query
    $stmt = $conn->prepare($sql);
    //Uitvoeren
    $stmt->execute([
        ':merk'=>$_POST['merk'],
        ':type'=>$_POST['type'],
        ':prijs'=>$_POST['prijs'],
        ':id'=>$_POST['id']
        ]);
 
        header("Location: crud.php");
            exit("Location: crud.php");
    }else {
        echo "Update is fout gegaan<br>";
    
 
        //Ophalen alle data
        $result =  $stmt-> fetch(PDO::FETCH_ASSOC);
}

?>