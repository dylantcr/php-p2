<?php

//auteur: Dylan Mahn
//Functie: session

$teller = 0;
$teller++;
echo $teller;

session_start();

//test is er al een sessie actief
if (isset($_SESSION['teller']) == false ) {
    //nee? maak em dan
    $_SESSION['teller'] = 0;
    $_SESSION['login'] = "zwarte piet";
} else {
    echo "sessie bestaat<br>";
    //teller met 1 ophogen
    $_SESSION['teller']++;

    //print sessie var
    echo "inhoud sessie: " . $_SESSION['teller'];
}

?>