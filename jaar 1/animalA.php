<?php
// Definieer de class Animal
class Animal {
    // Eigenschap Naam
    public $Naam;

    // Methode Info om informatie over het dier weer te geven
    public function Info() {
        echo "Dier: {$this->Naam}\n";
    }

    // Methode Eat om aan te geven dat het dier eet
    public function Eat() {
        echo "{$this->Naam} eet.\n";
    }

    // Methode Sleep om aan te geven dat het dier slaapt
    public function Sleep() {
        echo "{$this->Naam} slaapt.\n";
    }
}

// Maak een nieuw Animal object met de naam 'Hond'
$animal = new Animal();
$animal->Naam = "Hond";

// Roep alle methoden aan
$animal->Info(); // Geeft de informatie over het dier
$animal->Eat(); // Laat het dier eten
$animal->Sleep(); // Laat het dier slapen
?>
