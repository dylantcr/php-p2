<?php
//auteur: D.Mahn
//functie: opdracht 6

class Fruit {
    public $name;
    public $price;
    public $category;
    public $currency;

    public function __construct($name, $price, $currency = '€') {
        $this->name = ucfirst($name);
        $this->price = $price;
        $this->currency = $currency;
    }

    public function setCategory($category) {
        $this->category = strtoupper($category);
    }
}

// Voorbeeld van gebruik
$apple = new Fruit(name: "apple", price: 1.50, currency: "$");
$apple->setCategory("fruit");

// Commentaarregel voor het uitschakelen van het tweede object
// $banana = new Fruit(name: "banana", price: 0.99, currency: "€");

echo "Name: " . $apple->name . "\n"; // Output: Name: Apple
echo "Price: " . $apple->price . "\n"; // Output: Price: 1.50
echo "Currency: " . $apple->currency . "\n"; // Output: Currency: $
echo "Category: " . $apple->category . "\n"; // Output: Category: FRUIT
?>
