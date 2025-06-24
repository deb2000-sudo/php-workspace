<?php

// 1. Introduction to Arrays
// Arrays are variables that can hold multiple values in a single container
$shopping_list = ["Milk", "Bread", "Eggs", "Butter"];
$student_list = ["Alice", "Bob", "Charlie"];

$product_info = [
    "name" => "Laptop",
    "price" => 1200,
    "color" => "Silver",
    "in_stock" => true
];

// Display arrays using print_r for better visualization
echo "<h2>1. Basic Arrays</h2>";
echo "<pre>";
print_r($shopping_list);
print_r($student_list);
print_r($product_info);
echo "</pre>";

// 2. Adding/Removing Elements
echo "<h2>2. Adding/Removing Elements</h2>";

// array_push() - Adds elements to the end
$fruits = ["Apple", "Banana"];
array_push($fruits, "Cherry", "Date","Mango");
echo "<h3>array_push() example:</h3>";
echo "<pre>";
print_r($fruits);
echo "</pre>";

// array_pop() - Removes and returns last element
$last_fruit = array_pop($fruits);
echo "<h3>array_pop() example:</h3>";
echo "Removed fruit: $last_fruit<br>";
echo "<pre>";
print_r($fruits);
echo "</pre>";

// array_unshift() - Adds elements to the beginning
$cars = ["BMW", "Mercedes"];
array_unshift($cars, "Audi", "Volvo");
echo "<h3>array_unshift() example:</h3>";
echo "<pre>";
print_r($cars);
echo "</pre>";

// array_shift() - Removes and returns first element
$first_car = array_shift($cars);
echo "<h3>array_shift() example:</h3>";
echo "Removed car: $first_car<br>";
echo "<pre>";
print_r($cars);
echo "</pre>";

// 3. Checking Existence
echo "<h2>3. Checking Existence</h2>";

// in_array() - Checks if a value exists
$shopping_list = ["Milk", "Bread", "Eggs"];
echo "<h3>in_array() example:</h3>";
if (in_array("Bread", $shopping_list)) {
    echo "Yes, Bread is on the list!<br>";
}
if (!in_array("Cheese", $shopping_list)) {
    echo "No, Cheese is not on the list.<br>";
}

// array_key_exists() - Checks if a key exists
$person = ["name" => "Alice", "age" => 30];
echo "<h3>array_key_exists() example:</h3>";
if (array_key_exists("1", $shopping_list)) {
    echo "Yes, key 0 exists!<br>";
}else{
    echo "not working age";
}

// 4. Counting Elements
echo "<h2>4. Counting Elements</h2>";

// count() - Returns number of elements
$students = ["Sarah", "Mike", "Emily", "David"];
$num_students = count($students);
echo "<h3>count() example:</h3>";
echo "Number of students: $num_students<br>";

$empty_array = [];
echo "Number of items in empty array: " . count($empty_array) . "<br>";

// 5. Sorting Arrays
echo "<h2>5. Sorting Arrays</h2>";

// sort() - Sorts in ascending order
$numbers = [5, 2, 8, 1];
sort($numbers);
echo "<h3>sort() example (numbers):</h3>";
echo "<pre>";
print_r($numbers);
echo "</pre>";

$names = ["Charlie", "Alice", "Bob"];
sort($names);
echo "<h3>sort() example (names):</h3>";
echo "<pre>";
print_r($names);
echo "</pre>";

// rsort() - Sorts in descending order
rsort($numbers);
echo "<h3>rsort() example:</h3>";
echo "<pre>";
print_r($numbers);
echo "</pre>";

// 6. Combining Arrays
echo "<h2>6. Combining Arrays</h2>";

// array_merge() - Merges multiple arrays
$list1 = ["Milk", "Bread"];
$list2 = ["Eggs", "Butter"];
$combined_list = array_merge($list1, $list2);
echo "<h3>array_merge() example:</h3>";
echo "<pre>";
print_r($combined_list);
echo "</pre>";

// 7. Real-World Example
echo "<h2>7. Real-World Example: Shopping Cart</h2>";

$cart = [
    ["name" => "T-Shirt", "price" => 20],
    ["name" => "Jeans", "price" => 50]
];

// Add new item
array_push($cart, ["name" => "Shoes", "price" => 80]);
print_r($cart);
// Calculate total
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'];
}

echo "<h3>Shopping Cart Contents:</h3>";
echo "<pre>";
print_r($cart);
echo "</pre>";
echo "Total Price: $$total";
?>