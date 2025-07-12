<?php
class Task {
    private $conn;
    private $table_name = "tasks";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($title, $description) {
        $query = "INSERT INTO " . $this->table_name . " (title, description, completed) VALUES (:title, :description, 0)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        
        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function toggle($id) {
        $query = "UPDATE " . $this->table_name . " SET completed = NOT completed WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt-> bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>