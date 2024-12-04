<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product toevoegen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="product.css">
</head>

<body>

<section class="container">
  <div class="col-md-12 mt-4">
  <div class="card">
  <div class="card-header d-flex justify-content-between">
    <h3>Voeg een klant toe</h3>
    <a href="index.php" class="btn btn-danger">Terug</a>
  </div>
  <div class="card-body">
  <div class="mb-3">
  <form action="CRUD_klant.php" method="POST">
    <label for="klantcode">Klantcode</label>
    <input type="text" id="klantcode" name="klantcode" class="form-control">
</div>

<div class="mb-3">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" class="form-control">
</div>

<div class="mb-3">
    <label for="klantadres">Klantadres</label>
    <input type="text" id="klantadres" name="klantadres" class="form-control">
</div>

<div class="mb-3">
    <label for="klantplaats">Klantplaats</label>
    <input type="text" id="klantplaats" name="klantplaats" class="form-control">
</div>

<div class="mb-3">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control">
</div>

<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control">
</div>

    <input type="submit" name="add_customer" value="Toevoegen" class="btn btn-primary">
  </form>
   
  </div>
</div>

  </div>
  </section>
</body>
</html>