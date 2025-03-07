<?php
function insert_comic($title, $description, $author_id, $status, $cover_image) {
    // Xử lý upload ảnh
    if(isset($_FILES['cover_image'])) {
        $target_dir = "../upload/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
        move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);
        $cover_image = basename($_FILES["cover_image"]["name"]);
    }

    $sql = "INSERT INTO comics(title, description, author_id, status, cover_image) 
            VALUES(?, ?, ?, ?, ?)";
    pdo_execute($sql, $title, $description, $author_id, $status, $cover_image);
}

function delete_comic($comic_id) {
    $sql = "DELETE FROM comics WHERE comic_id=" . $comic_id;
    pdo_execute($sql);
}

function count_comics($keyword = '') {
    $sql = "SELECT COUNT(*) as total FROM comics WHERE 1";
    if($keyword != '') {
        $sql .= " AND title LIKE ?";
        $result = pdo_query_one($sql, '%' . $keyword . '%');
    } else {
        $result = pdo_query_one($sql);
    }
    return (int)$result['total'];
}

function loadall_comics($page = 1, $items_per_page = 10, $keyword = '') {
    // Đảm bảo $page và $items_per_page là số nguyên
    $page = (int)$page;
    $items_per_page = (int)$items_per_page;
    
    // Tính vị trí bắt đầu
    $start = ($page - 1) * $items_per_page;
    
    $sql = "SELECT c.*, a.name as author_name 
            FROM comics c 
            LEFT JOIN authors a ON c.author_id = a.author_id
            WHERE 1";
    
    if($keyword != '') {
        $sql .= " AND c.title LIKE ?";
        $sql .= " ORDER BY c.comic_id DESC LIMIT $start, $items_per_page";
        return pdo_query($sql, '%' . $keyword . '%');
    } else {
        $sql .= " ORDER BY c.comic_id DESC LIMIT $start, $items_per_page";
        return pdo_query($sql);
    }
}

function loadone_comic($comic_id) {
    $sql = "SELECT * FROM comics WHERE comic_id=" . $comic_id;
    return pdo_query_one($sql);
}

function update_comic($comic_id, $title, $description, $author_id, $status, $cover_image = '') {
    if($cover_image != '') {
        $sql = "UPDATE comics SET 
                title=?, 
                description=?, 
                author_id=?, 
                status=?,
                cover_image=?
                WHERE comic_id=?";
        pdo_execute($sql, $title, $description, $author_id, $status, $cover_image, $comic_id);
    } else {
        $sql = "UPDATE comics SET 
                title=?, 
                description=?, 
                author_id=?, 
                status=?
                WHERE comic_id=?";
        pdo_execute($sql, $title, $description, $author_id, $status, $comic_id);
    }
}

function loadall_authors() {
    $sql = "SELECT * FROM authors ORDER BY author_id ASC";
    return pdo_query($sql);
}

function get_chapters_by_comic($comic_id) {
    $sql = "SELECT * FROM chapters WHERE comic_id = ? ORDER BY chapter_number DESC";
    return pdo_query($sql, $comic_id);
}

function get_chapter($chapter_id) {
    $sql = "SELECT * FROM chapters WHERE chapter_id = ?";
    return pdo_query_one($sql, $chapter_id);
}

function insert_chapter($comic_id, $title, $content, $chapter_number) {
    try {
        $sql = "INSERT INTO chapters (comic_id, title, content, chapter_number) 
                VALUES (?, ?, ?, ?)";
        pdo_execute($sql, $comic_id, $title, $content, $chapter_number);
        return true;
    } catch(PDOException $e) {
        error_log("Lỗi thêm chapter: " . $e->getMessage());
        return false;
    }
}

function update_chapter($chapter_id, $title, $content) {
    $sql = "UPDATE chapters SET title = ?, content = ? WHERE chapter_id = ?";
    pdo_execute($sql, $title, $content, $chapter_id);
}

function delete_chapter($chapter_id) {
    $sql = "DELETE FROM chapters WHERE chapter_id = ?";
    pdo_execute($sql, $chapter_id);
}

function get_top_comics($limit = 5) {
    $sql = "SELECT c.*, a.name as author_name,
            GROUP_CONCAT(cat.name) as categories
            FROM comics c 
            LEFT JOIN authors a ON c.author_id = a.author_id
            LEFT JOIN comic_categories cc ON c.comic_id = cc.comic_id
            LEFT JOIN categories cat ON cc.category_id = cat.category_id
            GROUP BY c.comic_id
            ORDER BY c.views DESC 
            LIMIT " . $limit;
    return pdo_query($sql);
}

function get_recent_read_comics($limit = 6) {
    $sql = "SELECT c.*, a.name as author_name, 
            GROUP_CONCAT(cat.name) as categories,
            ch.chapter_number,
            ch.created_at as last_read
            FROM comics c 
            LEFT JOIN authors a ON c.author_id = a.author_id
            LEFT JOIN comic_categories cc ON c.comic_id = cc.comic_id
            LEFT JOIN categories cat ON cc.category_id = cat.category_id
            LEFT JOIN chapters ch ON c.comic_id = ch.comic_id
            GROUP BY c.comic_id
            ORDER BY ch.created_at DESC 
            LIMIT " . $limit;
    return pdo_query($sql);
}

// Thêm bình luận mới
function insert_comment($user_id, $comic_id, $content) {
    $sql = "INSERT INTO comments (user_id, comic_id, content) VALUES (?, ?, ?)";
    return pdo_execute($sql, $user_id, $comic_id, $content);
}

// Lấy danh sách bình luận của truyện
function get_comments_by_comic($comic_id) {
    $sql = "SELECT c.*, u.username 
            FROM comments c 
            LEFT JOIN users u ON c.user_id = u.user_id 
            WHERE c.comic_id = ? 
            ORDER BY c.created_at DESC";
    return pdo_query($sql, $comic_id);
}

// Hàm format thời gian
function time_elapsed_string($datetime) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    if ($diff->y > 0) {
        return $diff->y . ' năm trước';
    }
    if ($diff->m > 0) {
        return $diff->m . ' tháng trước';
    }
    if ($diff->d > 0) {
        return $diff->d . ' ngày trước';
    }
    if ($diff->h > 0) {
        return $diff->h . ' giờ trước';
    }
    if ($diff->i > 0) {
        return $diff->i . ' phút trước';
    }
    return 'Vừa xong';
}
