<?php include 'db.php'; ?>
    <form method="POST">
    ID: <input type="number" name="id"><br>
    <button type="submit" name="delete">Delete</button>
    </form>
<?php
    if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM student WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Student deleted successfully!";
}
?>






















<!-- <?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
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
            width: 340px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #d32f2f;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            background: #d32f2f;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #b71c1c;
        }

        .message {
            margin-top: 12px;
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Delete Student</h2>

    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
        <label>Enter Student ID</label>
        <input type="number" name="id" required>

        <button type="submit" name="delete">Delete</button>
    </form>

    <?php
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM student WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<div class='message'>Student deleted successfully!</div>";
            } else {
                echo "<div class='message error'>No student found with that ID</div>";
            }
        } else {
            echo "<div class='message error'>Error: " . $stmt->error . "</div>";
        }
    }
    ?>
</div>

</body>
</html> -->