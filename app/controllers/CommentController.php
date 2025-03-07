<?php
namespace App\Controllers;

use App\Models\CommentModel;

class CommentController {
    private $commentModel;

    public function __construct() {
        $this->commentModel = new CommentModel();
    }

    public function addComment() {
        if(!isset($_SESSION['user'])) {
            header("Location: index.php?act=login");
            exit;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
            $user_id = $_SESSION['user']['user_id'];
            $comic_id = $_POST['comic_id'];
            $content = $_POST['content'];
            
            if(!empty($content)) {
                $this->commentModel->insert($user_id, $comic_id, $content);
            }
            
            header("Location: index.php?act=detailmanga&id=" . $comic_id);
            exit;
        }
    }
} 