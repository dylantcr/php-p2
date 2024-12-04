<?php
// auteur: D.mahn
// functie: algemene functies tbv hergebruik
 
include_once "config.php";
 
function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 
}
 
// selecteer de data uit de opgeven table
function getData($table){
    // Connect database
    $conn = connectDb();
 
    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
 
    return $result;
}
 
// selecteer de rij van de opgeven bestelcode uit de table bestelling
function getbestelling($bestelcode){
    // Connect database
    $conn = connectDb();
 
    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE bestelcode = :bestelcode";
    $query = $conn->prepare($sql);
    $query->execute([':bestelcode'=>$bestelcode]);
    $result = $query->fetch();
 
    return $result;
}
 
 
function ovzbestelling(){
 
    // Haal alle bestelling record uit de tabel
    $result = getData(CRUD_TABLE);
   
    //print table
    printTable($result);
   
}
 
 
// Function 'PrintTable' print een HTML-table met data uit $result.
function printTable($result){
    // Zet de hele table in een variable $table en print hem 1 keer
    $table = "<table>";
 
    // Print header table
 
    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";  
    }
 
    // print elke rij van de tabel
    foreach ($result as $row) {
       
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";
 
    echo $table;
}
 
 
function crudbestelling(){
 
    // Menu-item   insert
    $txt = "
    <h1>Crud bestelling</h1>
    <nav>
        <a href='insert_bestelling.php'>Toevoegen nieuwe bestelling</a>
    </nav><br>";
    echo $txt;
 
    // Haal alle bestelling record uit de tabel
    $result = getData(CRUD_TABLE);
 
    //print table
    printCrudbestelling($result);
   
}
 
// Function 'printCrudbestelling' print een HTML-table met data uit $result
// en een wzg- en -verwijder-knop.
function printCrudbestelling($result){
    // Zet de hele table in een variable en print hem 1 keer
    $table = "<table>";
 
    // Print header table
 
    // haal de kolommen uit de eerste rij [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";
    }
    // Voeg actie kopregel toe
    $table .= "<th colspan=2>Actie</th>";
    $table .= "</th>";
 
    // print elke rij
    foreach ($result as $row) {
       
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";  
        }
       
        // Wijzig knopje
        $table .= "<td>
            <form method='post' action='update_bestelling.php?bestelcode=$row[bestelcode]' >      
                <button>Wzg</button>    
            </form></td>";
 
        // Delete knopje
        $table .= "<td>
            <form method='post' action='delete_bestelling.php?bestelcode=$row[bestelcode]' >      
                <button>Verwijder</button>  
            </form></td>";
 
        $table .= "</tr>";
    }
    $table.= "</table>";
 
    echo $table;
}
 
 
function updatebestelling($row){
 
    // Maak database connectie
    $conn = connectDb();
 
    // Maak een query
    $sql = "UPDATE " . CRUD_TABLE .
    " SET
        klantcode = :klantcode,
        productcode = :productcode,
        aantal = :aantal
    WHERE bestelcode = :bestelcode
    ";
 
    // Prepare query
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':klantcode'=>$row['klantcode'],
        ':productcode'=>$row['productcode'],
        ':aantal'=>$row['aantal'],
        ':bestelcode'=>intval($row['bestelcode']) // Convert to integer
    ]);
 
    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}
 
function insertbestelling($post){
    // Maak database connectie
    $conn = connectDb();
 
    // Maak een query
    $sql = "
        INSERT INTO " . CRUD_TABLE . " (klantcode, productcode, aantal)
        VALUES (:klantcode, :productcode, :aantal)
    ";
 
    // Prepare query
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':klantcode'=>$_POST['klantcode'],
        ':productcode'=>$_POST['productcode'],
        ':aantal'=>$_POST['aantal'],
    ]);
 
   
    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;  
}
 
function deletebestelling($bestelcode){
 
    // Connect database
    $conn = connectDb();
   
    // Maak een query
    $sql = "
    DELETE FROM " . CRUD_TABLE .
    " WHERE bestelcode = :bestelcode";
 
    // Prepare query
    $stmt = $conn->prepare($sql);
 
    // Uitvoeren
    $stmt->execute([
    ':bestelcode'=>$_GET['bestelcode']
    ]);
 
    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}
 
?>