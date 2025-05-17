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
// trim($str): Removes leading/trailing whitespace from the input
// stripslashes($str): Removes backslashes used to escape characters (e.g., O\'Connor becomes O'Connor)
// htmlspecialchars($str): Converts special HTML characters to entities (e.g., <script> becomes &lt;script&gt;) to prevent XSS attacks
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">PHP Form Validation</h2>
        
        <?php if ($successMsg): ?>
            <p class="text-green-600 font-medium mb-4 text-center"><?php echo $successMsg; ?></p>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <?php if ($nameErr): ?>
                    <span class="text-red-500 text-xs mt-1 block"><?php echo $nameErr; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <?php if ($emailErr): ?>
                    <span class="text-red-500 text-xs mt-1 block"><?php echo $emailErr; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <?php if ($passwordErr): ?>
                    <span class="text-red-500 text-xs mt-1 block"><?php echo $passwordErr; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>