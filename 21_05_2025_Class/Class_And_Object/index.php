<?php

class Car {
    public $brand;
    private $speed = 0;

    public function __construct(string $brand) {
        $this->brand = $brand;
    }

    public function accelerate(int $increment): void {
        $this->speed += $increment;
        echo $this->brand . " is now at " . $this->speed . " km/h\n";
    }
}

// Usage
$car = new Car("Toyota");
echo $car->brand;
$car->accelerate(50);

?>