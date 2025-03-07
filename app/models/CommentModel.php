<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class CommentModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function insert($user_id, $comic_id, $content) {
        $sql = "INSERT INTO comments (user_id, comic_id, content) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$user_id, $comic_id, $content]);
    }

    public function getByComicId($comic_id) {
        $sql = "SELECT c.*, u.username 
                FROM comments c 
                LEFT JOIN users u ON c.user_id = u.user_id 
                WHERE c.comic_id = ? 
                ORDER BY c.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$comic_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Hàm hỗ trợ format thời gian
function timeAgo($datetime) {
    $now = new \DateTime;
    $ago = new \DateTime($datetime);
    $diff = $now->diff($ago);

    if ($diff->y > 0) return $diff->y . ' năm trước';
    if ($diff->m > 0) return $diff->m . ' tháng trước';
    if ($diff->d > 0) return $diff->d . ' ngày trước';
    if ($diff->h > 0) return $diff->h . ' giờ trước';
    if ($diff->i > 0) return $diff->i . ' phút trước';
    return 'Vừa xong';
} 