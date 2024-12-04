<?php 
include("dbconn.php");

if(isset($_POST["add_customer"])){

 $klantcode = $_POST["klantcode"];
 $username = $_POST["username"];
 $klantadres = $_POST["klantadres"];
 $klantplaats = $_POST["klantplaats"];
 $password = $_POST["password"];
 $email = $_POST["email"];

 try {
  $query = "INSERT INTO klant (klantcode, username, klantadres, klantplaats, password, email) VALUES (:klantcode, :username, :klantadres, :klantplaats, :password, :email)";
  $query_run = $db_connection->prepare($query);

  $customer = [
    ':klantcode' => $klantcode,
    ':username' => $username,
    ':klantadres' => $klantadres,
    ':klantplaats' => $klantplaats,
    ':password' => $password,
    ':email' => $email
  ];  

  $query_execute = $query_run ->execute($customer);

  if($query_execute){
    echo "Het is toegevoegd!";
    header("Location: index.php");
    exit(0);
  } else {
    echo " Het is niet gelukt";
    header("Location: index.php");
    exit(1);
  }


 }catch(PDOException $e){
   echo $e->getMessage();
 }

}

//update
if(isset($_POST["klantcode"])){
  
  $klantcode = $_POST["klantcode"];
  $username = $_POST["username"];
  $klantadres = $_POST["klantadres"];
  $klantplaats = $_POST["klantplaats"];
  $password = $_POST["password"];
  $email = $_POST["email"];
 
  try {
   $query = "UPDATE klant SET username=:username, klantadres=:klantadres, klantplaats=:klantplaats, password=:password, email=:email WHERE klantcode=:klantcode";
   $query_run = $db_connection->prepare($query);
 
   $customer = [
     ':klantcode' => $klantcode,
     ':username' => $username,
     ':klantadres' => $klantadres,
     ':klantplaats' => $klantplaats,
     ':password' => $password,
     ':email' => $email
   ];
 
   $query_execute = $query_run ->execute($customer);
 
   if($query_execute){
     echo "Het is bewerkt!";
     header("Location: index.php");
     exit(0);
   } else {
     echo " Het is niet gelukt";
     header("Location: index.php");
     exit(1);
   }
 
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

if(isset($_POST["delete_klant"])) {
  $klantcode = $_POST["delete_klant"];

  try {
      $query = "DELETE FROM klant WHERE klantcode = :klantcode";
      $query_run = $db_connection->prepare($query);
      
      $query_run->bindParam(':klantcode', $klantcode);
      
      $query_execute = $query_run->execute();
      
      if($query_execute) {
          echo "De klant is verwijderd!";
          header("Location: index.php");
          exit(0);
      } else {
          echo "Het is niet gelukt om de klant te verwijderen";
          header("Location: index.php");
          exit(1);
      }
  } catch(PDOException $e) {
      echo $e->getMessage();
  }
}

