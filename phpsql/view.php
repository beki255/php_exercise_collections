
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





























<!-- 
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        th {
            background: #4CAF50;
            color: white;
            padding: 12px;
            text-transform: uppercase;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #e6f7ff;
        }

        table, th, td {
            border: none;
        }
    </style>
</head>
<body>

<h2>Student Records</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>

<?php
$result = $conn->query("SELECT * FROM student");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['name']) . "</td>
            <td>" . htmlspecialchars($row['age']) . "</td>
            <td>" . htmlspecialchars($row['gender']) . "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}
?>

</table>

</body>
</html> -->
