<?php
// Auteur: D. Mahn
// Functie: Bevat de Calculator class met basis- en geavanceerde rekenfuncties.

require_once 'Database.php';

/**
 * Class Calculator
 * Een uitgebreide rekenmachine die basis- en geavanceerde functies biedt.
 */
class Calculator {
    private $db;

    /**
     * Constructor voor de class Calculator.
     *
     * @param Database $db Een Database instantie om berekeningen op te slaan.
     */
    public function __construct(Database $db) {
        $this->db = $db;
    }

    // Basisfuncties

    /**
     * Optellen van meerdere getallen.
     *
     * @param float ...$numbers Getallen om op te tellen.
     * @return float Het resultaat van de optelling.
     */
    public function add(float ...$numbers): float {
        return array_sum($numbers);
    }

    /**
     * Aftrekken van twee getallen.
     *
     * @param float $a Het eerste getal.
     * @param float $b Het tweede getal.
     * @return float Het resultaat van de aftrekking.
     */
    public function subtract(float $a, float $b): float {
        return $a - $b;
    }

    /**
     * Vermenigvuldigen van meerdere getallen.
     *
     * @param float ...$numbers Getallen om te vermenigvuldigen.
     * @return float Het resultaat van de vermenigvuldiging.
     */
    public function multiply(float ...$numbers): float {
        return array_product($numbers);
    }

    /**
     * Delen van twee getallen.
     *
     * @param float $a Het eerste getal.
     * @param float $b Het tweede getal.
     * @return float Het resultaat van de deling.
     * @throws InvalidArgumentException Als $b nul is.
     */
    public function divide(float $a, float $b): float {
        if ($b == 0) {
            throw new InvalidArgumentException("Division by zero");
        }
        return $a / $b;
    }

    // Geavanceerde functies

    /**
     * Tot de macht x verheffen.
     *
     * @param float $base De basis.
     * @param float $exponent De exponent.
     * @return float Het resultaat van de machtsverheffing.
     */
    public function power(float $base, float $exponent): float {
        return pow($base, $exponent);
    }

    /**
     * Modulo van twee getallen.
     *
     * @param float $a Het eerste getal.
     * @param float $b Het tweede getal.
     * @return float Het resultaat van de modulo bewerking.
     */
    public function modulo(float $a, float $b): float {
        return fmod($a, $b);
    }

    /**
     * Worteltrekken van een getal.
     *
     * @param float $a Het getal.
     * @return float Het resultaat van de worteltrekking.
     */
    public function sqrt(float $a): float {
        return sqrt($a);
    }

    /**
     * Instelbare afronding van een getal.
     *
     * @param float $number Het getal om af te ronden.
     * @param int $precision Het aantal decimalen.
     * @return float Het afgeronde getal.
     */
    public function round(float $number, int $precision = 0): float {
        return round($number, $precision);
    }

    // Evaluatie van meerdere bewerkingen

    /**
     * Evalueren van een wiskundige expressie.
     *
     * @param string $expression De wiskundige expressie.
     * @return float Het resultaat van de evaluatie.
     */
    public function evaluate(string $expression): float {
        // Verwijder alle ongewenste karakters om beveiligingsproblemen te voorkomen
        $expression = preg_replace('/[^0-9+\-.*\/()%]/', '', $expression);
        $result = eval("return $expression;");
        $this->db->saveCalculation($expression, $result);
        return $result;
    }

    /**
     * Haal opgeslagen berekeningen op uit de database.
     *
     * @return array Een array van opgeslagen berekeningen.
     */
    public function getCalculations(): array {
        return $this->db->getCalculations();
    }
}
?>