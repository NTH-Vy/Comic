<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa danh mục</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <div class="main-content">
            <div class="header">
                <div class="header-title">
                    <h1><i class="fas fa-edit"></i> Chỉnh sửa danh mục</h1>
                </div>
            </div>

            <div class="content">
                <!-- Thông báo thành công hoặc lỗi -->
                <?php if(isset($thongbao) && $thongbao != ""): ?>
                    <div class="alert alert-success"><?= $thongbao ?></div>
                <?php endif; ?>
                <?php if(isset($error) && $error != ""): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <div class="edit-form">
                    <form action="./index.php?act=update_categories" method="POST">
                        <!-- Truyền id của danh mục cần sửa -->
                        <input type="hidden" name="category_id" value="<?= htmlspecialchars($category['category_id']) ?>">
                        
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="name" 
                                   value="<?= htmlspecialchars($category['name']) ?>" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="capnhat" value="1" class="save-btn">
                                <i class="fas fa-save"></i> Lưu thay đổi
                            </button>
                            <a href="index.php?act=list_categories" class="cancel-btn">
                                <i class="fas fa-times"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
