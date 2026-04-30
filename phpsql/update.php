<?php include 'db.php'; ?>
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
?>