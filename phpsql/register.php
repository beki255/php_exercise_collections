
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            background: #2196F3;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1976D2;
        }

        .message {
            margin-top: 12px;
            text-align: center;
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Register</h2>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="user_name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <?php
    if (isset($_POST['register'])) {
        $user = $_POST['user_name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // ✅ FIX: specify column order explicitly
        $stmt = $conn->prepare("INSERT INTO account (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $password, $email);

        if ($stmt->execute()) {
            echo "<div class='message'>User registered securely!</div>";
        } else {
            echo "<div class='message error'>Error: " . $stmt->error . "</div>";
        }
    }
    ?>
</div>

</body>
</html>




























<!-- <?php include 'db.php'; ?>
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
?> -->