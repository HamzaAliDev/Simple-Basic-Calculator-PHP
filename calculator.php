<!DOCTYPE html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h1>Simple Calculator</h1>
    <form method="POST" action="">
        <label for="num1">First Number:</label>
        <input type="number" id="num1" name="num1" step="any" required>
        <br><br>
        <label for="num2">Second Number:</label>
        <input type="number" id="num2" name="num2" step="any" required>
        <br><br>
        <label for="operation">Operation:</label>
        <select name="operation" id="operation" required>
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (*)</option>
            <option value="divide">Division (/)</option>
        </select>
        <br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve and sanitize inputs
        $num1 = (float) $_POST['num1'];
        $num2 = (float) $_POST['num2'];
        $operation = $_POST['operation'];
        $result = '';

        // Perform the calculation based on the selected operation
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                // Check for division by zero
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = 'Error: Division by zero!';
                }
                break;
            default:
                $result = 'Invalid operation selected';
                break;
        }

        // Display the result
        echo "<h2>Result: $result</h2>";
    }
    ?>

</body>
</html>