<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Color Changer</title>
    <style>
        body {
            text-align: center;
            margin: 50px;
        }

        label {
            display: inline-block;
            margin: 0 10px;
        }
    </style>
</head>
<body>

<?php
// Functie om de achtergrondkleur in te stellen
function setBackgroundColor($color) {
    echo "<style>body { background-color: $color; }</style>";
}

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de geselecteerde kleur op
    $selectedColor = $_POST["color"];

    // Stel de achtergrondkleur in
    setBackgroundColor($selectedColor);
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>
        <input type="radio" name="color" value="red"> Rood
    </label>
    <label>
        <input type="radio" name="color" value="blue"> Blauw
    </label>
    <label>
        <input type="radio" name="color" value="green"> Groen
    </label>
    <label>
        <input type="radio" name="color" value="yellow"> Geel
    </label>
    <br>
    <br>
    <input type="submit" value="Verander achtergrondkleur">
</form>

</body>
</html>
