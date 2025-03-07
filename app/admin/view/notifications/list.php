<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thông báo</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <h1><i class="fas fa-bell"></i> Quản lý thông báo</h1>
            </div>
            <div class="search-box">
                <form action="index.php?act=list_notifications" method="POST">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="keyword" placeholder="Tìm kiếm thông báo...">
                        <button type="submit" name="timkiem">Tìm kiếm</button>
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
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($listnotifications) && count($listnotifications) > 0) {
                            foreach ($listnotifications as $notification) {
                                extract($notification);
                                $trang_thai = $is_read ? "Đã đọc" : "Chưa đọc";
                                $xoa_notification = "index.php?act=xoa_notification&notification_id=".$notification_id;
                                echo '<tr>
                                        <td>'.htmlspecialchars($notification_id).'</td>
                                        <td>'.htmlspecialchars($username).'</td>
                                        <td>'.htmlspecialchars($content).'</td>
                                        <td><span class="role-badge '.($is_read ? 'read' : 'unread').'">'.$trang_thai.'</span></td>
                                        <td>'.date('d/m/Y', strtotime($created_at)).'</td>
                                        <td class="actions">
                                            <a href="'.$xoa_notification.'" class="delete-btn" 
                                               onclick="return confirm(\'Bạn có chắc muốn xóa thông báo này?\')"
                                               title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6" class="text-center">Không có thông báo nào</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
