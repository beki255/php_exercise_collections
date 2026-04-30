<?php
$xml = simplexml_load_file("students.xml");
foreach ($xml->student as $student) {
    echo $student->name . "<br>";
}
?>