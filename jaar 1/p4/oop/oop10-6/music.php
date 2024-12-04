<?php
//Auteur: D.Mahn
//Functie: Retourneert de muziek en maakt object aan

declare(strict_types=1);

// Definieer de Music class
class Music {
    // Publieke properties met type declaraties
    public string $name;
    public string $genre;
    public int $duration;

    // Constructor met string en int argumenten
    public function __construct(string $name, string $genre, int $duration) {
        $this->name = $name;
        $this->genre = $genre;
        $this->duration = $duration;
    }

    // Methode om de naam van het muziekstuk te krijgen
    public function getName(): string {
        return $this->name;
    }

    // Methode om het genre van het muziekstuk te krijgen
    public function getGenre(): string {
        return $this->genre;
    }

    // Methode om de duur van het muziekstuk te krijgen
    public function getDuration(): int {
        return $this->duration;
    }
}
?>
