
<!-- 
<?php
class AreaCalculator{
    public function area($length,$width=null){
        if ($width===null){
            return $length * $length;
        }
        return $length * $width;
        
    }
}
$Area=new AreaCalculator();
echo $Area->area(7)."<br>";
echo $Area->area(4,6);
?> -->

 <!-- <?php
setcookie("username", "Hana", time() + 3600);
?>  -->

<?php
if(isset($_COOKIE["username"])) {
    echo "Welcome to " . $_COOKIE["username"];
} else {
    echo "No cookie found!";
}
?> 

<!-- <?php
setcookie("username", "", time() - 3600);
?> -->

<!-- <?php
session_start();
$_SESSION['user'] = 'Eyob';
//destroys session on server
print_r($_SESSION); // still shows: Array ( [user] => Eyob ) session_unset();// clears the $_SESSION array in memory
session_unset();
session_destroy();
print_r($_SESSION); // now shows: Array ( )
?> -->
