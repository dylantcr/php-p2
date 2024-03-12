<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gebruiker Toevoegen</title>
</head>
<body>
    <h2>Gebruiker Registreren</h2>
    <form action="#" method="post">
            <div>
                <label for="username">Gebruikersnaam: </label><br>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Wachtwoord: </label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" name="registreer" value="Registreer">
            </div>
        </form>

    <?php

    //auteur: Dylan mahn
    //functie: account aanmaken

    // Controleer of het formulier is verzonden
    if(isset($_POST['registreer'])) {
        // Voeg de databaseconfiguratie toe
        include 'config.php'; // Zorg ervoor dat je configuratiebestand correct is ingesteld
        try {
            // Maak een nieuwe databaseverbinding
            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            // Bereid een SQL-query voor om een nieuwe gebruiker toe te voegen
            $query = $db->prepare("INSERT INTO gebruikers(username, password) VALUES (:username, :password)");
            // Sanitize de gebruikersnaam en hash het wachtwoord
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Bind de waarden aan de query parameters
            $query->bindParam(':username', $username);
            $query->bindParam(':password', $password);
            // Voer de query uit en controleer op succes
            if($query->execute()) {
                echo "De nieuwe gebruiker is succesvol toegevoegd.";
            } else {
                echo "Er is een fout opgetreden bij het toevoegen van de nieuwe gebruiker.";
            }
        } catch(PDOException $e) {
            // Vang en toon databaseverbindingsfouten
            die("Error!: " . $e->getMessage());
        }
    }
?>

<br><br><br><br><br><br>
    <!-- Link terug naar de inlogpagina -->
    <a href="inloggen.php">Terug naar inlog pagina</a>
</body>

</html>