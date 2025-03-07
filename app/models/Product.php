<?php
namespace App\Models;

use App\Core\Database;

class Product {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function getAllProducts($keyword = "") {
        $sql = "SELECT s.*, u.username FROM store s 
                LEFT JOIN users u ON s.user_id = u.user_id";
        if($keyword != "") {
            $sql .= " WHERE product_name LIKE :keyword OR description LIKE :keyword";
            return $this->db->query($sql, [':keyword' => "%$keyword%"]);
        }
        return $this->db->query($sql);
    }
    
    public function getProductById($id) {
        $sql = "SELECT * FROM store WHERE product_id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }
    
    public function addToCart($productId, $quantity = 1) {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        $product = $this->getProductById($productId);
        if(!$product) return false;
        
        if(isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'id' => $productId,
                'name' => $product['product_name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => $quantity
            ];
        }
        return true;
    }
} 