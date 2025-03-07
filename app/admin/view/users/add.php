<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng mới</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <div class="main-content">
            <div class="header">
                <h1><i class="fas fa-user-plus"></i> Thêm người dùng mới</h1>
            </div>

            <div class="content">
                <div class="add-form">
                    <form action="index.php?act=add_users" method="POST">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="user_email" required>
                        </div>

                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="username" required>
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>Vai trò</label>
                            <select name="role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <input type="submit" name="themmoi" value="Thêm mới" class="save-btn">
                            <a href="index.php?act=list_users" class="cancel-btn">Hủy</a>
                        </div>

                        <?php
                            if(isset($thongbao) && ($thongbao != "")) {
                                echo '<div class="alert alert-success">'.$thongbao.'</div>';
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
