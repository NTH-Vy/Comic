<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật truyện</title>
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
        .save-btn {
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .save-btn:hover {
            opacity: 0.9;
        }
        .current-image {
            max-width: 200px;
            margin: 10px 0;
        }
        
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="main-content">
            <div class="header">
                <div class="header-title">
                    <h1><i class="fas fa-edit"></i> Cập nhật truyện</h1>
                </div>
            </div>

            <div class="content">
                <?php if(isset($thongbao)): ?>
                    <div class="alert alert-success"><?= $thongbao ?></div>
                <?php endif; ?>

                <div class="edit-form">
                    <?php if(isset($comic)): ?>
                    <form action="index.php?act=update_comics" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="comic_id" value="<?= $comic['comic_id'] ?>">
                        
                        <div class="form-group">
                            <label>Tiêu đề truyện</label>
                            <input type="text" name="title" value="<?= htmlspecialchars($comic['title']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" rows="4" class="form-control"><?= htmlspecialchars($comic['description']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tác giả</label>
                            <select name="author_id">
                                <?php foreach($listauthors as $author): ?>
                                    <option value="<?= $author['author_id'] ?>" 
                                        <?= ($author['author_id'] == $comic['author_id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($author['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status">
                                <option value="ongoing" <?= ($comic['status'] == 'ongoing') ? 'selected' : '' ?>>
                                    Đang tiến hành
                                </option>
                                <option value="completed" <?= ($comic['status'] == 'completed') ? 'selected' : '' ?>>
                                    Đã hoàn thành
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ảnh bìa</label>
                            <?php if($comic['cover_image']): ?>
                                <img src="../upload/<?= $comic['cover_image'] ?>" class="current-image">
                            <?php endif; ?>
                            <input type="file" name="cover_image">
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="capnhat" class="save-btn">
                                <i class="fas fa-save"></i> Lưu thay đổi
                            </button>
                            <a href="index.php?act=list_comics" class="cancel-btn">
                                <i class="fas fa-times"></i> Hủy
                            </a>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
