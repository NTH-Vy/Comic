<?php
namespace App\Controllers;

use App\Models\UserModel;

class AccountController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra tên đăng nhập
            $user = $this->userModel->checkUsername($username);

            // Kiểm tra mật khẩu và tên đăng nhập
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                
                // Chuyển hướng về trang chủ hoặc trang admin
                if ($user['role'] === 'admin') {
                    header("Location: /admin/dashboard");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                // Lưu thông báo lỗi vào session và chuyển hướng lại
                $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu!";
                header("Location: index.php?act=login"); // Chuyển hướng lại trang login
                exit();
            }
        }
        // Hiển thị view đăng nhập
        require_once 'app/Views/account/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];

            // Kiểm tra thông tin người dùng
            if (empty($email) || empty($username) || empty($password)) {
                $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
            } elseif ($password !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu xác nhận không khớp!";
            } elseif ($this->userModel->checkEmail($email)) {
                $_SESSION['error'] = "Email đã được sử dụng!";
            } elseif ($this->userModel->checkUsername($username)) {
                $_SESSION['error'] = "Tên đăng nhập đã tồn tại!";
            } else {
                // Mã hóa mật khẩu và thêm người dùng vào cơ sở dữ liệu
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                try {
                    $this->userModel->insert($email, $username, $hashedPassword);
                    $_SESSION['message'] = "Đăng ký thành công! Vui lòng đăng nhập.";
                    header("Location: index.php?act=login"); // Chuyển hướng đến trang đăng nhập
                    exit();
                } catch (\PDOException $e) {
                    $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại sau!";
                    header("Location: index.php?act=register"); // Chuyển hướng đến trang đăng ký
                    exit();
                }
            }
        }
        // Hiển thị view đăng ký
        require_once 'app/Views/account/register.php';
    }

    public function logout() {
        unset($_SESSION['user']); // Hủy session người dùng
        header("Location: index.php"); // Chuyển hướng về trang chủ
        exit();
    }
}
