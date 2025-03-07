<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    /* Điều chỉnh cột thao tác */
    .users-table th:last-child,
    .users-table td:last-child {
        width: 120px !important; /* Đặt chiều rộng cố định cho cột thao tác */
        white-space: nowrap;
        overflow: visible;
        padding: 12px 15px;
    }

    /* Điều chỉnh style cho các nút */
    .actions {
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
        min-width: max-content; /* Đảm bảo không bị co lại */
    }

    .edit-btn, .delete-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
        border-radius: 6px;
        color: var(--white);
        text-decoration: none;
        transition: all 0.3s ease;
        min-width: 35px;
        height: 35px;
    }

    .edit-btn {
        background: var(--primary);
    }

    .delete-btn {
        background: #dc3545;
    }

    .edit-btn:hover, .delete-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(67, 97, 238, 0.2);
    }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <h1><i class="fas fa-box"></i> Quản lý sản phẩm</h1>
            </div>
            <div class="search-box">
                <form action="index.php?act=list_products" method="post">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="keyword" 
                               placeholder="Tìm kiếm sản phẩm..." 
                               value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : '' ?>">
                        <button type="submit" name="timkiem">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="content">
            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Hình ảnh</th>
                            <th>Người đăng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listproducts as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['product_id']) ?></td>
                            <td><?= htmlspecialchars($product['product_name']) ?></td>
                            <td>$<?= number_format($product['price'], 2) ?></td>
                            <td><?= htmlspecialchars($product['stock_quantity']) ?></td>
                            <td>
                                <img src="../upload/<?= htmlspecialchars($product['image']) ?>" 
                                     alt="<?= htmlspecialchars($product['product_name']) ?>" 
                                     width="100">
                            </td>
                            <td><?= htmlspecialchars($product['username']) ?></td>
                            <td class="actions">
                                <a href="index.php?act=sua_product&product_id=<?= $product['product_id'] ?>" 
                                   class="edit-btn" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?act=xoa_product&product_id=<?= $product['product_id'] ?>" 
                                   class="delete-btn" 
                                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                                   title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row mb10" style="margin-top: 20px;">
                <a href="index.php?act=add_product" class="save-btn">THÊM MỚI</a>
            </div>
        </div>
    </div>
</body>
</html>
