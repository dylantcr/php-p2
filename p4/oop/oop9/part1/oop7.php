<?php
//auteur: D.Mahn
//Functie: maak basis class met construct

// Definieer een class Product
class Product {
    // Constructor die de properties $name, $price, en $currency initialiseert met constructor promoted properties
    public function __construct(
        private string $name,  // Naam van het product
        private float $price,  // Prijs van het product
        private string $currency // Valuta van de prijs
    ) {}
}
?>