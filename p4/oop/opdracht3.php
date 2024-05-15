<?php
//auteur: Dylan mahn
//functie: Opdracht 3: OOP3.php Gebruik als start de code van de vorige opdracht. Geef iedere game een prijs.
//Maak een public function formatPrice een return en gebruik $this->price.
//Echo de methode $game1->formatPrice();
//Laat in de price 2 decimalen zien.


// Definieer de class Product
class Product {
    public $naam;
    public $prijs;
    public $beschikbaarheid;

    // Constructor om objecten te initialiseren
    public function __construct($naam, $prijs, $beschikbaarheid) {
        $this->naam = $naam;
        $this->prijs = $prijs;
        $this->beschikbaarheid = $beschikbaarheid;
    }

    // Methode om de prijs te formatteren met 2 decimalen
    public function formatPrice() {
        return number_format($this->prijs, 2);
    }
}

// Maak 4 objecten van de class Product
$product1 = new Product("Laptop", 999, true);
$product2 = new Product("Smartphone", 599, false);
$product3 = new Product("Headphones", 149, true);
$product4 = new Product("Tablet", 399, true);

// Toon de prijs van product 1 geformatteerd met 2 decimalen
echo "Prijs van Product 1: $" . $product1->formatPrice() . "<br>";

?>