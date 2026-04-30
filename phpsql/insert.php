<?php include "db.php";?>
<form method="POST">
    ID:<input type="number" name="id"><br>
    Name:<input type="text" name="name"><br>
    Age:<input type="number" name="age"><br>
    Gender:<input type="radio" name="gender" value="MALE">MALE<br>
           <input type="radio" name="gender" value="FEMALE">FEMALE<br>
        <button type="submit" name="submit">insert</button>
</form>
<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $id, $name, $age, $gender);
    $stmt->execute();
    echo "Student inserted successfully!";
  }
?>
