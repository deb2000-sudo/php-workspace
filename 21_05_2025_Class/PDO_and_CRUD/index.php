<?php
// Database connection settings
$dsn = "mysql:host=localhost;dbname=school;charset=utf8mb4";
$username = "root"; // Replace with your MySQL username
$password = "root"; // Replace with your MySQL password

try {
    // Initialize PDO with error mode set to exceptions
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create a new student
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO students (name, email, age) VALUES (:name, :email, :age)");
        // $stmt->execute(['name' => $name, 'email' => $email, 'age' => $age]);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':age', $age);
        $stmt->execute();
        $message = "Student created successfully!";
    } catch (PDOException $e) {
        $message = "Error creating student: " . $e->getMessage();
    }
}

// Read all students
try {
    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $message = "Error reading students: " . $e->getMessage();
}

// Update a student
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    
    try {
        $stmt = $pdo->prepare("UPDATE students SET name = :name, email = :email, age = :age WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email, 'age' => $age]);
        $message = "Student updated successfully!";
    } catch (PDOException $e) {
        $message = "Error updating student: " . $e->getMessage();
    }
}

// Delete a student
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $message = "Student deleted successfully!";
        // header("Location: index.php"); 

    } catch (PDOException $e) {
        $message = "Error deleting student: " . $e->getMessage();
    }
}

// Fetch student for editing
$editStudent = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    try {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $editStudent = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $message = "Error fetching student: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .form-container { margin-bottom: 20px; }
        .message { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Student Management System</h2>
    
    <!-- Display messages -->
    <?php if (isset($message)): ?>
        <p class="<?php echo strpos($message, 'Error') === false ? 'message' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>
    
    <!-- Create/Update Form -->
    <div class="form-container">
        <h3><?php echo $editStudent ? 'Update Student' : 'Add New Student'; ?></h3>
        <form method="post">
            <?php if ($editStudent): ?>
                <input type="hidden" name="id" value="<?php echo $editStudent['id']; ?>">
            <?php endif; ?>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $editStudent ? htmlspecialchars($editStudent['name']) : ''; ?>" required>
            <br><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $editStudent ? htmlspecialchars($editStudent['email']) : ''; ?>" required>
            <br><br>
            <label>Age:</label>
            <input type="number" name="age" value="<?php echo $editStudent ? htmlspecialchars($editStudent['age']) : ''; ?>" required>
            <br><br>
            <button type="submit" name="<?php echo $editStudent ? 'update' : 'create'; ?>">
                <?php echo $editStudent ? 'Update' : 'Create'; ?>
            </button>
        </form>
    </div>
    
    <!-- Student List -->
    <h3>Student List</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo htmlspecialchars($student['id']); ?></td>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo htmlspecialchars($student['age']); ?></td>
                <td>
                    <a href="?edit=<?php echo $student['id']; ?>">Edit</a> |
                    <a href="?delete=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>