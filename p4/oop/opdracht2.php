<?php
//auteur: Dylan Mahn
//functie: Maak een Class Product en voeg 4 objecten toe. Geef de objecten een propertie. Laat de 3 properties op scherm zien met een echo.
//Zorg ervoor dat ze onder elkaar staan met een br, Laat 1 propertie veranderen, zoals in de video.

// Definieer de class Product
class Product {
    public $naam;
    public $prijs;
    public $beschikbaarheid; // Nieuwe property toegevoegd

    // Constructor om objecten te initialiseren
    public function __construct($naam, $prijs, $beschikbaarheid) {
        $this->naam = $naam;
        $this->prijs = $prijs;
        $this->beschikbaarheid = $beschikbaarheid;
    }
}

// Maak 4 objecten van de class Product
$product1 = new Product("Laptop", 999, true);
$product2 = new Product("Smartphone", 599, false);
$product3 = new Product("Headphones", 149, true);
$product4 = new Product("Tablet", 399, true); // Nieuw product toegevoegd

// Toon de properties van de objecten op het scherm
echo "Product 1: " . $product1->naam . ", Prijs: $" . $product1->prijs . ", Beschikbaar: " . ($product1->beschikbaarheid ? 'Ja' : 'Nee') . "<br>";
echo "Product 2: " . $product2->naam . ", Prijs: $" . $product2->prijs . ", Beschikbaar: " . ($product2->beschikbaarheid ? 'Ja' : 'Nee') . "<br>";
echo "Product 3: " . $product3->naam . ", Prijs: $" . $product3->prijs . ", Beschikbaar: " . ($product3->beschikbaarheid ? 'Ja' : 'Nee') . "<br>";
echo "Product 4: " . $product4->naam . ", Prijs: $" . $product4->prijs . ", Beschikbaar: " . ($product4->beschikbaarheid ? 'Ja' : 'Nee') . "<br>";

// Verander de beschikbaarheid van Product 3
$product3->beschikbaarheid = false;

// Toon de bijgewerkte beschikbaarheid van Product 3
echo "Beschikbaarheid van Product 3 bijgewerkt: " . ($product3->beschikbaarheid ? 'Ja' : 'Nee');

?>