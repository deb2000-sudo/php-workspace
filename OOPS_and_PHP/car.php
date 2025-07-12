<?php

// 1.  Define the Class (The Blueprint)
class Car {
    // These are PROPERTIES (variables that belong to the class)
    // 'public' means we can access them from outside the class.+
    public $brand;
    public $color;

    // This is a METHOD (a function that belongs to the class)
    public function startEngine() {
        return "Vroom! The engine is running.";
    }
}

// 2. Create Objects from the Class (Build the Actual Cars)
// We use the 'new' keyword to create an object from our class blueprint.
$myBmw = new Car();
$myFord = new Car();

echo "I have a " . $myBmw->color . " " . $myBmw->brand . ".";
// Output: I have a Black BMW.
echo "<br>";

echo "My friend has a " . $myFord->color . " " . $myFord->brand . ".";
// Output: My friend has a Blue Ford.
echo "<br>";

// 3. Set the Properties for Each Car Object
// We use the arrow symbol '->' to access the properties of an object.
$myBmw->brand = "BMW";
$myBmw->color = "Black";

$myFord->brand = "Ford";
$myFord->color = "Blue";


// 4. Use the Objects!
echo "I have a " . $myBmw->color . " " . $myBmw->brand . ".";
// Output: I have a Black BMW.
echo "<br>";

echo "My friend has a " . $myFord->color . " " . $myFord->brand . ".";
// Output: My friend has a Blue Ford.
echo "<br>";

// We can also call the method on our object.
echo $myBmw->startEngine();
// Output: Vroom! The engine is running.

?>