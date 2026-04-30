<?php
// Load XML file
$xml = simplexml_load_file("students.xml") or die("Error: Cannot load XML file.");
// Display data
echo "<h2>Student List</h2>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Age</th></tr>";
foreach ($xml->student as $stu) {
    echo "<tr>";
    echo "<td>" . $stu->name . "</td>";
    echo "<td>" . $stu->age . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
