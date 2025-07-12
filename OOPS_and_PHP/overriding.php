<?php

// 1. CREATE THE PARENT CLASS
class Employee {
    public $name;
    protected $salary; // `protected` means it can be accessed by this class and its children

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    // A general way to calculate pay
    public function calculatePay() {
        return "The pay for " . $this->name . " is $" . $this->salary;
    }
}

// 2. CREATE THE CHILD CLASS
class Manager extends Employee {

    private $bonus = 1000; // Managers get a bonus

    // This method has the SAME NAME as the one in the parent.
    // This is called METHOD OVERRIDING.
    public function calculatePay() {
        $totalPay = $this->salary + $this->bonus;
        return "The total pay for manager " . $this->name . " (including bonus) is $" . $totalPay;
    }
}

// 3. LET'S USE OUR CLASSES!
$employee = new Employee("Jim Halpert", 5000);
echo $employee->calculatePay(); // Calls the method from the Employee class
// Output: The pay for Jim Halpert is $5000
echo "<br><br>";

$manager = new Manager("Michael Scott", 7000);
echo $manager->calculatePay(); // Calls the OVERRIDDEN method from the Manager class
// Output: The total pay for manager Michael Scott (including bonus) is $8000