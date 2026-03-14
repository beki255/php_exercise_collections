<?php
$newfile=fopen("sample.txt","a") or die("unable to open!");
$txt="beki tech\n";
fwrite($newfile,$txt)
// echo fread($newfile,filesize("sample.txt"));
?>