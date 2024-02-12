<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
Bedrag exclusief BTW <input type="tekst" name="bedrag" value="" placeholder="vul getal in">

<p><input type="radio" name="BTW" value="negen">Laag, 9% </p>
<p><input type="radio" name="BTW" value="21">Hoog, 21% </p>

<p><input type="submit" name="uitreken" value="Uitrekenen"></p>

</form>

<?php
    //auteur: Dylan Mahn
    //var_dump($_POST);

    //var_dump($_POST);
    if (isset($_POST['bedrag']) == true &&
     string$_POST['bedrag'] > 0 &&
     filter_var($_POST['bedrag'], FILTER_VALIDATE_FLOAT)){
        echo "het poste bedrag is: " . $_POST['bedrag'] . "<br>";

//check of btw is aangeklikt
    if (isset($_POST['BTW']) == true) {
        //breken btw
        echo "uitkomst btw-berekening"
    } else {
        echo "BTW niet aangeklikt<br>";
    }

    } else {
        echo "Error: bedrag is niet ingevuld<br>";
    }




  if (isset($_POST['bedrag']) == true) {

    //test of getal is
    if (is_numeric($_POST['bedrag']) == false) {
        echo "dombo<br>";
        exit;
    }
    if ($_POST['BTW'] == "negen") {
        $percentage = 1.09;
    } else {
        $percentage = 1.21;
    }

    //bereken de prijs incl btw.
    $uitkomst = $percentage * $_POST['bedrag'];

    echo "Bedrag :" . $_POST['bedrag'] . "<br>";
    echo "bedrag met btw: " . number_format($uitkomst) . "<br>";
}

?>

</body>
</html>