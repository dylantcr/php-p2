<?php
    // auteur: Dylan Mahn
    // functie: zet de kachel aan
 
    // temp -10 - 0 graden: kachel hoge stand
    // temp 0-18: kachel normale stand
    // temp > 18: kachel uit
 
 
    // initialisatie van de tempartuur
    //standaard $temp = 0;
    $temp = 0;
 
    //aan
    if ($temp <= 0 && $temp >= -10) {
        echo "Hoge stand";
    }
    //normaal
    elseif ($temp >= 0 && $temp <18) { //test temp 0-18
        echo "Normale stand";
    }
    //uit
    elseif ($temp > 18) {
        echo "Kaachel uit";
    }
    //niks
    else {
        echo "Doe niks<br>";
    }

?>