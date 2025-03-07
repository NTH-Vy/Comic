<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }

        .page-link {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
        }

        .page-link:hover {
            background-color: #f5f5f5;
        }

        .page-link.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>
</head>
<body>       <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <div class="header-title">
                    <h1><i class="fas fa-users"></i> Quản lý người dùng</h1>
                </div>
                <div class="search-box">
                    <form action="index.php" method="GET">
                        <input type="hidden" name="act" value="list_users">
                        <div class="search-wrapper">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="keyword" 
                                   placeholder="Tìm kiếm theo tên, email..." 
                                   value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                            <button type="submit" name="timkiem">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- <select name="role">
                <option value="">Tất cả vai trò</option>
                <option value="user" <?= isset($_GET['role']) && $_GET['role'] === 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= isset($_GET['role']) && $_GET['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            </select> -->
                            
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
                                <th>Tên đăng nhập</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($listusers) && is_array($listusers)): ?>
                                <?php foreach ($listusers as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars($user['user_id']) ?></td>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td><?= htmlspecialchars($user['user_email']) ?></td>
                                    <td>
                                        <span class="role-badge <?= $user['role'] ?>">
                                            <?= $user['role'] === 'admin' ? 'Admin' : 'User' ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
                                    <td class="actions">
                                        <a href="index.php?act=sua_users&user_id=<?= $user['user_id'] ?>" 
                                           class="edit-btn" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="index.php?act=xoa_users&user_id=<?= $user['user_id'] ?>" 
                                           class="delete-btn" 
                                           onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')"
                                           title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Không có dữ liệu người dùng</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row mb10" style="margin-top: 20px;">
                    <a href="index.php?act=add_users" class="save-btn">THÊM MỚI</a>
                </div>

                <!-- Thêm phần phân trang -->
                <div class="pagination">
                    <?php if(isset($total_pages) && $total_pages > 1): ?>
                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="index.php?act=list_users&page=<?= $i ?>" 
                               class="page-link <?= ($current_page == $i) ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Add at the top of the file, after DOCTYPE
    error_log("View received users: " . print_r($listusers ?? 'null', true));
    ?>
</body>
</html> 