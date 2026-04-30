<?php
// Data to write
$data = [
    "employees" => [
        ["firstName" => "John", "lastName" => "Doe"],
        ["firstName" => "Anna", "lastName" => "Smith"],
        ["firstName" => "Peter", "lastName" => "Jones"]
    ]
];
// Convert to JSON
$jsonData = json_encode($data, JSON_PRETTY_PRINT);
// Write into a JSON file
file_put_contents("data.json", $jsonData);
echo "Data successfully written to employees.json";
?>

