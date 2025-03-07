<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm truyện mới</title>
    <link rel="stylesheet" href="public/css/admin.css">
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
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1><i class="fas fa-plus-circle"></i> Thêm truyện mới</h1>
        </div>

        <div class="content">
            <form action="index.php?act=add_comics" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tiêu đề truyện</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="author_id">Tác giả</label>
                    <select name="author_id" class="form-control" required>
                        <?php foreach($listauthors as $author): ?>
                            <option value="<?= $author['author_id'] ?>"><?= $author['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-control" required>
                        <option value="ongoing">Đang tiến hành</option>
                        <option value="completed">Đã hoàn thành</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cover_image">Ảnh bìa</label>
                    <input type="file" name="cover_image" class="form-control" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="themmoi" value="Thêm mới" class="save-btn">
                    <a href="index.php?act=list_comics" class="save-btn" style="text-decoration: none; margin-left: 10px;">Danh sách</a>
                </div>

                <?php if(isset($thongbao)): ?>
                    <div class="alert alert-success"><?= $thongbao ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
