<?php
// calculate.php
require 'db.php';
 
// Functie om een wiskundige expressie veilig te evalueren
function safeEval($expression) {
    // Vervang ^ met ** voor machtsverheffing
    $expression = str_replace('^', '**', $expression);
    // Vervang sqrt met PHP-stijl sqrt
    $expression = preg_replace('/sqrt\(([^)]+)\)/', 'sqrt($1)', $expression);
    // Zorg ervoor dat alleen veilige tekens worden gebruikt
    $expression = preg_replace('/[^0-9\+\-\*\/\(\)\.\%\sqrt]/', '', $expression);
 
    // Gebruik eval om de expressie te evalueren
    try {
        eval('$result = ' . $expression . ';');
        return $result;
    } catch (Throwable $e) {
        // Log de fout en geef een foutmelding terug
        file_put_contents('error_log.txt', $e->getMessage(), FILE_APPEND);
        return 'error';
    }
}
 
// Haal de expressie op uit de POST data
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['expression'])) {
    $expression = $data['expression'];
    $rounding = isset($data['rounding']) ? (int)$data['rounding'] : null;
 
    $result = safeEval($expression);
 
    // Controleer of er een fout is opgetreden
    if ($result === 'error') {
        echo json_encode(['result' => 'Ongeldige expressie']);
        exit;
    }
 
    // Pas afronding toe indien gespecificeerd
    if ($rounding !== null) {
        $result = round($result, $rounding);
    }
 
    // Berekening en resultaat opslaan in de database
    try {
        $stmt = $pdo->prepare('INSERT INTO calculations (expression, result) VALUES (:expression, :result)');
        $stmt->execute(['expression' => $expression, 'result' => $result]);
    } catch (PDOException $e) {
        file_put_contents('error_log.txt', $e->getMessage(), FILE_APPEND);
        echo json_encode(['result' => 'Database fout']);
        exit;
    }
 
    // Return result as JSON
    echo json_encode(['result' => $result]);
}
?>