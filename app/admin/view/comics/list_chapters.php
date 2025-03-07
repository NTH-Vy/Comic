<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Chapter</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .chapter-table {
            width: 100%;
            margin-top: 20px;
        }
        .chapter-table th, .chapter-table td {
            padding: 12px;
            text-align: left;
        }
        .views-count {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <h1><i class="fas fa-list-ol"></i> Quản lý Chapter - <?= $comic['title'] ?></h1>
            </div>
        </div>

        <div class="content">
            <div class="chapter-table">
                <table>
                    <thead>
                        <tr>
                            <th>Chapter số</th>
                            <th>Tiêu đề</th>
                            <th>Lượt xem</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chapters as $chapter): ?>
                            <tr>
                                <td>#<?= $chapter['chapter_number'] ?></td>
                                <td><?= $chapter['title'] ?></td>
                                <td>
                                    <div class="views-count">
                                        <i class="fas fa-eye"></i>
                                        <?= number_format($chapter['views']) ?>
                                    </div>
                                </td>
                                <td><?= date('d/m/Y', strtotime($chapter['created_at'])) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="index.php?act=edit_chapter&id=<?= $chapter['chapter_id'] ?>" 
                                           class="edit-btn" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="index.php?act=delete_chapter&id=<?= $chapter['chapter_id'] ?>" 
                                           class="delete-btn" 
                                           onclick="return confirm('Bạn có chắc muốn xóa chapter này?')"
                                           title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row mb10" style="margin-top: 20px;">
                <a href="index.php?act=add_chapter&comic_id=<?= $comic_id ?>" class="save-btn">THÊM CHAPTER MỚI</a>
                <a href="index.php?act=list_comics" class="save-btn" style="margin-left: 10px;">QUAY LẠI</a>
            </div>
        </div>
    </div>
</body>
</html> 