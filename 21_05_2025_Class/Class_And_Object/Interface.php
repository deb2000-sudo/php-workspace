<?php
interface Drivable {
    public function drive(int $distance): string;
}

class Motorcycle implements Drivable {
    private $brand;

    public function __construct(string $brand) {
        $this->brand = $brand;
    }

    public function drive(int $distance): string {
        return $this->brand . " motorcycle drove " . $distance . " km";
    }
}

class Car implements Drivable {
    private $brand;

    public function __construct(string $brand) {
        $this->brand = $brand;
    }

    public function drive(int $distance): string {
        return $this->brand . " car drove " . $distance . " km";
    }
}

// Usage
$bike = new Motorcycle("Honda");
echo $bike->drive(100) . "\n";

$car=new Car("Tata");
echo $car->drive(200)."\n";

?>