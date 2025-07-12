<?php

// Contract 1: Can it fly?
interface Flyable {
    public function fly();
}

// Contract 2: Can it swim?
interface Swimmable {
    public function swim();
}

// This class signs BOTH contracts, separated by a comma
class Duck implements Flyable, Swimmable {
    public function fly() {
        return "I'm flapping my wings and flying!";
    }

    public function swim() {
        return "I'm paddling my feet and swimming!";
    }
}

// This class only signs one contract
class Fish implements Swimmable {
    public function swim() {
        return "I'm swishing my tail and swimming!";
    }
}


// Let's use our multi-talented duck!
$duck = new Duck();
echo "The duck says: " . $duck->fly();   // Works!
echo "<br>";
echo "The duck also says: " . $duck->swim(); // Works!
echo "<br><br>";

$fish = new Fish();
echo "The fish says: " . $fish->swim(); // Works!
//echo $fish->fly(); // This would cause a FATAL ERROR because Fish did not sign the Flyable contract.