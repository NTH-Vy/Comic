<?php
namespace App\Controllers;

use App\Models\ComicModel;

class ComicController {
    private $comicModel;

    public function __construct() {
        $this->comicModel = new ComicModel();
    }

    public function showFullManga() {
        try {
            $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
            $perPage = 12; // Số truyện mỗi trang
            $offset = ($page - 1) * $perPage;
            
            // Lấy dữ liệu
            $comics = $this->comicModel->getAllComics($offset, $perPage);
            $genres = $this->comicModel->getAllGenres();
            $totalComics = $this->comicModel->getTotalComics();
            
            // Debug
            error_log("Comics data: " . print_r($comics, true));
            error_log("Total comics: " . $totalComics);
            
            if(empty($comics)) {
                error_log("Không có dữ liệu truyện");
            }
            
            $totalPages = ceil($totalComics / $perPage);
            $currentPage = min($page, $totalPages);
            
            // Truyền dữ liệu vào view
            require_once "app/Views/fullmanga.php";
        } catch (\Exception $e) {
            error_log("Error in showFullManga: " . $e->getMessage());
            echo "Có lỗi xảy ra. Vui lòng thử lại sau.";
        }
    }
} 