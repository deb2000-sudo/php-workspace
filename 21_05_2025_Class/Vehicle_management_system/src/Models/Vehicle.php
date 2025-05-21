<?php
namespace App\Models;

class Vehicle {
    protected $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getType(): string {
        return $this->type;
    }
}