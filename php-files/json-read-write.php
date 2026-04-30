<!-- <?php
$people = [
    [
        "fname" => "bereket",
        "lname" => "sahlemariam",
        "email" => "bereket2553@gmail.com",
        "age" => 66,
        "course" => ["webII", "ML", "AI"],
        "phone" => "0912345678",
        "city" => "Gonder"
    ],
    [
        "fname" => "abel",
        "lname" => "tesfaye",
        "email" => "abel@gmail.com",
        "age" => 30,
        "course" => ["Networking", "Security"],
        "phone" => "0922334455",
        "city" => "Addis Ababa"
    ],
    [
        "fname" => "hana",
        "lname" => "alem",
        "email" => "hana@gmail.com",
        "age" => 25,
        "course" => ["Database", "Web"],
        "phone" => "0933445566",
        "city" => "Bahir Dar"
    ],
    [
        "fname" => "dawit",
        "lname" => "kebede",
        "email" => "dawit@gmail.com",
        "age" => 28,
        "course" => ["AI", "ML"],
        "phone" => "0944556677",
        "city" => "Hawassa"
    ],
    [
        "fname" => "selam",
        "lname" => "mulu",
        "email" => "selam@gmail.com",
        "age" => 22,
        "course" => ["UI/UX", "Frontend"],
        "phone" => "0955667788",
        "city" => "Mekelle"
    ]
];

// ✅ Convert to JSON and save
$jsondata = json_encode($people, JSON_PRETTY_PRINT);
file_put_contents("people.json", $jsondata);

echo "Data written to JSON file<br><br>";

// ✅ Read from JSON
$jsondata = file_get_contents("people.json");
$data = json_decode($jsondata, true);

// ✅ Display data
foreach ($data as $person) {
    echo "Name: " . $person['fname'] . " " . $person['lname'] . "<br>";
    echo "Email: " . $person['email'] . "<br>";
    echo "Age: " . $person['age'] . "<br>";
    echo "Courses: " . implode(", ", $person['course']) . "<br>";
    echo "Phone: " . $person['phone'] . "<br>";
    echo "City: " . $person['city'] . "<br>";
    echo "----------------------<br>";
}
?> -->
<?php
// Read JSON file
$jsondata = file_get_contents("people.json");
$data = json_decode($jsondata, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>People Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2>People Information</h2>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Courses</th>
        <th>Phone</th>
        <th>City</th>
    </tr>

    <?php foreach ($data as $person): ?>
    <tr>
        <td><?php echo $person['fname']; ?></td>
        <td><?php echo $person['lname']; ?></td>
        <td><?php echo $person['email']; ?></td>
        <td><?php echo $person['age']; ?></td>
        <td><?php echo implode(", ", $person['course']); ?></td>
        <td><?php echo $person['phone']; ?></td>
        <td><?php echo $person['city']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
</body>
</html>