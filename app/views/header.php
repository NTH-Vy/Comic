<?php
// Đảm bảo session đã được start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy thông tin user từ session
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mẫu</title>
    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="boxcenter">
        <div class="row mb header">
           <h1 style="color: #1ec81e;">Nhà Của Gió</h1> 
        </div>
        <div class="row mb menu">
            <ul>
                
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="index.php?act=gioithieu">GIỚI THIỆU</a></li>
                <li><a href="index.php?act=lienhe">LIÊN HỆ</a></li>
                <li><a href="index.php?act=gopy">GÓP Ý</a></li>
                <li><a href="index.php?act=hoidap">HỎI ĐÁP</a></li>
            </ul>
        </div> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Modern Menu</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <span>MyBrand</span>
    </div>
    <div class="menu-container">
        <ul class="nav-links left">
            <li><a href="index.php">TRANG CHỦ</a></li>
            <li><a href="index.php?act=fullmanga">TRUYỆN TRANH</a></li>
            <li><a href="index.php?act=novel">TIỂU THUYẾT</a></li>
            <li><a href="index.php?act=shop">CỬA HÀNG</a></li>
        </ul>
        <ul class="nav-links right">
            <?php if ($user): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fas fa-user"></i> <?= htmlspecialchars($user['username']) ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?act=account"><i class="fas fa-user-edit"></i> Tài khoản</a></li>
                        <?php if ($user['role'] === 'admin'): ?>
                            <li><a href="app/admin/index.php"><i class="fas fa-cogs"></i> Quản lý hệ thống</a></li>
                        <?php endif; ?>
                        <li><a href="index.php?act=logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="index.php?act=login"><i class="fas fa-user"></i> Đăng nhập</a></li>
                <li><a href="index.php?act=register"><i class="fas fa-user-plus"></i> Đăng ký</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</body>
