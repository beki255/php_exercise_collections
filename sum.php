<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $sum = $num1 + $num2;

    echo "Sum: " . $sum;
} else {
    echo "Invalid request!";
}
?>