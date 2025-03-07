<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý giao dịch</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <h1><i class="fas fa-money-bill"></i> Quản lý giao dịch</h1>
            </div>
            <div class="search-box">
                <form action="index.php?act=list_payments" method="POST">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="keyword" 
                               placeholder="Tìm kiếm theo tên người dùng..." 
                               value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : '' ?>">
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
                            <th>Số tiền</th>
                            <th>Ngày giao dịch</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listpayments as $payment): ?>
                            <tr>
                                <td><?= htmlspecialchars($payment['payment_id']) ?></td>
                                <td><?= htmlspecialchars($payment['username']) ?></td>
                                <td>$<?= number_format($payment['amount'], 2) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($payment['payment_date'])) ?></td>
                                <td class="actions">
                                    <a href="index.php?act=xoa_payment&payment_id=<?= $payment['payment_id'] ?>" 
                                       class="delete-btn" 
                                       onclick="return confirm('Bạn có chắc muốn xóa giao dịch này?')"
                                       title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
