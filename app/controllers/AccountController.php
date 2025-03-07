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
            
            $user = $this->userModel->checkUsername($username);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                if ($user['role'] === 'admin') {
                    header("Location: /admin/dashboard");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu!";
                header("Location: index.php");
                exit();
            }
        }
        require_once 'app/Views/account/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            
            // Validate input
            if (empty($email) || empty($username) || empty($password)) {
                $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
            } elseif ($password !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu xác nhận không khớp!";
            } elseif ($this->userModel->checkEmail($email)) {
                $_SESSION['error'] = "Email đã được sử dụng!";
            } elseif ($this->userModel->checkUsername($username)) {
                $_SESSION['error'] = "Tên đăng nhập đã tồn tại!";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                try {
                    $this->userModel->insert($email, $username, $hashedPassword);
                    $_SESSION['message'] = "Đăng ký thành công! Vui lòng đăng nhập.";
                    header("Location: index.php");
                    exit();
                } catch (\PDOException $e) {
                    $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại sau!";
                    header("Location: index.php");
                    exit();
                }
            }
        }
        require_once 'app/Views/account/register.php';
    }

    public function logout() {
        unset($_SESSION['user']);
        header("Location: index.php");
        exit();
    }
} 