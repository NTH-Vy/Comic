<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Chapter</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1><i class="fas fa-edit"></i> Chỉnh sửa Chapter</h1>
        </div>

        <div class="content">
            <?php if(isset($chapter)): ?>
            <form action="index.php?act=edit_chapter&id=<?= $chapter['chapter_id'] ?>" method="POST">
                <div class="form-group">
                    <label>Chapter số</label>
                    <input type="number" class="form-control" value="<?= $chapter['chapter_number'] ?>" disabled>
                </div>

                <div class="form-group">
                    <label>Tiêu đề chapter</label>
                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($chapter['title']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" class="form-control" rows="10" required><?= htmlspecialchars($chapter['content']) ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="update_chapter" class="save-btn">
                        <i class="fas fa-save"></i> Lưu thay đổi
                    </button>
                    <a href="index.php?act=list_chapters&comic_id=<?= $chapter['comic_id'] ?>" class="save-btn" style="margin-left: 10px;">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 