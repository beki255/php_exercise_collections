<?php
// Parent class
class Car {
    public $speed;        // public
    protected $color;     // protected
    private $engine;      // private

    // Constructor
    public function __construct($speed, $color, $engine) {
        $this->speed = $speed;
        $this->color = $color;
        $this->engine = $engine;
    }
    // Method to display info
    public function info() {
        echo "Speed: $this->speed <br>";
        echo "Color: $this->color <br>";
        echo "Engine: $this->engine <br>";
    }
}

// Child class
class Volvo extends Car {

    // Method display()
    public function display() {
        echo "I am Volvo <br>";
    }
}

// Create object from subclass
$car1 = new Volvo(200, "Black", "V8");

// Call methods
$car1->display();
$car1->info();
?>







<?php
class Car {
    public $speed;        
    protected $color;    
    private $engine;   

    public function __construct($speed, $color, $engine) {
        $this->speed = $speed;
        $this->color = $color;
        $this->engine = $engine;
    }
    public function display(){
        echo "speed: $this->"
    }
}
?>