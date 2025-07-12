<?php

// 1. CREATE THE PARENT CLASS
class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
        echo $this->name . " was born.<br>";
    }

    public function eat() {
        return "Yum, I am eating.";
    }

    public function sleep() {
        return "Zzzz...";
    }
}

// 2. CREATE THE CHILD CLASS USING `extends`
// Dog inherits all public properties and methods from Animal
class Dog extends Animal {

    // You can add methods that are unique to the Dog class
    public function bark() {
        return "Woof! Woof!";
    }
}

// 3. LET'S USE OUR CLASSES!
$genericAnimal = new Animal("Creature");
echo $genericAnimal->eat(); // Output: Yum, I am eating.
echo "<br><br>";

$buddy = new Dog("Buddy"); // The constructor from Animal is called! Output: Buddy was born.

// Buddy can use methods from the Animal class because it inherited them!
echo $buddy->name . " says: " . $buddy->eat();   // Output: Buddy says: Yum, I am eating.
echo "<br>";
echo $buddy->name . " is sleeping: " . $buddy->sleep(); // Output: Buddy is sleeping: Zzzz...
echo "<br>";

// Buddy can also use its own, unique method
echo $buddy->name . " says: " . $buddy->bark();  // Output: Buddy says: Woof! Woof!