<?php
$conn=mysqli_connect("localhost","root","","db");
if(!$conn){
    die("connection faild!" .mysqli_connect_error());

}else{
    echo "database is successfully connected \n";
}
?>