<?php
//auteur: D.Mahn
//Functie: getter

// Definieer een class Product
class Product {
    // Declareer public properties
    public string $name;
    public float $price;
    public string $currency;

    // Constructor die de properties initialiseert
    public function __construct(string $name, float $price, string $currency) {
        $this->name = $name;  // Initialiseer de naam van het product
        $this->price = $price;  // Initialiseer de prijs van het product
        $this->currency = $currency;  // Initialiseer de valuta van het product
    }

    // Getter methode die de productinformatie retourneert
    public function getProduct(): string {
        return "Het product " . $this->name . " kost " . $this->currency . " " . $this->price;
    }
}

// Maak een nieuw product aan
$product1 = new Product(name: "Techno beats", price: 2, currency: "€");
echo $product1->getProduct() . "\n";  // Toon productinformatie

// Maak nog twee producten aan
$product2 = new Product(name: "Rock hits", price: 3.5, currency: "$");
echo $product2->getProduct() . "\n";  // Toon productinformatie

$product3 = new Product(name: "Classical melodies", price: 5, currency: "£");
echo $product3->getProduct() . "\n";  // Toon productinformatie
?>