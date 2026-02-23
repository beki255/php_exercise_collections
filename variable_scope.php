<?php
// $y=60;
// function v_scop(){
//     global $y;
//     $x=45;//local variable
//     echo $x;
//     echo "</br>";
//     echo $y;
// }
// v_scop();
// echo $y;
function sta(){
    static $z=1;
    echo $z;
    $z++;
}
sta();
echo "</br>"; 
sta();
echo "</br>"; 
sta();
?>