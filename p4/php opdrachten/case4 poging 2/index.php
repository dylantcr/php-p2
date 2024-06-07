<?php
// index.php
require 'db.php';
// Haal eerdere berekeningen op uit de database
$stmt = $pdo->query("SELECT * FROM calculations ORDER BY created_at DESC");
$calculations = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Case 4: uitgebreide rekenmachine</title>
<link rel="stylesheet" href="stijl.css">
</head>
<body>
<h1>Case 4: uitgebreide rekenmachine</h1>
<div class="calculator">
    <input type="text" id="display" readonly> <br>
    <button onclick="clearDisplay()">C</button>
    <button onclick="appendToDisplay('(')">(</button>
    <button onclick="appendToDisplay(')')">)</button>
    <button onclick="appendToDisplay('/')">/</button>
    <br>
    <button onclick="appendToDisplay('7')">7</button>
    <button onclick="appendToDisplay('8')">8</button>
    <button onclick="appendToDisplay('9')">9</button>
    <button onclick="appendToDisplay('*')">*</button>
    <br>
    <button onclick="appendToDisplay('4')">4</button>
    <button onclick="appendToDisplay('5')">5</button>
    <button onclick="appendToDisplay('6')">6</button>
    <button onclick="appendToDisplay('-')">-</button>
    <br>
    <button onclick="appendToDisplay('1')">1</button>
    <button onclick="appendToDisplay('2')">2</button>
    <button onclick="appendToDisplay('3')">3</button>
    <button onclick="appendToDisplay('+')">+</button>
    <br>
    <button onclick="appendToDisplay('0')">0</button>
    <button onclick="appendToDisplay('.')">.</button>
    <button onclick="appendToDisplay('%')">Mod</button>
    <button onclick="calculate()">=</button> <br>
    <button onclick="calculateImmediate('sqrt')">v</button>
    <button onclick="appendToDisplay('')">^</button>
    <input type="number" id="rounding" value="1" min="0" style="width: 60px;"> decimaal 
</div>
<h2>Vorige berekeningen</h2>
<ul>
<?php foreach ($calculations as $calc): ?>
    <li><?= htmlspecialchars($calc['expression']) ?> <?= $calc['result'] ?></li> 
<?php endforeach; ?>
</ul>
<script src="calculator.js"></script>
</body>
</html>