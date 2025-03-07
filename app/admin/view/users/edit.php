<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa người dùng</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <div class="main-content">
            <div class="header">
                <div class="header-title">
                    <h1><i class="fas fa-user-edit"></i> Chỉnh sửa người dùng</h1>
                </div>
            </div>

            <div class="content">
                <?php if(isset($thongbao) && ($thongbao != "")): ?>
                    <div class="alert alert-success"><?= $thongbao ?></div>
                <?php endif; ?>

                <div class="edit-form">
                    <form action="./index.php?act=update_users" method="POST">
                        <input type="hidden" name="user_id" value="<?= $dm['user_id'] ?>">
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="user_email" 
                                   value="<?= htmlspecialchars($dm['user_email']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="username" 
                                   value="<?= htmlspecialchars($dm['username']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu mới (để trống nếu không đổi)</label>
                            <input type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label>Vai trò</label>
                            <select name="role">
                                <option value="user" <?= $dm['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                <option value="admin" <?= $dm['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="capnhat" value="1" class="save-btn">
                                <i class="fas fa-save"></i> Lưu thay đổi
                            </button>
                            <a href="index.php?act=list_users" class="cancel-btn">
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