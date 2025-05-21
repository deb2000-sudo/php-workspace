<?php
session_start();

$message = isset($_SESSION['username']) 
    ? 'Welcome, ' . htmlspecialchars($_SESSION['username']) . '!'
    : 'No username found.';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Get Username</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
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
    <h2>Welcome Page</h2>
    
    <div class="message <?php echo isset($_SESSION['username']) ? 'success' : 'error'; ?>">
        <?php echo $message; ?>
    </div>

    <p><a href="task1_set.php">Back to Set Username</a></p>
</body>
</html> 