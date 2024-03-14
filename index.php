<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 500px;
            max-width: 90%;
            border: 2px solid #ced4da;
            transition: border-color 0.3s;
            height: 50vh;
        }

        .calculator:hover {
            border-color: #6c757d;
        }

        h2 {
            margin-top: 0;
            color: #343a40;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        input[type="number"],
        select {
            width: calc(30% - 10px);
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s;
            font-size: 16px;
        }

        input[type="number"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        select {
            width: calc(20% - 10px);
        }

        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            margin-top: 50px;
            background-color: white;
            color: black;
            border: 2px solid #555555;
        }

        input[type="reset"] {
            margin-top: 3px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #555555;
            color: white;
        }

        input[type="reset"]:hover {
            background-color: red;
        }

        .result {
            margin-top: 30px;
            font-size: 3em;
            font-weight: bold;
            color: #000000;
        }

        .error {
            color: #dc3545;
            font-style: italic;
        }

        .container {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="calculator">
        <h2>PHP Calculator</h2>
        <form method="POST">
            <div class="container">
                <input type="number" name="num1" placeholder="Enter first number" required>
                <select name="operator">
                    <option value="add"> (+)</option>
                    <option value="subtract"> (-)</option>
                    <option value="multiply"> (×)</option>
                    <option value="divide"> (÷)</option>
                    <option value="modulus"> (%)</option>

                </select>
                <input type="number" name="num2" placeholder="Enter second number" required>

            </div>

            <input type="submit" name="calculate" value="Calculate">
            <input type="reset" name="clear" value="Clear">
        </form>
        <div class="result" id="result">


            <?php
            if (isset($_POST['calculate'])) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $operator = $_POST['operator'];

                switch ($operator) {
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
                            echo '<span class="error">Error: Division by zero is not possible</span>';
                            exit();
                        }
                        break;
                    case "modulus":
                        $result = $num1 % $num2;
                        break;
                }
                echo "Result: <span>" . $result . "</span>";
            }
            ?>

        </div>
    </div>



</body>

</html>