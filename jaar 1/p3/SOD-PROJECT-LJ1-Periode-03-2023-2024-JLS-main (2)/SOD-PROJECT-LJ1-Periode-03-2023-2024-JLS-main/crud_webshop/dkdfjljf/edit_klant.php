<?php 
include("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>klant bewerken</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="product.css">
</head>

<body>

<section class="container">
  <div class="col-md-12">
<?php
if(isset($_GET['klantcode'])) {
  $klantcode = $_GET['klantcode'];

  // Voer een query uit om de klantgegevens op te halen
  $query = "SELECT * FROM klant WHERE klantcode = ?";
  $stmt = $db_connection->prepare($query);
  $stmt->execute([$klantcode]);
  $klant = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Controleer of de klantgegevens zijn opgehaald en toon het bewerkingsformulier
if(isset($klant)) {
?>

<!-- Bewerkingsformulier -->
<form action="CRUD_klant.php" method="POST">
  <div class="mb-3">
      <label for="klantcode">Klantcode</label>
      <input type="text" id="klantcode" name="klantcode" value="<?= $klant["klantcode"]?>" class="form-control" readonly>
  </div>
  <label for="username">Username</label>
  <input type="text" id="username" name="username" value="<?= $klant["username"]?>" class="form-control">

  <label for="klantadres">Klantadres</label>
  <input type="text" id="klantadres" name="klantadres" value="<?= $klant["klantadres"]?>" class="form-control">

  <label for="klantplaats">Klantplaats</label>
  <input type="text" id="klantplaats" name="klantplaats" value="<?= $klant["klantplaats"]?>" class="form-control">

  <label for="password">Password</label>
  <input type="password" id="password" name="password" value="<?= $klant["password"]?>" class="form-control">

  <label for="email">Email</label>
  <input type="email" id="email" name="email" value="<?= $klant["email"]?>" class="form-control">
  
  <!-- Andere inputvelden -->
  
  <button type="submit" class="btn btn-primary">Opslaan</button>
</form>

<?php
} else {
  echo "Klant niet gevonden.";
}
?>