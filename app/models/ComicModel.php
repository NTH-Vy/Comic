<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class ComicModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getChapters($comicId) {
        $sql = "SELECT ch.*, c.title as comic_title 
                FROM chapters ch
                JOIN comics c ON ch.comic_id = c.comic_id
                WHERE ch.comic_id = :comic_id 
                ORDER BY ch.chapter_number DESC";
        
        return $this->db->query($sql, [':comic_id' => $comicId])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($comicId) {
        $sql = "SELECT c.*, a.name as author_name,
                GROUP_CONCAT(DISTINCT cat.name) as categories,
                COUNT(DISTINCT ch.chapter_id) as total_chapters,
                GROUP_CONCAT(DISTINCT cat.category_id) as category_ids
                FROM comics c 
                LEFT JOIN authors a ON c.author_id = a.author_id
                LEFT JOIN comic_categories cc ON c.comic_id = cc.comic_id
                LEFT JOIN categories cat ON cc.category_id = cat.category_id
                LEFT JOIN chapters ch ON c.comic_id = ch.comic_id
                WHERE c.comic_id = :id
                GROUP BY c.comic_id";
        
        return $this->db->query($sql, [':id' => $comicId])->fetch(PDO::FETCH_ASSOC);
    }

    public function update_views($comicId) {
        $sql = "UPDATE comics 
                SET views = views + 1 
                WHERE comic_id = :comic_id";
        return $this->db->query($sql, [':comic_id' => $comicId]);
    }

    public function getRelatedComics($comicId, $categoryIds, $limit = 5) {
        if (empty($categoryIds)) return [];

        $categoryIdsArray = explode(',', $categoryIds);
        $placeholders = str_repeat('?,', count($categoryIdsArray) - 1) . '?';
        
        $sql = "SELECT DISTINCT c.*, a.name as author_name 
                FROM comics c 
                LEFT JOIN authors a ON c.author_id = a.author_id
                JOIN comic_categories cc ON c.comic_id = cc.comic_id
                WHERE cc.category_id IN ($placeholders)
                AND c.comic_id != ?
                GROUP BY c.comic_id
                ORDER BY c.views DESC 
                LIMIT ?";
        
        $params = array_merge($categoryIdsArray, [$comicId, $limit]);
        return $this->db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllComics($offset, $limit) {
        try {
            $sql = "SELECT c.*, a.name as author_name,
                    GROUP_CONCAT(DISTINCT cat.name) as categories
                    FROM comics c 
                    LEFT JOIN authors a ON c.author_id = a.author_id
                    LEFT JOIN comic_categories cc ON c.comic_id = cc.comic_id
                    LEFT JOIN categories cat ON cc.category_id = cat.category_id
                    GROUP BY c.comic_id
                    ORDER BY c.comic_id DESC 
                    LIMIT :offset, :limit";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error in getAllComics: " . $e->getMessage());
            return [];
        }
    }

    public function getTotalComics() {
        try {
            $sql = "SELECT COUNT(*) as total FROM comics";
            $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
            return (int)$result['total'];
        } catch (\PDOException $e) {
            error_log("Error in getTotalComics: " . $e->getMessage());
            return 0;
        }
    }

    public function getAllGenres() {
        try {
            $sql = "SELECT * FROM danhmuc";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }
    public function getAll() {
        try {
            $sql = "SELECT * FROM comics";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error in getAll: " . $e->getMessage());
            return [];
        }
    }
    public function getTopComics() {
        try {
            $sql = "SELECT * FROM comics ORDER BY favorites DESC LIMIT 8";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error in getTopComics: " . $e->getMessage());
            return [];
        }
    }
    
    
    
}