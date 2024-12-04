<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>voorbeeld form</h1>
</head>
<body>

<form action="action.php" method="post">

<input type="tekst" name="invul1" value="10" placeholder="vul getal in"><br>
<input type="text" name="invul2" value="aa"><br>
<input type="submit" name="knop" value="verzenden">

</form>

<?php
//test of verzend knop is ingedrukt.
if (isset($_POST['knop'])) {
    //print alle ingevulde velden van het formulier
    echo "Waarde van het invulveld: " . $_POST['invul1'] . "<br>";
}

?>
</body>
</html>