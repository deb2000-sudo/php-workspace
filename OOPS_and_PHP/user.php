<?php
class User {
    // Properties
    public $name;
    public $email;

    // A method to introduce the user
    public function sayHello() {
        // The '$this' keyword refers to THIS specific object.
        // It means "my own name".
        return "Hello, my name is " . $this->name . "!";
    }
}

// Create a user object for Alice
$userAlice = new User();
$userAlice->name = "Alice";
$userAlice->email = "alice@email.com";

// Create a user object for Bob
$userBob = new User();
$userBob->name = "Bob";
$userBob->email = "bob@email.com";


// Let's see them in action
echo $userAlice->sayHello();
// Output: Hello, my name is Alice!
echo "<br>";
echo "You can contact Alice at: " . $userAlice->email;
// Output: You can contact Alice at: alice@email.com

echo "<hr>"; // A horizontal line to separate things

echo $userBob->sayHello();
// Output: Hello, my name is Bob!
echo "<br>";
echo "You can contact Bob at: " . $userBob->email;
// Output: You can contact Bob at: bob@email.com

?>