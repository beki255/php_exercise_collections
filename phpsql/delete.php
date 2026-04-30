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