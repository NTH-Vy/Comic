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
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="../../public/css/home.css">
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
            <li><a href="index.php?act=list_users">NGƯỜI DÙNG</a></li>
            <li><a href="index.php?act=list_comics">TRUYỆN TRANH</a></li>
            <li><a href="index.php?act=novel">TIỂU THUYẾT</a></li>
            <li><a href="index.php?act=list_categories">DANH MỤC</a></li>
            <li><a href="index.php?act=list_comments">BÌNH LUẬN</a></li>
            <li><a href="index.php?act=list_products">SẢN PHẨM</a></li>
            <li><a href="index.php?act=list_notifications">THÔNG BÁO</a></li>
            <li><a href="index.php?act=list_payments">GIAO DỊCH</a></li>
            <li><a href="index.php?act=thongke">THỐNG KÊ</a></li>

        </ul>
        <ul class="nav-links right">
            <?php if ($user): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fas fa-user"></i> <?= htmlspecialchars($user['username']) ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?act=profile"><i class="fas fa-user-edit"></i>Tài khoản</a></li>
                        <li><a href="index.php?act=logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="../index.php?act=login"><i class="fas fa-user"></i> Đăng nhập</a></li>
                <li><a href="../index.php?act=register"><i class="fas fa-user-plus"></i> Đăng ký</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</body>
