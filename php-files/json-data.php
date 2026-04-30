<?php
$array = [
    "fname" => "bereket",
    "lname" => "sahlemariam",
    "email" => "bereket2553@gmail.com",
    "age" => 66,
    "course" => ["webII", "ML"]
];

// Convert to JSON and save
$jsondata = json_encode($array, JSON_PRETTY_PRINT);
file_put_contents("json-data.json", $jsondata);
echo "Successfully written into JSON<br>";

// Read JSON file
$jsondata = file_get_contents("json-data.json");
$data = json_decode($jsondata, true);

// Display data
echo $data['fname'] . "<br>";
echo $data['lname'] . "<br>";
echo $data['email'] . "<br>";
echo $data['age'] . "<br>";

// Print array properly
echo implode(", ", $data['course']) . "<br>";
?>