<?php
require "connection.php";
$sql="create database db";
if(mysqli_query($conn,$sql)){
    echo "data base is created successfully";
}else{
    echo "error creating database".mysqli_error($conn);
}
mysqli_close($conn);
?>