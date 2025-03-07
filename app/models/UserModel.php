<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function insert($userEmail, $username, $password, $role = 'user') {
        $sql = "INSERT INTO users (user_email, username, password, role) 
                VALUES (:user_email, :username, :password, :role)";
        
        return $this->db->query($sql, [
            ':user_email' => $userEmail,
            ':username' => $username,
            ':password' => $password,
            ':role' => $role
        ]);
    }

    public function delete($userId) {
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        return $this->db->query($sql, [':user_id' => $userId]);
    }

    public function getAll() {
        $sql = "SELECT * FROM users ORDER BY user_id DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($userId) {
        $sql = "SELECT * FROM users WHERE user_id = :user_id";
        return $this->db->query($sql, [':user_id' => $userId])->fetch(PDO::FETCH_ASSOC);
    }

    public function checkEmail($email) {
        $sql = "SELECT * FROM users WHERE user_email = :email";
        return $this->db->query($sql, [':email' => $email])->fetch(PDO::FETCH_ASSOC);
    }

    public function checkUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        return $this->db->query($sql, [':username' => $username])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($userId, $userEmail, $username, $password = null, $role = null) {
        if ($password) {
            $sql = "UPDATE users SET 
                    user_email = :email,
                    username = :username,
                    password = :password,
                    role = :role 
                    WHERE user_id = :id";
            $params = [
                ':email' => $userEmail,
                ':username' => $username,
                ':password' => $password,
                ':role' => $role,
                ':id' => $userId
            ];
        } else {
            $sql = "UPDATE users SET 
                    user_email = :email,
                    username = :username,
                    role = :role 
                    WHERE user_id = :id";
            $params = [
                ':email' => $userEmail,
                ':username' => $username,
                ':role' => $role,
                ':id' => $userId
            ];
        }
        return $this->db->query($sql, $params);
    }
}

?>
