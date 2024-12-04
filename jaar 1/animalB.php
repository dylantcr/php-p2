<?php
 
class Dier {
    public $naam;
 
    public function __construct($naam) {
        $this->naam = $naam;
        echo "Het dier is geboren\n";
    }
 
    public function info() {
        echo "De naam van het dier is " . $this->naam . "\n";
    }
 
    public function eet($voedsel) {
        echo "Het dier eet " . $voedsel . "\n";
    }
 
    public function slaap() {
        echo "Het dier slaapt\n";
    }
}
 
class Vogel extends Dier {
    public function vlieg() {
        echo "De vogel vliegt\n";
    }
}
 
// Maak een object van de Vogel class aan
$eend = new Vogel("Eend");
 
// Roep de methodes aan
$eend->info();
$eend->eet("brood");
$eend->slaap();
$eend->vlieg();
 
?>