<?php
// Database connection parameters
$servername = "localhost";  // Server name (usually localhost for local development)
$username = "root";         // Database username (default for XAMPP/WAMP)
$password = "root";         // Database password (default for XAMPP/WAMP)
$dbname = "form_db";        // Name of the database to connect to

// Create a new MySQLi connection object
// MySQLi is an improved version of MySQL extension with better security and features
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection was successful
// connect_error property contains error message if connection fails
if ($conn->connect_error) {
    // die() function stops script execution and displays error message
    die("Connection failed: " . $conn->connect_error);
}
?>