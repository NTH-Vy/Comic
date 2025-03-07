<?php
session_start();

// Autoload classes
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use App\Controllers\AccountController;
use App\Controllers\ComicController;
use App\Models\ComicModel;
use App\Models\UserModel;
use App\Core\Database;
use App\Controllers\ProductController;
use App\Controllers\ComicDetailController;
use App\Controllers\CommentController;
use App\Models\CommentModel;

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

// Khởi tạo các model
$comicModel = new ComicModel();
$userModel = new UserModel();

include "app/Views/header.php";

$action = $_GET['act'] ?? 'home';

switch ($action) {
    case 'comics':
        $keyword = $_POST['keyword'] ?? "";
        $category_id = $_GET['category_id'] ?? 0;
        $comics_list = $comicModel->getAll($keyword, $category_id);
        $category_name = $comicModel->getCategoryName($category_id);
        include "app/Views/comics.php";
        break;

    case 'comic_detail':
        if (!empty($_GET['comic_id'])) {
            $id = $_GET['comic_id'];
            $comic = $comicModel->getById($id);
            $related_comics = $comicModel->getRelatedComics($id, $comic['category_id']);
            include "app/Views/comic_detail.php";
        } else {
            include "app/Views/home.php";
        }
        break;

    case 'register':
        $controller = new AccountController();
        $controller->register();
        break;

    case 'login':
        $controller = new AccountController();
        $controller->login();
        break;

    case 'edit_taikhoan':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $user = $_POST['user'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];
            $pass = !empty($_POST['pass']) ? password_hash($_POST['pass'], PASSWORD_DEFAULT) : $_SESSION['user']['pass'];

            $userModel->update($id, $email, $user, $pass);
            $_SESSION['user'] = $userModel->getById($id);
            header('Location: index.php?act=edit_taikhoan');
            exit();
        }
        include "app/Views/users/edit_taikhoan.php";
        break;

    case 'quenmk':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $user = $userModel->checkEmail($email);
            $thongbao = $user ? "Mật khẩu đã được gửi đến email của bạn" : "Email không tồn tại!";
        }
        include "app/Views/users/quenmk.php";
        break;

    case 'logout':
        $controller = new AccountController();
        $controller->logout();
        break;

    case 'addtocart':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $img = $_POST['img'];
            $price = $_POST['price'];

            $found = false;
            foreach ($_SESSION['mycart'] as &$item) {
                if ($item[0] == $id) {
                    $item[4] += 1;
                    $item[5] = $item[4] * $price;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $_SESSION['mycart'][] = [$id, $name, $img, $price, 1, $price];
            }
        }
        include "view/cart/viewcart.php";
        break;

    case 'delcart':
        if (isset($_GET['idcart'])) {
            array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
        } else {
            $_SESSION['mycart'] = [];
        }
        header('Location: index.php?act=viewcart');
        exit();
        break;

    case 'viewcart':
        include "view/cart/viewcart.php";
        break;

    case 'fullmanga':
        $comicController = new ComicController();
        $comicController->showFullManga();
        break;

    case 'bill':
        include "view/cart/bill.php";
        break;

    case 'billcomfirm':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $iduser = $_SESSION['user']['id'] ?? 0;
            $idbill = insert_bill($iduser, $_POST['name'], $_POST['email'], $_POST['address'], $_POST['tel'], $_POST['pttt'], date('H:i:s d/m/Y'), tongdonhang());

            if ($idbill) {
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($iduser, $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
                $_SESSION['mycart'] = [];
            }
        }

        $bill = loadone_bill($idbill);
        $billct = loadall_cart($idbill);
        include "view/cart/billcomfirm.php";
        break;

    case 'detailmanga':
        if(isset($_GET['id'])) {
            $controller = new ComicDetailController();
            $commentModel = new CommentModel();
            // Lấy comments cho truyện
            $comments = $commentModel->getByComicId($_GET['id']);
            $controller->show($_GET['id']);
        } else {
            header("Location: index.php");
            exit;
        }
        break;

    case 'mybill':
        $listbill = $_SESSION['user'] ? loadall_bill($_SESSION['user']['id']) : [];
        include "view/cart/mybill.php";
        break;

    case 'shop':
        $controller = new ProductController();
        $controller->showShop();
        break;

    case 'novel':
        include "app/views/novel.php";
        break;

    case 'newmanga':
        include "app/views/new/newmanga.php";
        break;

    case 'hotmanga':
        include "app/views/hot/hotmanga.php";
        break;

    case 'rankmanga':
        include "app/views/rank/rankmanga.php";
        break;

    case 'account':
        include "app/views/account/account.php";
        break;

    case 'add-to-cart':
        $controller = new ProductController();
        $controller->addToCart();
        break;

    case 'buy-now':
        $controller = new ProductController();
        $controller->buyNow();
        break;

    case 'add_comment':
        if(isset($_POST['submit_comment']) && isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['user_id'];
            $comic_id = $_POST['comic_id'];
            $content = $_POST['content'];
            
            if(!empty($content)) {
                $commentModel = new CommentModel();
                $commentModel->insert($user_id, $comic_id, $content);
                header("Location: index.php?act=detailmanga&id=" . $comic_id);
                exit();
            }
        }
        header("Location: index.php");
        break;

    default:
        $new_comics = $comicModel->getAll();
        $categories = $comicModel->getAllCategories();
        include "app/Views/home.php";
        break;
}

include "app/Views/footer.php";
?>