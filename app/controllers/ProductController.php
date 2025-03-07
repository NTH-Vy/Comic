<?php
namespace App\Controllers;

use App\Models\StoreModel;

class ProductController {
    private $storeModel;
    
    public function __construct() {
        $this->storeModel = new StoreModel();
    }
    
    public function showShop() {
        // Lấy sản phẩm nổi bật cho slider
        $featured_products = $this->storeModel->getFeaturedProducts();
        
        // Lấy tất cả sản phẩm
        $products = $this->storeModel->loadall_products();
        
        // Lấy top sản phẩm bán chạy
        $top_products = $this->storeModel->getTopProducts();
        
        // Include view
        include "app/views/shop.php";
    }
    
    public function addToCart() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? 0;
            $quantity = $_POST['quantity'] ?? 1;
            
            if($this->storeModel->addToCart($productId, $quantity)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể thêm vào giỏ hàng']);
            }
        }
    }
    
    public function buyNow() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? 0;
            if($this->storeModel->addToCart($productId, 1)) {
                header('Location: index.php?act=checkout');
                exit;
            }
        }
        header('Location: index.php?act=shop');
    }
} 