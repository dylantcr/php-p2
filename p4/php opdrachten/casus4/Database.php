<?php
// Auteur: D. Mahn
// Functie: Beheert de verbinding en interactie met de SQLite database voor het opslaan van berekeningen.

/**
 * Class Database
 * Beheert de verbinding en interactie met de SQLite database voor het opslaan van berekeningen.
 */
class Database {
    private $pdo;

    /**
     * Constructor voor de class Database.
     *
     * @param string $dbFile Pad naar het databasebestand.
     */
    public function __construct($dbFile = 'calculations.db') {
        $this->pdo = new PDO("sqlite:" . $dbFile);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->initializeTable();
    }

    /**
     * Initialiseert de tabel voor het opslaan van berekeningen.
     */
    private function initializeTable() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS calculations (
            id INTEGER PRIMARY KEY,
            expression TEXT,
            result REAL
        )");
    }

    /**
     * Slaat een berekening op in de database.
     *
     * @param string $expression De wiskundige expressie.
     * @param float $result Het resultaat van de berekening.
     */
    public function saveCalculation(string $expression, float $result) {
        $stmt = $this->pdo->prepare("INSERT INTO calculations (expression, result) VALUES (:expression, :result)");
        $stmt->execute([':expression' => $expression, ':result' => $result]);
    }

    /**
     * Haalt alle berekeningen op uit de database.
     *
     * @return array Een array van opgeslagen berekeningen.
     */
    public function getCalculations(): array {
        $stmt = $this->pdo->query("SELECT * FROM calculations");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>