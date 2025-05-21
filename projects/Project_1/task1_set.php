<?php
session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    
    if (empty($username)) {
        $message = 'Username is required.';
    } else {
        $_SESSION['username'] = $username;
        $message = 'Username saved! Go to next page';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Set Username</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
        }
        input[type="submit"] {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <h2>Set Username</h2>
    
    <?php if ($message): ?>
        <div class="message <?php echo strpos($message, 'required') !== false ? 'error' : 'success'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <input type="submit" value="Submit">
    </form>

    <?php if (isset($_SESSION['username'])): ?>
        <p><a href="task1_get.php">Go to next page</a></p>
    <?php endif; ?>
</body>
</html> 