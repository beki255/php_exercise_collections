<?php
require "connection.php";
$sql="create table student(
id int(6) unsigned auto_increment primary key,
fname varchar(30) not null,
lname varchar(30) not null,
sex varchar(10) not null,
reg_date timestamp default current_timestamp on update current_timestamp
)";


if(mysqli_query($conn,$sql)){
    echo "table is created successfully";
}else{
    echo "error creating table".mysqli_error($conn);
}
mysqli_close($conn);
?>