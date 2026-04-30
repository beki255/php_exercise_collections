<?php
$xml = simplexml_load_file("student.xml");
echo "Student Name: " . $xml->name ."<br>" ;
echo "Student Age:".$xml->age;
?>
