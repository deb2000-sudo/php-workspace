<?php
namespace App\Models;

class ElectricCar extends Vehicle {
    public function __construct(string $type) {
        parent::__construct($type);
    }

    public function charge(): string {
        return "Charging the electric {$this->type}";
    }
}