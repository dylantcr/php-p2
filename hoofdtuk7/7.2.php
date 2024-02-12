<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>

<?php

//auteur: Dylan mahn.
//functie rekenmachine.

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Cannot divide by zero";
            }
            break;
    }
}
?>

<h2>Simple Calculator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="num1">Number 1:</label>
    <input type="text" name="num1" id="num1" required>
    <br>

    <label for="num2">Number 2:</label>
    <input type="text" name="num2" id="num2" required>
    <br>

    <label>Operation:</label>
    <input type="radio" name="operation" value="add" checked> Add
    <input type="radio" name="operation" value="subtract"> Subtract
    <input type="radio" name="operation" value="multiply"> Multiply
    <input type="radio" name="operation" value="divide"> Divide
    <br>

    <input type="submit" value="Calculate">
</form>

<?php
if ($result !== "") {
    echo "<h3>Result: $result</h3>";
}
?>

</body>
</html>
