<?php
/* function divide($a, $b) {
    if ($b == 0) {

        throw new Exception("Division by zero is not allowed.");
    }
    return $a / $b;
}
try {
    echo divide(10,0);
} 
catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage()."<br>";
    echo $e->getCode()."<br>";//Returns the exception code
    echo $e->getFile()."<br>"; //Returns the filename where the exception occurred
    echo $e->getLine()."<br>"; //Returns the line number where the exception 
} */


// Parent class
// class Car {
//     public $speed;        // public
//     protected $color;     // protected
//     private $engine;      // private

//     // Constructor
//     public function __construct($speed, $color, $engine) {
//         $this->speed = $speed;
//         $this->color = $color;
//         $this->engine = $engine;
//     }

//     // Method Info()
//     public function Info() {
//         echo "Speed: $this->speed <br>";
//         echo "Color: $this->color <br>";
//         echo "Engine: $this->engine <br>";
//     }
// }

// // Subclass
// class Volvo extends Car {

//     // Method display()
//     public function display() {
//         echo "I am Volvo <br>";
//     }
// }

// // Create object from subclass
// $car1 = new Volvo(200, "Black", "V8");

// // Call methods
// $car1->display();
// $car1->Info();



// // Abstract class
// abstract class Shape {

//     // Abstract method
//     abstract public function area();

//     // Normal method
//     public function display() {
//         echo "This is a shape.<br>";
//     }
// }

// // Subclass
// class Circle extends Shape {
//     private $radius;
//     // Constructor
//     public function __construct($radius) {
//         $this->radius = $radius;
//     }

//     // Implement abstract method
//     public function area() {
//         return 3.14 * $this->radius * $this->radius;
//     }
// }

// // Create object
// $circle = new Circle(5);

// // Call methods
// $circle->display();
// echo "Area of Circle: " . $circle->area();



// <?php
// Start form processing
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    // Create cookie (valid for 1 hour)
    setcookie("name", $name, time() + 3600);
}

// Delete cookie
if (isset($_POST['delete'])) {
    setcookie("name", "", time() - 3600);
}
?>

<!DOCTYPE html>
<html>
<body>

<h3>Cookie Example</h3>

<form method="post">
    Enter Name: <input type="text" name="name">
    <button type="submit" name="submit">Set Cookie</button>
    <button type="submit" name="delete">Delete Cookie</button>
</form>

<?php
// Access cookie
if (isset($_COOKIE['name'])) {
    echo "Welcome " . $_COOKIE['name'];
} else {
    echo "No cookie found!";
}
?>

</body>
</html>

// ?>
