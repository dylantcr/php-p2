<?php
//auteur: Dylan
//functie: Maak een Class Product en voeg 3 objecten toe. Laat de 3 objecten op scherm zien met var_dump.

// Definieer de class Product
class Product {
    public $naam;
    public $prijs;

    // Constructor om objecten te initialiseren
    public function __construct($naam, $prijs) {
        $this->naam = $naam;
        $this->prijs = $prijs;
    }
}

// Maak 3 objecten van de class Product
$product1 = new Product("Laptop", 999);
$product2 = new Product("Smartphone", 599);
$product3 = new Product("Headphones", 149);

// Laat de 3 objecten op het scherm zien met var_dump
var_dump($product1);
var_dump($product2);
var_dump($product3);

?>