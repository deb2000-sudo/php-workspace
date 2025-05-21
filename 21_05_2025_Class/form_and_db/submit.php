<?php
// Include database connection
include 'db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    // Validate inputs
    if (empty($name) || empty($email)) {
        echo "Please fill all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        // Prepare and execute SQL query
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $email);
        
        if ($stmt->execute()) {
            echo "Data submitted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
        
        $stmt->close();
    }
}

$conn->close();
?>