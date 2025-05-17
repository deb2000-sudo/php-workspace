<?php
// session_start(): Starts or resumes a session, creating a session ID if none exists
// Must be called before any output to ensure session cookies are sent
session_start();

// Initialize variables for messages
$successMsg = $errorMsg = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set session username
    if (!empty($_POST["username"])) {
        // Sanitize input to prevent XSS
        $_SESSION["username"] = htmlspecialchars($_POST["username"]);
        $successMsg = "Username set in session!";
    } else {
        $errorMsg = "Username is required.";
    }

    // Set theme cookie
    if (!empty($_POST["theme"])) {
        // setcookie($name, $value, $expire, $path, $domain, $secure, $httponly): Sets a cookie
        // Expires in 30 days, available site-wide (path="/")
        $theme = $_POST["theme"];
        setcookie("user_theme", $theme, time() + (30 * 24 * 60 * 60), "/");
        $successMsg .= " Theme cookie set!";
    }

    // Clear session and cookie
    if (isset($_POST["clear"])) {
        // session_unset(): Removes all session variables
        session_unset();
        // session_destroy(): Destroys the session data on the server
        session_destroy();
        // Set cookie to expire in the past to delete it
        setcookie("user_theme", "", time() - 3600, "/");
        $successMsg = "Session and cookie cleared!";
    }
}

// Get theme from cookie, default to light
$theme = isset($_COOKIE["user_theme"]) ? $_COOKIE["user_theme"] : "light";
$bgClass = $theme === "dark" ? "bg-gray-800 text-white" : "bg-gray-100 text-gray-800";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sessions and Cookies</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="<?php echo $bgClass; ?> min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md <?php echo $theme === 'dark' ? 'dark:bg-gray-700 dark:text-white' : ''; ?>">
        <h2 class="text-2xl font-bold mb-6 text-center <?php echo $theme === 'dark' ? 'text-white' : 'text-gray-800'; ?>">PHP Sessions and Cookies</h2>

        <?php if ($successMsg): ?>
            <p class="text-green-600 font-medium mb-4 text-center"><?php echo $successMsg; ?></p>
        <?php endif; ?>
        <?php if ($errorMsg): ?>
            <p class="text-red-500 font-medium mb-4 text-center"><?php echo $errorMsg; ?></p>
        <?php endif; ?>

        <!-- Display current session and cookie data -->
        <div class="mb-6">
            <p><strong>Session Username:</strong> <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : "Not set"; ?></p>
            <p><strong>Theme Cookie:</strong> <?php echo htmlspecialchars($theme); ?></p>
        </div>

        <form method="post" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium <?php echo $theme === 'dark' ? 'text-gray-200' : 'text-gray-700'; ?>">Username</label>
                <input type="text" name="username" id="username" 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="theme" class="block text-sm font-medium <?php echo $theme === 'dark' ? 'text-gray-200' : 'text-gray-700'; ?>">Theme Preference</label>
                <select name="theme" id="theme" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                </select>
            </div>
            <div class="flex space-x-4">
                <button type="submit" 
                        class="flex-1 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
                <button type="submit" name="clear" value="1" 
                        class="flex-1 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Clear
                </button>
            </div>
        </form>
    </div>
</body>
</html>