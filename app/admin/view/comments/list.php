<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bình luận</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .users-table th:last-child,
        .users-table td:last-child {
            width: 120px !important; /* Đặt chiều rộng cố định cho cột thao tác */
            white-space: nowrap;
            overflow: visible;
            padding: 12px 15px;
        }

        /* Điều chỉnh style cho các nút */
        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
            min-width: max-content; /* Đảm bảo không bị co lại */
        }

        .edit-btn, .delete-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px;
            border-radius: 6px;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            min-width: 35px;
            height: 35px;
        }

        .edit-btn {
            background: var(--primary);
        }

        .delete-btn {
            background: #dc3545;
        }

        .edit-btn:hover, .delete-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(67, 97, 238, 0.2);
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <h1><i class="fas fa-comments"></i> Quản lý bình luận</h1>
            </div>
            <div class="search-box">
                <form action="" method="GET">
                    <input type="hidden" name="act" value="admin_comments">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="search" 
                               placeholder="Tìm kiếm bình luận..." 
                               value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <button type="submit">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <div class="content">
            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người dùng</th>
                            <th>Truyện</th>
                            <th>Chapter</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listcomments as $comment): ?>
                        <tr>
                            <td><?= htmlspecialchars($comment['comment_id']) ?></td>
                            <td><?= htmlspecialchars($comment['username']) ?></td>
                            <td><?= htmlspecialchars($comment['comic_title']) ?></td>
                            <td><?= $comment['chapter_number'] ? "Chapter " . htmlspecialchars($comment['chapter_number']) : "N/A" ?></td>
                            <td><?= htmlspecialchars($comment['content']) ?></td>
                            <td><?= date('d/m/Y', strtotime($comment['created_at'])) ?></td>
                            <td class="actions">
                                <a href="index.php?act=xoa_comment&comment_id=<?= $comment['comment_id'] ?>" 
                                   class="delete-btn" 
                                   onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')"
                                   title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
