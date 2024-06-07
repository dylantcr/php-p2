<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Rekenmachine</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <form action="" method="post">
            <input type="text" name="expression" id="expression" readonly>
            <div class="buttons">
                <button type="button" onclick="addToExpression('7')">7</button>
                <button type="button" onclick="addToExpression('8')">8</button>
                <button type="button" onclick="addToExpression('9')">9</button>
                <button type="button" onclick="addToExpression('+')">+</button>
                <button type="button" onclick="addToExpression('4')">4</button>
                <button type="button" onclick="addToExpression('5')">5</button>
                <button type="button" onclick="addToExpression('6')">6</button>
                <button type="button" onclick="addToExpression('-')">-</button>
                <button type="button" onclick="addToExpression('1')">1</button>
                <button type="button" onclick="addToExpression('2')">2</button>
                <button type="button" onclick="addToExpression('3')">3</button>
                <button type="button" onclick="addToExpression('*')">*</button>
                <button type="button" onclick="addToExpression('0')">0</button>
                <button type="button" onclick="clearExpression()">C</button>
                <button type="button" onclick="calculateExpression()">=</button>
                <button type="button" onclick="addToExpression('/')">/</button>
            </div>
        </form>
    </div>

    <script>
        function addToExpression(value) {
            document.getElementById("expression").value += value;
        }

        function clearExpression() {
            document.getElementById("expression").value = '';
        }

        function calculateExpression() {
            var expression = document.getElementById("expression").value;
            try {
                var result = eval(expression);
                document.getElementById("expression").value = result;
            } catch (error) {
                document.getElementById("expression").value = 'Error';
            }
        }
    </script>
</body>
</html>
