<?php
// auteur: Dylan Mahn
// functie: een script met producten en prijzen. Verhogen van de producten met 19% als ze hoger zijn dan 150 euro. Producten die goedkoper zijn dan 55 euro worden 11% duurder.
$product1 = 100;
$product2 = 160;
$product3 = 45;
 
//Functie om prijs aan te passen op basis van voorwaarden
function pasPrijsAan($prijs) {
    if ($prijs > 150) {
        return $prijs * 1.19; // Verhoog met 19%
    } elseif ($prijs < 55) {
        return $prijs * 1.11; // Verhoog met 11%
    } else {
        return $prijs; // Geen aanpassing
    }
}
 
//Pas de prijzen aan
$product1 = pasPrijsAan($product1);
$product2 = pasPrijsAan($product2);
$product3 = pasPrijsAan($product3);
 
echo "Product 1: €$product1, Product 2: €$product2, Product 3: €$product3.";
?>