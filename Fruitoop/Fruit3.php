<?php
 
// definitie van de class fruit
class Fruit{
  // properties
  public $name;
  public $color;
  public $houdbaarheidsdatum;
  private $price;
 
  // methodes
  public function setPrice($prijs) {
    $this->price = $prijs;
  }
 
  public function getPrice() {
    return $this->price;
  }
}

// Maak een object apple op basis van de class fuit
$appel = new Fruit();
 
// Vul de property name van het object
$appel->name = "Elstar";
$appel->color = "Roodgeel";
$appel->setPrice(1.50);
 
//var_dump($apple);
echo "De naam van het object is: " . $appel->name . "<br>";
echo "De prijs van het object is: " . $appel->getprice() . "<br>";
 
 
// Maak 2e object banaan
$banaan = new Fruit ();
$banaan ->name = "Banaan";
$banaan ->color = "Yellow";

var_dump ($banaan)
 
?>