<?php

//auteur: Dylasn mahn
//functie

$cijfers[0] = 5;
$cijfers[1] = 7;
$cijfers = array(5,7,8,"cola");
$aantal = count($cijfers);
echo "Aantal cijfers: $aantal<br>";

for ($i=0; $i < 4; $i++) { 
    echo "$cijfers[$i]<br>";
}

?>