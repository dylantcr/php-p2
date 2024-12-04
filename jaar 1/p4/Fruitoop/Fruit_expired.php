<?php

//auteur: Dylan Mahn
//definitie van de class fruit
class Fruit{
  // properties
  public $name;
  public $color;
  public $expiryDate;
  private $price;
 
  // methodes

  public function isExpired(){
  
    // print expirydate
    // echo $this->expiryDate . "<br>";

    // vergelijk currentdate met expirydate
    // if currentdate > expirydate

    //bepaal currentdate
    $currentDate = date("Y-m-d");

    if ($currentDate > $this->expiryDate){
      return true;
    } else{
      return true;
    }
  }

  public function __construct(){
    echo "nieuwe object fruit aangemaakt<br>";
  }

  public function setPrice($prijs) {
    $this->price = $prijs;
  }
 
  public function getPrice() {
    return $this->price;
  }
}
//main

// Maak een object apple op basis van de class fuit
$appel = new Fruit();

// Vul de property name van het object
$appel->name = "Elstar";
$appel->color = "Roodgeel";
$appel->setPrice(1.50);
 
$appel->setPrice(10);
$appel->expiryDate = "2024-06-01";

// Is de appel houdbaar?
if ($appel->isExpired() == true){
  echo "Over de datum<br>";
} else {
  echo "Eetbaar<br>";
}

var_dump($appel);
exit;

//var_dump($apple);
echo "De naam van het object is: " . $appel->name . "<br>";
echo "De prijs van het object is: " . $appel->getprice() . "<br>";


// Maak 2e object banaan
$banaan = new Fruit ();
$banaan ->name = "Banaan";
$banaan ->color = "Yellow";

var_dump ($banaan)

?>