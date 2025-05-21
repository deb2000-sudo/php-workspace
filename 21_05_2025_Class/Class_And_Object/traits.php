<?php

trait Loggable {
    public function log(string $message): void {
        echo "Log: " . $message . "\n";
    }
}

class Truck {
    use Loggable;

    private $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function deliver(): void {
        $this->log("Delivering goods with " . $this->name);
    }
}

// Usage
$truck = new Truck("Volvo");
$truck->deliver();
?>