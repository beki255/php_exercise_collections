<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
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
            margin-top: 10px;
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
            background: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        .message {
            margin-top: 10px;
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
    <h2>Add Student</h2>

    <form method="POST">
        <label>ID</label>
        <input type="number" name="id" required>

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Age</label>
        <input type="number" name="age" required>

        <label>Gender</label>
        <div class="radio-group">
            <label><input type="radio" name="gender" value="MALE" required> Male</label>
            <label><input type="radio" name="gender" value="FEMALE"> Female</label>
        </div>

        <button type="submit" name="submit">Insert</button>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'] ?? null;

        if (!$gender) {
            echo "<div class='message error'>Please select gender</div>";
        } else {
            $stmt = $conn->prepare("INSERT INTO student (id, name, age, gender) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isis", $id, $name, $age, $gender);

            if ($stmt->execute()) {
                echo "<div class='message'>Student inserted successfully!</div>";
            } else {
                echo "<div class='message error'>Error: " . $stmt->error . "</div>";
            }
        }
    }
    ?>
</div>

</body>
</html>

























<!-- <?php include "db.php";?>
<form method="POST">
    ID:<input type="number" name="id"><br>
    Name:<input type="text" name="name"><br>
    Age:<input type="number" name="age"><br>
    Gender:<input type="radio" name="gender" value="MALE">MALE<br>
           <input type="radio" name="gender" value="FEMALE">FEMALE<br>
        <button type="submit" name="submit">insert</button>
</form>
<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $id, $name, $age, $gender);
    $stmt->execute();
    echo "Student inserted successfully!";
  }
?> -->
