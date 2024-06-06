<?php
//auteur: D.Mahn
//functie: opdracht 5

class Fruit {
    public $name;
    public $price;
    public $category;

    public function __construct($name, $price) {
        $this->name = ucfirst($name);
        $this->price = $price;
    }

    public function setCategory($category) {
        $this->category = strtoupper($category);
    }
}

// Voorbeeld van gebruik
$apple = new Fruit("apple", 1.50);
$apple->setCategory("fruit");

echo "Name: " . $apple->name . "\n"; // Output: Name: Apple
echo "Price: " . $apple->price . "\n"; // Output: Price: 1.50
echo "Category: " . $apple->category . "\n"; // Output: Category: FRUIT
?>
