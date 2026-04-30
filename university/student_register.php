<?php
session_start();
require_once 'connection.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$message = '';

if (isset($_POST['submit'])) {
    $student_id = trim($_POST['student_id']);
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $department = trim($_POST['department']);
    $academic_year = $_POST['academic_year'];
    $address = trim($_POST['address']);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO students (user_id, student_id, full_name, email, phone, dob, gender, department, academic_year, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssssssss', $user_id, $student_id, $full_name, $email, $phone, $dob, $gender, $department, $academic_year, $address);

    if ($stmt->execute()) {
        $message = 'Student registration completed successfully.';
    } else {
        $message = 'Error: ' . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - Debre Birhan University</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Debre Birhan University Registration</h2>
        <form method="post" action="student_register.php">
            <label>Student ID</label>
            <input type="text" name="student_id" required>
            <label>Full Name</label>
            <input type="text" name="full_name" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Phone</label>
            <input type="text" name="phone" required>
            <label>Date of Birth</label>
            <input type="date" name="dob" required>
            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <label>Department</label>
            <input type="text" name="department" required placeholder="e.g. Computer Science">
            <label>Academic Year</label>
            <select name="academic_year" required>
                <option value="">Select year</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="Graduate">Graduate</option>
            </select>
            <label>Address</label>
            <textarea name="address" required></textarea>
            <button type="submit" name="submit">Register Student</button>
        </form>
        <div class="message"><?php echo $message; ?></div>
        <div class="footer-link">
            <a href="dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>