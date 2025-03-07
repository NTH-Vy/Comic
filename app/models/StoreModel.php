<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class StoreModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getFeaturedProducts($limit = 10) {
        $sql = "SELECT s.*, u.username 
                FROM store s 
                LEFT JOIN users u ON s.user_id = u.user_id 
                ORDER BY s.created_at DESC 
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loadall_products($keyword = "") {
        $sql = "SELECT s.*, u.username 
                FROM store s 
                LEFT JOIN users u ON s.user_id = u.user_id";
        if($keyword != "") {
            $sql .= " WHERE s.product_name LIKE :keyword OR s.description LIKE :keyword";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
        } else {
            $stmt = $this->db->prepare($sql);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopProducts($limit = 5) {
        $sql = "SELECT s.*, u.username 
                FROM store s 
                LEFT JOIN users u ON s.user_id = u.user_id 
                ORDER BY s.price DESC 
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($product_id) {
        $sql = "SELECT s.*, u.username 
                FROM store s 
                LEFT JOIN users u ON s.user_id = u.user_id 
                WHERE s.product_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($product_name, $description, $price, $stock_quantity, $image, $user_id) {
        $sql = "INSERT INTO store(product_name, description, price, stock_quantity, image, user_id) 
                VALUES(:name, :desc, :price, :stock, :image, :user_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $product_name, PDO::PARAM_STR);
        $stmt->bindValue(':desc', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':stock', $stock_quantity, PDO::PARAM_INT);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($product_id, $product_name, $description, $price, $stock_quantity, $image = '') {
        if($image != '') {
            $sql = "UPDATE store SET 
                    product_name = :name, 
                    description = :desc, 
                    price = :price, 
                    stock_quantity = :stock,
                    image = :image
                    WHERE product_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        } else {
            $sql = "UPDATE store SET 
                    product_name = :name, 
                    description = :desc, 
                    price = :price, 
                    stock_quantity = :stock
                    WHERE product_id = :id";
            $stmt = $this->db->prepare($sql);
        }
        
        $stmt->bindValue(':name', $product_name, PDO::PARAM_STR);
        $stmt->bindValue(':desc', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':stock', $stock_quantity, PDO::PARAM_INT);
        $stmt->bindValue(':id', $product_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($product_id) {
        $sql = "DELETE FROM store WHERE product_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $product_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
} 