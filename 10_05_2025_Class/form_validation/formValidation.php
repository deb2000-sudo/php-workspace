<?php
// Initialize variables to store form data and error messages
$name = $email = $password = "";
$nameErr = $emailErr = $passwordErr = "";
$successMsg = "";

// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name: Ensure the name field is not empty
    // empty($var): Checks if a variable is empty (null, "", 0, false, etc.)
    if (empty($_POST["name"])) {
        $nameErr = "Name is required"; // Set error if name is empty
    } else {
        $name = test_input($_POST["name"]); // Sanitize and store name
        // preg_match($pattern, $subject): Performs a regular expression match
        // Pattern /^[a-zA-Z ]*$/ ensures only letters and spaces are allowed
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed"; // Set error for invalid characters
        }
    }

    // Validate Email: Ensure the email field is not empty
    // empty($var): Checks if a variable is empty (null, "", 0, false, etc.)
    if (empty($_POST["email"])) {
        $emailErr = "Email is required"; // Set error if email is empty
    } else {
        $email = test_input($_POST["email"]); // Sanitize and store email
        // filter_var($value, FILTER_VALIDATE_EMAIL): Validates if the value is a valid email format
        // Returns false if the email format is invalid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; // Set error for invalid email
        }
    }

    // Validate Password: Ensure the password field is not empty
    // empty($var): Checks if a variable is empty (null, "", 0, false, etc.)
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required"; // Set error if password is empty
    } else {
        $password = test_input($_POST["password"]); // Sanitize and store password
        // Check if password length is at least 8 characters
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long"; // Set error for short password
        }
    }

    // Process form if there are no validation errors
    // empty($var): Checks if error variables are empty to confirm no validation issues
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        $successMsg = "Form submitted successfully!"; // Display success message
        // Additional processing (e.g., database storage) can be added here
        $name = $email = $password = ""; // Clear form fields after successful submission
    }
}

// Function to sanitize user input for security and cleanliness
function test_input($data) {
    $data = trim($data); // Remove leading/trailing whitespace from the input
    // stripslashes($str): Removes backslashes used to escape characters (e.g., O\'Connor becomes O'Connor)
    $data = stripslashes($data);
    // htmlspecialchars($str): Converts special HTML characters to entities (e.g., <script> becomes <script>) to prevent XSS attacks
    $data = htmlspecialchars($data);
    return $data; // Return the sanitized input
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation</title>
    <style>
        .error { color: red; } /* Style for error messages */
        .success { color: green; } /* Style for success message */
        .form-group { margin-bottom: 15px; } /* Spacing for form fields */
        label { display: inline-block; width: 100px; } /* Align labels */
        input[type="text"], input[type="email"], input[type="password"] {
            padding: 5px; width: 200px; /* Style input fields */
        }
    </style>
</head>
<body>
    <h2>PHP Form Validation Example</h2>
    <p><span class="success"><?php echo $successMsg; ?></span></p> <!-- Display success message -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> <!-- Form submits to itself -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>"> <!-- Name input with preserved value -->
            <span class="error"><?php echo $nameErr; ?></span> <!-- Display name error -->
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"> <!-- Email input with preserved value -->
            <span class="error"><?php echo $emailErr; ?></span> <!-- Display email error -->
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"> <!-- Password input -->
            <span class="error"><?php echo $passwordErr; ?></span> <!-- Display password error -->
        </div>
        <div class="form-group">
            <input type="submit" value="Submit"> <!-- Submit button -->
        </div>
    </form>
</body>
</html>