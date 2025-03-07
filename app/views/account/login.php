<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .main-content {
            padding: 80px 0;
            min-height: calc(100vh - 160px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            margin: 0 auto;
        }

        .register-form-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 40px;
            font-size: 28px;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-weight: 500;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 2px rgba(106, 17, 203, 0.1);
            outline: none;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 18px;
        }

        .register-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .register-btn:hover {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .alert {
            text-align: center;
            margin: 15px 0;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
        }

        .alert-danger {
            background: #fff2f2;
            color: #d63031;
            border: 1px solid #ffcdd2;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
        }

        .message.success {
            background: #f0fff4;
            color: #2f9e44;
            border: 1px solid #c3e6cb;
        }

        .form-footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 15px;
        }

        .form-footer a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #2575fc;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
                padding: 15px;
            }
            
            .register-form-container {
                padding: 30px 25px;
            }

            h2 {
                font-size: 24px;
            }

            input {
                padding: 12px 14px;
            }
        }
    </style>
</head>
<body>
<div class="main-content">
        <div class="container">
            <div class="register-form-container">
                <h2>Đăng Nhập</h2>

                <!-- Hiển thị thông báo lỗi nếu có -->
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <form action="index.php?act=login" method="post">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group password-container">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="register-btn">Đăng Nhập</button>

                    <?php if (isset($_SESSION['message'])): ?>
                        <p class="message success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
                    <?php endif; ?>

                    <div class="form-footer">
                        <p>Chưa có tài khoản? <a href="index.php?act=register">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                field.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>