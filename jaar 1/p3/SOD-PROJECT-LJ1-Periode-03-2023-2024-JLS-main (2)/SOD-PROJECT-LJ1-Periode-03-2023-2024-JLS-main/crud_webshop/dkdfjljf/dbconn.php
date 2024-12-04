<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "webshop";

try {
  $db_connection = new PDO("mysql:host=$server; dbname=$db", $username, $password);
  $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
 echo "verbinding mislukt" . $e->getMessage();
}

?>