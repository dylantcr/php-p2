<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Willekeurige Postcode</title>
</head>
<body>

<h1>Willekeurige Postcode</h1>

<?php

//Auteur: Dylan Mahn.
// Functie om een willekeurige postcode te genereren.

function generateRandomPostcode() {
    // Genereer een willekeurige cijferreeks van 4 cijfers
    $firstPart = str_pad(mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);

    // Genereer een willekeurige letterreeks van 2 letters (A-Z)
    $secondPart = chr(mt_rand(65, 90)) . chr(mt_rand(65, 90));

    // Combineer beide delen om de postcode te vormen
    return $firstPart . ' ' . $secondPart;
}

// Toon de willekeurige postcode op het scherm
echo '<p>Willekeurige Postcode: ' . generateRandomPostcode() . '</p>';
?>

</body>
</html>


