<!-- <?php
define("MINSIZE",50);
echo MINSIZE ."<br>";
echo constant("MINSIZE");
echo "<br>";
$name="aster";
$text='hello $name \n world';
echo $text;
?> -->
<?php
    $a=10;
    $b=&$a;
    $b=20;
    echo $a;
    echo "<br>";
    echo $b;
?>