<?php

// 1. DEFINE THE TOOLKIT (TRAIT)
trait Logger {
    // This method will be "copied" into any class that uses this trait.
    public function log($message) {
        // In a real app, this might write to a file.
        // For now, we'll just echo it.
        echo "[" . date("Y-m-d H:i:s") . "] " . $message . "<br>";
    }
}

// 2. CREATE UNRELATED CLASSES
class User {
    // Now, we just `use` the trait.
    use Logger;

    public $name;

    public function __construct($name) {
        $this->name = $name;
        // We can use the log() method as if it were written right here!
        $this->log("New user created: " . $this->name);
    }
}

class Product {
    // This class also gets the Logger toolkit.
    use Logger;

    public $title;

    public function updatePrice($newPrice) {
        $this->title = "Awesome T-Shirt";
        $this->log("Price updated to $" . $newPrice . " for product: " . $this->title);
    }
}

// 3. LET'S USE THEM!
$user = new User("Alice");
// Output: [2025-06-10 12:08:24] New user created: Alice

$product = new Product();
$product->updatePrice(25);
// Output: [2025-06-10 12:08:24] Price updated to $25 for product: Awesome T-Shirt