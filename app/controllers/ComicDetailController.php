<?php
namespace App\Controllers;

use App\Models\ComicModel;
use App\Models\CommentModel;
use App\Helpers\TimeHelper;

class ComicDetailController {
    private $comicModel;
    private $commentModel;

    public function __construct() {
        $this->comicModel = new ComicModel();
        $this->commentModel = new CommentModel();
    }

    public function show($id) {
        // Lấy thông tin truyện
        $comic = $this->comicModel->getById($id);
        
        if (!$comic) {
            // Xử lý khi không tìm thấy truyện
            header("Location: index.php");
            exit;
        }

        // Lấy danh sách chapter
        $chapters = $this->comicModel->getChapters($id);

        // Lấy danh sách bình luận
        $comments = $this->commentModel->getByComicId($id);

        // Cập nhật lượt xem
        $this->comicModel->update_views($id);

        // Lấy truyện liên quan (cùng thể loại)
        $relatedComics = [];
        if (!empty($comic['category_id'])) {
            $relatedComics = $this->comicModel->getRelatedComics($id, $comic['category_id']);
        }

        // Truyền helper vào view
        $timeHelper = new TimeHelper();

        // Định nghĩa hàm timeAgo để sử dụng trong view
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

        // Load view với dữ liệu
        require_once 'app/views/detailmanga.php';
    }
} 