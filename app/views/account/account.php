<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <style>
        .account-container {
            max-width: 1200px;
            margin: 90px auto 20px;
            padding: 20px;
            display: flex;
            gap: 30px;
        }

        .profile-sidebar {
            width: 300px;
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-main {
            flex: 1;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 15px;
            overflow: hidden;
            border: 3px solid #1e1f26;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 1.5em;
            font-weight: bold;
            color: #1e1f26;
            margin-bottom: 5px;
        }

        .profile-role {
            color: #666;
            font-size: 0.9em;
        }

        .profile-stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            padding: 15px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.2em;
            font-weight: bold;
            color: #1e1f26;
        }

        .stat-label {
            font-size: 0.8em;
            color: #666;
        }

        .profile-menu {
            list-style: none;
            padding: 0;
        }

        .profile-menu li {
            margin-bottom: 10px;
        }

        .profile-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .profile-menu a:hover {
            background: #f5f5f5;
            color: #1e1f26;
        }

        .profile-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .profile-menu .active {
            background: #1e1f26;
            color: white;
        }

        .section-title {
            font-size: 1.2em;
            color: #1e1f26;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #1e1f26;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
        }

        .form-group input:focus {
            border-color: #1e1f26;
            outline: none;
        }

        .btn-save {
            background: #1e1f26;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            background: #2a2b33;
            transform: translateY(-2px);
        }

        .recent-activity {
            margin-top: 30px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background: #f5f5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .activity-icon i {
            color: #1e1f26;
        }

        .activity-details {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .activity-time {
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="account-container">
        <!-- Sidebar -->
        <div class="profile-sidebar">
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="public/image/default-avatar.jpg" alt="Avatar">
                </div>
                <div class="profile-name">Nguyễn Văn A</div>
                <div class="profile-role">Thành viên</div>
            </div>

            <div class="profile-stats">
                <div class="stat-item">
                    <div class="stat-value">125</div>
                    <div class="stat-label">Đã đọc</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">48</div>
                    <div class="stat-label">Yêu thích</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">36</div>
                    <div class="stat-label">Bình luận</div>
                </div>
            </div>

            <ul class="profile-menu">
                <li><a href="#" class="active"><i class="fas fa-user"></i>Thông tin cá nhân</a></li>
                <li><a href="#"><i class="fas fa-heart"></i>Truyện yêu thích</a></li>
                <li><a href="#"><i class="fas fa-history"></i>Lịch sử đọc</a></li>
                <li><a href="#"><i class="fas fa-comments"></i>Bình luận của tôi</a></li>
                <li><a href="#"><i class="fas fa-cog"></i>Cài đặt</a></li>
                <li><a href="index?act=logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="profile-main">
            <h2 class="section-title">Thông tin cá nhân</h2>
            
            <form>
                <div class="form-group">
                    <label>Tên hiển thị</label>
                    <input type="text" value="Nguyễn Văn A">
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="nguyenvana@example.com">
                </div>
                
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="tel" value="0123456789">
                </div>
                
                <div class="form-group">
                    <label>Ngày tham gia</label>
                    <input type="text" value="01/01/2024" disabled>
                </div>
                
                <button type="submit" class="btn-save">Lưu thay đổi</button>
            </form>

            <div class="recent-activity">
                <h2 class="section-title">Hoạt động gần đây</h2>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Đã đọc Chapter 45 - Be By My Side</div>
                        <div class="activity-time">2 giờ trước</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Đã thêm Girlfriend Manual vào danh sách yêu thích</div>
                        <div class="activity-time">5 giờ trước</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-comment"></i>
                    </div>
                    <div class="activity-details">
                        <div class="activity-title">Đã bình luận trên The Necromancer Family's Young Heir</div>
                        <div class="activity-time">1 ngày trước</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
