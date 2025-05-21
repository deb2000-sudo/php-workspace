<?php
class Vehicle {
    protected $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function move(): void {
        echo $this->type . " is moving\n";
    }
}

class ElectricCar extends Vehicle {
    public function charge(): void {
        echo "Charging the electric " . $this->type . "\n";
    }

    // Override parent method
    public function move(): void {
        echo "Electric " . $this->type . " is moving silently\n";
    }
}

// Usage
$tesla = new ElectricCar("Tesla");
$tesla->move();
$tesla->charge();
?>