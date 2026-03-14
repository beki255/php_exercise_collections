<?php
$user=$pass=$usererr=$passerr="";
if(isset($_POST["submit"])){
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $uppercase=preg_match("@[A-Z]@",$pass);
    $lowercase=preg_match("@[a-z]@",$pass);
    $number=preg_match("@[0-9]@",$pass);
    $specialchars=preg_match("@[^\w]@",$pass);
    if(empty($user)){
        $usererr= "user name is mandatory";
    }else if(strlen($user)<=3){
        $usererr= "user name should be at least 4 character";
    }else if(!preg_match("/^[a-zA-Z]*$/",$user)){
        $usererr= "user name must be alphabet";
    } 
} 
    echo "<br>";
    if(!$uppercase || !$lowercase || !$number || $specialchars || strlen($pass)<8){
    $passerr="password should be at least 8 characters in length and should include at 
    least one upper case letter,one number, and one special character.";
    // echo "password is mandatory";
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php validation</title>
</head>
<body>
    <form action="validation.php" method="post">
    username: <input type="text" name="username" id=""> <?php echo $usererr?><br>
    password: <input type="password" name="password" id=""><?php echo $passerr?><br>
    <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>