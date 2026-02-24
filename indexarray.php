<?php
$program=array("javascript","php","html");
echo count($program);
$arrlen=count($program);
for($i=0;$i<$arrlen;$i++){
    echo  $program[$i];
    echo "<br>";
}
?>