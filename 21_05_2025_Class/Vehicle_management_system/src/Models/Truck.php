<?php
namespace App\Models;

use App\Interfaces\Drivable;
use App\Traits\Loggable;

class Truck extends Vehicle implements Drivable {
    use Loggable;

    public function __construct(string $type) {
        parent::__construct($type);
    }

    public function drive(int $distance): string {
        $message = "{$this->type} truck drove {$distance} km";
        $this->log($message);
        return $message;
    }
}