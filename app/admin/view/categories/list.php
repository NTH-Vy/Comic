<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <h1><i class="fas fa-list"></i> Quản lý danh mục</h1>
            </div>
            <div class="search-box">
                <form action="" method="GET">
                    <input type="hidden" name="act" value="admin_categories">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="search" 
                               placeholder="Tìm kiếm danh mục..." 
                               value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <button type="submit">Tìm kiếm</button>
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
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($listcategories) && is_array($listcategories)): ?>
                            <?php foreach ($listcategories as $category): ?>
                            <tr>
                                <td><?= htmlspecialchars($category['category_id']) ?></td>
                                <td><?= htmlspecialchars($category['name']) ?></td>
                                <td class="actions">
                                    <a href="index.php?act=sua_categories&category_id=<?= $category['category_id'] ?>" 
                                       class="edit-btn" title="Sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?act=xoa_categories&category_id=<?= $category['category_id'] ?>" 
                                       class="delete-btn" 
                                       onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')"
                                       title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">Không có dữ liệu danh mục</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="row mb10" style="margin-top: 20px;">
                <a href="index.php?act=add_categories" class="save-btn">THÊM MỚI</a>
            </div>
        </div>
    </div>
</body>
</html>
