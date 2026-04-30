<!-- <?php include 'db.php'; ?>
 <form method="POST">
    ID: <input type="number" name="id"><br>
    New Name: <input type="text" name="name"><br>
    New Age: <input type="number" name="age"><br>
    New Gender: <input type="text" name="gender"><br>
    <button type="submit" name="update">Update</button>
 </form>
<?php
    if (isset($_POST['update'])) {
    $id = $_POST['id'];$name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $stmt = $conn->prepare("UPDATE student SET name=?, age=?, gender=? WHERE id=?");
    $stmt->bind_param("sisi", $name, $age, $gender, $id);
    $stmt->execute();
    echo "Student updated successfully!";
}
?> -->










<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
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
            width: 360px;
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

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .radio-group {
            margin-top: 8px;
        }

        .radio-group label {
            font-weight: normal;
            margin-right: 10px;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            background: #ff9800;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #e68900;
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
    <h2>Update Student</h2>

    <form method="POST">
        <label>ID</label>
        <input type="number" name="id" required>

        <label>New Name</label>
        <input type="text" name="name" required>

        <label>New Age</label>
        <input type="number" name="age" required>

        <label>New Gender</label>
        <div class="radio-group">
            <label><input type="radio" name="gender" value="MALE" required> Male</label>
            <label><input type="radio" name="gender" value="FEMALE"> Female</label>
        </div>

        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'] ?? null;

        if (!$gender) {
            echo "<div class='message error'>Please select gender</div>";
        } else {
            $stmt = $conn->prepare("UPDATE student SET name=?, age=?, gender=? WHERE id=?");
            $stmt->bind_param("sisi", $name, $age, $gender, $id);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "<div class='message'>Student updated successfully!</div>";
                } else {
                    echo "<div class='message error'>No student found with that ID</div>";
                }
            } else {
                echo "<div class='message error'>Error: " . $stmt->error . "</div>";
            }
        }
    }
    ?>
</div>

</body>
</html>