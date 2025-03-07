<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $conn = null;
    
    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=localhost;dbname=comic;charset=utf8mb4",
                "root",
                "",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
                ]
            );
        } catch(PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            throw new \Exception("Không thể kết nối đến database.");
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }
    
    public function query($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            error_log("Query Error: " . $e->getMessage());
            throw new \Exception("Lỗi truy vấn database");
        }
    }
    
    public function queryOne($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Query Error: " . $e->getMessage());
            throw new \Exception("Lỗi truy vấn database");
        }
    }
    
    public function execute($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            error_log("Execute Error: " . $e->getMessage());
            throw new \Exception("Lỗi thực thi truy vấn");
        }
    }
}
