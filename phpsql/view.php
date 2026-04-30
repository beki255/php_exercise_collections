<?php include 'db.php'; ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>
<?php
    $result = $conn->query("SELECT * FROM student");
    while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".htmlspecialchars($row['id'])."</td>
    <td>".htmlspecialchars($row['name'])."</td>
    <td>".htmlspecialchars($row['age'])."</td>
    <td>".htmlspecialchars($row['gender'])."</td>
    </tr>";
}
?>
</table>