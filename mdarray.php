<?php
$program= array(
    array("java","python","c++"),
    array("php","html","js")
);
// echo $program[1][2];
for($row=0; $row<2;$row++){
    echo "row number $row";
    echo "<br>";
    for($col=0;$col<3;$col++){
        echo $program[$row][$col];
        echo "<br>";
    }

}
?>