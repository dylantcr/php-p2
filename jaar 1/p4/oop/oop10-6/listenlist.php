<?php
//Auteur: D.Mahn
//Functie: Toevoegen

// Definieer de ListenList class
class ListenList {
    // Private array om muziekstukken op te slaan
    private array $music = [];

    // Methode om een muziekstuk toe te voegen aan de lijst
    public function addMusic(Music $music) {
        $this->music[] = $music;
    }

    // Methode om alle muziekstukken op te halen
    public function getMusic(): array {
        return $this->music;
    }
}
?>