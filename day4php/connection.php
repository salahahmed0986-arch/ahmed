<?php

class DB {
    private $pdo;
    private $allowedTables = ['users', 'employees', 'departments', 'projects'];

    public function __construct() {
        $host = 'localhost';
        $db = 'company_db';
        $user = 'root';
        $pass = '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    private function checkTable($table) {
        if (!in_array($table, $this->allowedTables)) {
            throw new Exception("Invalid table name: $table");
        }
    }

    public function index($table) {
        $this->checkTable($table);
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($table, $id) {
        $this->checkTable($table);
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($table, $data) {
        $this->checkTable($table);

        if ($table === 'users') {
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            return $stmt->execute([$data['name'], $data['email'], $hashedPassword]);
        }

        if ($table === 'employees') {
            $stmt = $this->pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
            return $stmt->execute([$data['name'], $data['position'], $data['salary']]);
        }

        if ($table === 'departments') {
            $stmt = $this->pdo->prepare("INSERT INTO departments (name) VALUES (?)");
            return $stmt->execute([$data['name']]);
        }

        if ($table === 'projects') {
            $stmt = $this->pdo->prepare("INSERT INTO projects (title, budget) VALUES (?, ?)");
            return $stmt->execute([$data['title'], $data['budget']]);
        }

        throw new Exception("Unsupported table: $table");
    }

    public function update($table, $id, $data) {
        $this->checkTable($table);

        if ($table === 'users') {
            $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
            return $stmt->execute([$data['name'], $data['email'], $id]);
        }

        if ($table === 'employees') {
            $stmt = $this->pdo->prepare("UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?");
            return $stmt->execute([$data['name'], $data['position'], $data['salary'], $id]);
        }

        if ($table === 'departments') {
            $stmt = $this->pdo->prepare("UPDATE departments SET name = ? WHERE id = ?");
            return $stmt->execute([$data['name'], $id]);
        }

        if ($table === 'projects') {
            $stmt = $this->pdo->prepare("UPDATE projects SET title = ?, budget = ? WHERE id = ?");
            return $stmt->execute([$data['title'], $data['budget'], $id]);
        }

        throw new Exception("Unsupported table: $table");
    }

    public function delete($table, $id) {
        $this->checkTable($table);
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function findByColumn($table, $column, $value) {
        $this->checkTable($table);
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $column = ?");
        $stmt->execute([$value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$db = new DB();