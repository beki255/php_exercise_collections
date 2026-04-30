<?php include 'db.php'; ?>
    <form method="POST">
        Username: <input type="text" name="user_name"><br>Email: <input type="email" name="email"><br>
        Password: <input type="password" name="password"><br>
        <button type="submit" name="register">Register</button>
    </form>
<?php
    if (isset($_POST['register'])) {
    $user = $_POST['user_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO account VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $password, $email);
    $stmt->execute();
    echo "User registered securely!";
    }
?>