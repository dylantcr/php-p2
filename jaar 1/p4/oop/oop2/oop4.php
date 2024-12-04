<?php
//auteur: D.Mahn
//functie: opdracht 4

class Fruit {
    public $name;
    public $price;
    public $category;

    public function setName($name) {
        $this->name = ucfirst($name);
    }

    public function setCategory($category) {
        $this->category = strtoupper($category);
    }
}

// Voorbeeld van gebruik
$apple = new Fruit();
$apple->setName("apple");
$apple->setCategory("fruit");

echo "Name: " . $apple->name . "\n"; // Output: Name: Apple
echo "Category: " . $apple->category . "\n"; // Output: Category: FRUIT
?>
