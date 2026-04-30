<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "university";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($conn->query("CREATE DATABASE IF NOT EXISTS $dbName CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci") === TRUE) {
    echo "Database 'university' created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbName);

$usersSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','student') DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB CHARACTER SET=utf8mb4";

$studentsSql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    student_id VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    dob DATE NOT NULL,
    gender ENUM('Male','Female','Other') NOT NULL,
    department VARCHAR(120) NOT NULL,
    academic_year VARCHAR(50) NOT NULL,
    address VARCHAR(255) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_student_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB CHARACTER SET=utf8mb4";

if ($conn->query($usersSql) === TRUE) {
    echo "Table 'users' created or already exists.<br>";
} else {
    die("Error creating users table: " . $conn->error);
}

if ($conn->query($studentsSql) === TRUE) {
    echo "Table 'students' created or already exists.<br>";
} else {
    die("Error creating students table: " . $conn->error);
}

$adminUsername = 'admin';
$adminEmail = 'admin@debrebirhanuniversity.edu';
$adminPassword = password_hash('admin123', PASSWORD_DEFAULT);

$checkAdmin = $conn->prepare("SELECT id FROM users WHERE username = ? LIMIT 1");
$checkAdmin->bind_param('s', $adminUsername);
$checkAdmin->execute();
$checkAdmin->store_result();

if ($checkAdmin->num_rows === 0) {
    $insertAdmin = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'admin')");
    $insertAdmin->bind_param('sss', $adminUsername, $adminEmail, $adminPassword);
    if ($insertAdmin->execute()) {
        echo "Default admin account created. Username: admin / Password: admin123<br>";
    } else {
        echo "Could not create default admin account: " . $insertAdmin->error . "<br>";
    }
}

echo "Setup complete. Use login.php to access the system.";
?>