<?php

//auteur: dylan mahn
//functie: uitloggen van account
    session_start(); // Start of hervat de sessie
    session_unset(); // Verwijder alle sessievariabelen
    session_destroy(); // Vernietig de sessie
    header("Location: inloggen.php"); // Omleiden naar de inlogpagina
exit();
?>
