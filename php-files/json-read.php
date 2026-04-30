<?php
// Step 1: Read the JSON file
$jsonData = file_get_contents("data.json");
// Step 2: Decode JSON into a PHP associative array
$dataArray = json_decode($jsonData, true);
// Step 3: Access the data
echo "Name: " . $dataArray['name'] . "<br>";
echo "Age: " . $dataArray['age'] . "<br>";
echo "City: " . $dataArray['city']. "<br>";

var_dump($dataArray );

echo "<br>";
echo "option two to display using php object";
echo "<br>";
$dataArray = json_decode($jsonData);
// Step 3: Access the data
echo "Name: " . $dataArray->name. "<br>";
echo "Age: " . $dataArray->age . "<br>";
echo "City: " . $dataArray->city;

?>




