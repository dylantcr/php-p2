<?php
// Auteur: D. Mahn
// Functie: Voert voorbeeldberekeningen uit met behulp van de Calculator class en toont de resultaten.

require_once 'Calculator.php';

// Maak een nieuwe database- en calculatorinstantie
$db = new Database();
$calculator = new Calculator($db);

// Voorbeeldberekeningen
try {
    $expression = "3 + 3 - 2";
    echo "Resultaat van '$expression': " . $calculator->evaluate($expression) . "\n";

    $expression = "4 * 2 / 2 + 1";
    echo "Resultaat van '$expression': " . $calculator->evaluate($expression) . "\n";

    $expression = "5 % 2";
    echo "Resultaat van '$expression': " . $calculator->evaluate($expression) . "\n";

    $expression = "sqrt(16)";
    echo "Resultaat van '$expression': " . $calculator->evaluate("sqrt(16)") . "\n";

    $expression = "round(3.14159, 2)";
    echo "Resultaat van '$expression': " . $calculator->evaluate("round(3.14159, 2)") . "\n";

    // Toon opgeslagen berekeningen
    $calculations = $calculator->getCalculations();
    echo "Opgeslagen berekeningen:\n";
    foreach ($calculations as $calc) {
        echo $calc['expression'] . " = " . $calc['result'] . "\n";
    }
} catch (Exception $e) {
    echo "Er is een fout opgetreden: " . $e->getMessage();
}
?>