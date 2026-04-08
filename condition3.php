<?php
$name=$_POST["name"];
setcookie("name",$name,time()+3600);
?>

<?php
// Access cookie
if (isset($_COOKIE['name'])) {
    echo "Welcome " . $_COOKIE['name'];
} else {
    echo "No cookie found!";
}
?>