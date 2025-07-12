<?php
require_once '../src/TaskController.php';
$taskController = new TaskController();
$tasks = $taskController->index();
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="container">
    <h2>To-Do List</h2>
    
    <!-- Add Task Form -->
    <form action="../src/TaskController.php" method="POST">
        <input type="text" name="title" placeholder="Task title" required>
        <textarea name="description" placeholder="Task description"></textarea>
        <button type="submit" name="add">Add Task</button>
    </form>

    <!-- Task List -->
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['title']); ?></td>
                    <td><?php echo htmlspecialchars($task['description']); ?></td>
                    <td><?php echo $task['completed'] ? 'Completed' : 'Pending'; ?></td>
                    <td>
                        <form action="../src/TaskController.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <button type="submit" name="toggle"><?php echo $task['completed'] ? 'Undo' : 'Complete'; ?></button>
                        </form>
                        <form action="../src/TaskController.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
<script src="js/main.js"></script>
</body>
</html>