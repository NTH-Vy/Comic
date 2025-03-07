<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Chapter Mới</title>
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
            <h1><i class="fas fa-plus-circle"></i> Thêm Chapter Mới</h1>
        </div>

        <div class="content">
            <form action="index.php?act=add_chapter&comic_id=<?= $_GET['comic_id'] ?>" method="POST">
                <input type="hidden" name="comic_id" value="<?= $_GET['comic_id'] ?>">
                
                <div class="form-group">
                    <label>Chapter số</label>
                    <input type="number" name="chapter_number" class="form-control" required min="1">
                </div>

                <div class="form-group">
                    <label>Tiêu đề chapter</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" class="form-control" rows="10" required></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" name="themmoi" value="Thêm mới" class="save-btn">
                    <a href="index.php?act=list_chapters&comic_id=<?= $_GET['comic_id'] ?>" class="save-btn" style="margin-left: 10px;">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>

                <?php if(isset($thongbao) && $thongbao != ""): ?>
                    <div class="alert alert-success"><?= $thongbao ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html> 