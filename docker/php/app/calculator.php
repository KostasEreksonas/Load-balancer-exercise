<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Calculations</title>
</head>
<body>
<header>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contact</a></li>
        <li style="float:right"><a class="active" href="#">About</a></li>
    </ul>
</header>
<p class="result">
<?php

$num1 = $_POST["number-1"];
$num2 = $_POST["number-2"];
$choice = $_POST["choice"];

if (isset($choice)) {
        if ($choice == "+") {
            $action = "Addition";
            $result = $num1 + $num2;
        } elseif ($choice == "-") {
            $action = "Subtraction";
            $result = $num1 - $num2;
        } elseif ($choice == "*") {
            $action = "Multiplication";
            $result = $num1 * $num2;
        } elseif ($choice == "/") {
            $action = "Division";
            try {
                if ($num2 == 0) {
                    throw new Exception('Division by zero.');
                }
                $result = $num1 / $num2;
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                $result = 'undefined';
            }
        } else {
            $action = 'None';
            $result = 0;
        }
        echo $action . ' result: ' . $num1 . ' ' . $choice . ' ' . $num2 . ' = ' . $result;
    }
?>
</p>
<footer class="footer">
    <p>Kostas Ereksonas, 2024</p>
</footer>
</body>
</html>
