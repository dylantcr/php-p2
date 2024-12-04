<?php
include("dbconn.php");

// Zoekfunctionaliteit
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM klant WHERE 
              klantcode LIKE '%$search%' OR 
              username LIKE '%$search%' OR 
              klantadres LIKE '%$search%' OR 
              klantplaats LIKE '%$search%' OR 
              password LIKE '%$search%' OR 
              email LIKE '%$search%'";
} else {
    $query = "SELECT * FROM klant";
}

try {
    $get_klanten = $db_connection->prepare($query);
    $get_klanten->execute();
    $klanten = $get_klanten->fetchAll();
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <section class="container">
        <div class="col-md-12 mt-4">
            <!-- Zoekformulier -->
            <form action="" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Zoeken...">
                    <button type="submit" class="btn btn-primary">Zoeken</button>
                </div>
            </form>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Klantcode</th>
                        <th>Username</th>
                        <th>Klantadres</th>
                        <th>Klantplaats</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th class="d-flex justify-content-end"><a href="add_klant.php" class="btn btn-success">Klant toevoegen</a></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if($klanten) {
                        foreach($klanten as $klant) {
                    ?>

                            <tr>
                                <td><?= $klant["klantcode"] ?></td>
                                <td><?= $klant["username"] ?></td>
                                <td><?= $klant["klantadres"] ?></td>
                                <td><?= $klant["klantplaats"] ?></td>
                                <td><?= $klant["password"] ?></td>
                                <td><?= $klant["email"] ?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="edit_klant.php?klantcode=<?= $klant['klantcode']?>" class="btn btn-primary me-2">Bewerken</a>
                                    <form action="CRUD_klant.php" method="POST">
                                        <button value="<?= $klant['klantcode']?>" name="delete_klant" class="btn btn-danger">Verwijderen</button>
                                    </form>
                                </td>
                            </tr>

                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>Geen resultaten gevonden.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
