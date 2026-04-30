<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="DBU1";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Create Database
$conn->query("CREATE DATABASE IF NOT EXISTS DBU1");

// 3. Select Database
$conn->select_db("$dbname");

// 4. Create Table
$conn->query("CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL
)");

// 5. Insert data when form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO student (name, age, gender)
            VALUES ('$name', '$age', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Student added successfully!</p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!-- 6. HTML FORM -->
<h2>Student Form</h2>
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
<hr>

<!-- 7. DISPLAY DATA -->
<h2>Student List</h2>

<?php
$result = $conn->query("SELECT * FROM student");

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['gender']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}
$conn->close();
?>