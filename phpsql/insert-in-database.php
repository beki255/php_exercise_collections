<?php
$conn = new mysqli("localhost", "root", "", "DBU2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO student (name, age, gender)
            VALUES ('$name', '$age', '$gender')";
    if ($conn->query($sql) === TRUE) {
        echo "Student added successfully<br><br>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    Gender:
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br><br>

    <input type="submit" name="submit" value="Add Student">
</form>