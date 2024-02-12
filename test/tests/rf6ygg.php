<?php

//auteur: Dylan Mahn
//functie: testen

session_start();

$_SESSION['login'] = true;
$_SESSION['naam'] = "Dylan";

if ($_SESSION['login'] == true) {

    echo "Hallo daar: " . $_SESSION['naam'];
}


?>