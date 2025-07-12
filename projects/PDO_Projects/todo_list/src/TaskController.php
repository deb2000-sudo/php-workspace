<?php
require_once '../config/database.php';
require_once 'Task.php';

class TaskController {
    private $task;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $temptask=new Task($db);
        $this->task = $temptask;
    }

    public function index() {
        return $this->task->read();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                $this->task->create($_POST['title'], $_POST['description']);
            } elseif (isset($_POST['toggle'])) {
                $this->task->toggle($_POST['id']);
            } elseif (isset($_POST['delete'])) {
                $this->task->delete($_POST['id']);
            }
            header('Location: ../public/index.php');
            exit();
        }
    }
}

$controller = new TaskController();
$controller->handleRequest();
?>