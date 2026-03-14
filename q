[1mdiff --git a/indexarray.php b/indexarray.php[m
[1mindex 01f70b1..9b32553 100644[m
[1m--- a/indexarray.php[m
[1m+++ b/indexarray.php[m
[36m@@ -1,9 +1,9 @@[m
 <?php[m
 $program=array("javascript","php","html");[m
[31m-echo count($program);[m
[32m+[m[32m// echo count($program);[m
[32m+[m[32mrsort($program);[m
 $arrlen=count($program);[m
 for($i=0;$i<$arrlen;$i++){[m
     echo  $program[$i];[m
     echo "<br>";[m
[31m-}[m
[31m-?>[m
\ No newline at end of file[m
[32m+[m[32m}?>[m
\ No newline at end of file[m
