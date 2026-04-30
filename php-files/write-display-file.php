


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);

    $data = "First Name: $fname, Last Name: $lname, Email: $email\n";
    $file_path = 'submissions.txt';

    if (file_put_contents($file_path, $data, FILE_APPEND | LOCK_EX)) {
        echo "Data successfully written to file.";
    } else {
        echo "Error writing to file.";
    }
} else {
    echo "Invalid request method.";
 
}
?>
<?php
   $display=file_get_contents($file_path);
   echo $display."<br>";
?>

