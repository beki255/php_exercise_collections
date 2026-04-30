<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "DBU";

$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $db";
$conn->query($sql);
$conn->select_db($db);
$table = "CREATE TABLE IF NOT EXISTS DBU (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    department VARCHAR(100) NOT NULL
)";
$conn->query($table);

function clean_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = clean_input($_POST["fname"]);
    $age = clean_input($_POST["age"]);
    $dep = clean_input($_POST["dep"]);

  
    if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
        die("Invalid name format");
    }

    if (!filter_var($age, FILTER_VALIDATE_INT)) {
        die("Invalid age");
    }

    if (empty($dep)) {
        die("Department is required");
    }
    $allowed_dep = ["CS", "IS", "DS", "IT", "SE"];

    if (!in_array($dep, $allowed_dep)) {
    die("Invalid department selected");
    }

    $stmt = $conn->prepare("INSERT INTO DBU (fname, age, department) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $fname, $age, $dep);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>