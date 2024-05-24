<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="login_type">Inloggen als:</label>
        <select id="login_type" name="login_type">
            <option value="admin">Admin</option>
            <option value="guest">Gast</option>
        </select><br><br>
        <button type="submit" name="login">Inloggen</button>
    </form>
</body>
</html>
