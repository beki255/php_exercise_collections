<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Two Numbers</title>
</head>
<body>
<h2>Add Two Numbers</h2>

<form action="calculator.php" method="post">
    Number 1: <input type="number" name="num1" required><br><br>
    Number 2: <input type="number" name="num2" required><br><br>
    <input type="submit" value="Add">
<?php
    function add($a, $b) {
        return $a + $b;
    }
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $result = add($num1, $num2);
    echo "<h3>Sum = " . $result . "</h3>";
?>
</form>
</body>
</html>




