<?php
//auteur: D.Mahn
//functie: muziek informatie

/**
 * Class Music
 * 
 * @property string $name The name of the music.
 * @property string $genre The genre of the music.
 * @property int $listen The number of times the music has been listened to.
 */
class Music {
    // Declareer public properties
    public string $name;
    public string $genre;
    public int $listen;

    // Constructor die de properties initialiseert
    public function __construct(string $name, string $genre, int $listen) {
        $this->name = $name;  // Initialiseer de naam van de muziek
        $this->genre = $genre;  // Initialiseer het genre van de muziek
        $this->listen = $listen;  // Initialiseer het aantal keer dat de muziek is beluisterd
    }

    // Getter methode die de naam van de muziek retourneert
    public function getName(): string {
        return $this->name;
    }
}
?>