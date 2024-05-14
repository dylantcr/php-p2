<?php
// auteur: Dylan Mahn
// functie: 2 variabelen, het script moet bepalen welke de grootste is. De grootste waarde vermenigvuldigen met 2 en optellen bij kleinste waarde.
 
$nummer1 = 20;
$nummer2 = 30;
 
//Bepaal de grootste en kleinste waarde
$grootste = max($nummer1, $nummer2);
$kleinste = min($nummer1, $nummer2);
 
//Bereken de gewenste uitkomst
$resultaat = ($grootste * 2) + $kleinste;
 
echo "De grootste waarde is $grootste en de kleinste waarde is $kleinste. Het resultaat is $resultaat.";
?>