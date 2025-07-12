<?php

// 1. CREATE THE PARENT CLASS
class Vehicle {
    public $brand;
    public $color;
    private $EngineNo;

    public function __construct($brand, $color,$EngineNo) {
        $this->brand = $brand;
        $this->color = $color;
        $this->EngineNo = $EngineNo; // Initialize the EngineNo property
    }

    public function senData() {
        return "This is a " . $this->color . " " . $this->brand . "." . " Engine Number: " . $this->EngineNo;
    }
}

// 2. CREATE THE CHILD CLASS
class Motorcycle extends Vehicle {

    // Add a property that only Motorcycles have
    public $hasSidecar;

    // We can add a more specific getInfo method if we want
    public function getMotorcycleInfo() {
        $info = parent::senData(); // Call the parent's getInfo() method
        $sidecarStatus = $this->hasSidecar ? "It has a sidecar." : "It does not have a sidecar.";
        return $info . " " . $sidecarStatus;
    }
}

// 3. LET'S USE OUR CLASSES!
$myBike = new Motorcycle("Harley-Davidson", "Black","123ghgjj");
$myBike->hasSidecar = true; // Set the unique property

echo $myBike->getMotorcycleInfo();
// Output: This is a Black Harley-Davidson. It has a sidecar.