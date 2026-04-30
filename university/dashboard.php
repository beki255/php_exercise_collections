<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Registration - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION['role']); ?></strong>.</p>
        <div class="menu">
            <a class="button" href="student_register.php">Student Registration</a>
            <a class="button" href="view_students.php">View Registered Students</a>
            <a class="button" href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>