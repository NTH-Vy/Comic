<?php
include "../models/pdo.php";
include "../models/danhmuc.php";
include "../models/sanpham.php";
include "model/UsersModel.php";
include "../models/binhluan.php";
include "model/CatagoriesModel.php";
include "model/ComicsModel.php";
include "model/StoreModel.php";
include "model/CommentsModel.php";
include "model/PaymentsModel.php";
include "model/HomeModel.php";
include "model/NotificationsModel.php";
include "model/upload.php";

include "../admin/header.php";
// controller

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'add_users':
            // kiểm tra xem người dùng có lick vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $user_email = $_POST['user_email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                insert_users($user_email, $username, $password, $role);
                $thongbao = "thêm thành công rồi";
            }

            include "view/users/add.php";
            break;
        case 'list_users':
            // Xử lý phân trang
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $items_per_page = 10;
            
            // Xử lý tìm kiếm
            $keyword = '';
            if(isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
            }
            
            // Lấy dữ liệu
            $total_users = count_users($keyword);
            $total_pages = ceil($total_users / $items_per_page);
            $listusers = loadall_users($current_page, $items_per_page, $keyword);
            
            // Include view
            include "view/users/list.php";
            break;
        case 'xoa_users':
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                delete_users($_GET['user_id']);
            }
            $listusers = loadall_users();
            include "view/users/list.php";
            break;
        case 'sua_users':
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                $dm = loadone_users($_GET['user_id']);
            }

            include "view/users/edit.php";
            break;
        case 'update_users':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user_id = $_POST['user_id'];
                $user_email = $_POST['user_email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                
                update_users($user_id, $user_email, $username, $password, $role);
                $thongbao = "Cập nhật thành công!";
                $listusers = loadall_users();
                include "view/users/list.php";
            } else {
                $listusers = loadall_users();
                include "view/users/list.php";
            }
            break;
            // controller cho sản phẩm

        case 'add_comics':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $author_id = $_POST['author_id'];
                $status = $_POST['status'];
                
                $cover_image = '';
                if(isset($_FILES['cover_image'])) {
                    $upload_result = upload_file($_FILES['cover_image']);
                    if($upload_result['status']) {
                        $cover_image = $upload_result['name'];
                    } else {
                        $thongbao = "Lỗi upload: " . $upload_result['error'];
                    }
                }

                if($cover_image != '') {
                    insert_comic($title, $description, $author_id, $status, $cover_image);
                    $thongbao = "Thêm truyện thành công";
                }
            }
            $listauthors = loadall_authors();
            include "view/comics/add.php";
            break;
        case 'list_comics':
            // Xử lý phân trang
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $items_per_page = 10;
            
            // Xử lý tìm kiếm
            $keyword = '';
            if(isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
            }
            
            // Lấy dữ liệu
            $total_comics = count_comics($keyword);
            $total_pages = ceil($total_comics / $items_per_page);
            $listcomics = loadall_comics($current_page, $items_per_page, $keyword);
            $listauthors = loadall_authors();
            
            // Include view
            include "view/comics/list.php";
            break;
        case 'xoa_comics':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_comic($_GET['id']);
            }
            $listcomics = loadall_comics(1, 10);
            include "view/comics/list.php";
            break;
        case 'sua_comics':
            $comic_id = $_GET['id'];
            $isValid = isset($comic_id) && $comic_id > 0;

            if ($isValid) {
                $comic = loadone_comic($comic_id);
            }

            $listauthors = loadall_authors();
            include "view/comics/edit.php";
            break;

        case 'update_comics':
            if (isset($_POST['capnhat'])) {
                $comic_id = $_POST['comic_id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $author_id = $_POST['author_id'];
                $status = $_POST['status'];
                
                $cover_image = '';
                if(isset($_FILES['cover_image']) && $_FILES['cover_image']['size'] > 0) {
                    $upload_result = upload_file($_FILES['cover_image']);
                    if($upload_result['status']) {
                        $cover_image = $upload_result['name'];
                    } else {
                        $thongbao = "Lỗi upload: " . $upload_result['error'];
                    }
                }

                update_comic($comic_id, $title, $description, $author_id, $status, $cover_image);
                $thongbao = "Cập nhật thành công";
            }

            $listauthors = loadall_authors();
            $listcomics = loadall_comics();
            include "view/comics/list.php";
            break;

        case 'add_categories':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                insert_categories($name);
                $thongbao = "Thêm danh mục thành công";
            }
            include "categories/add.php";
            break;

        case 'list_categories':
            $listcategories = loadall_categories();
            include "view/categories/list.php";
            break;

        case 'xoa_categories':
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                delete_categories($_GET['category_id']);
            }
            $listcategories = loadall_categories();
            include "view/categories/list.php";
            break;

        case 'sua_categories':
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $category = loadone_categories($_GET['category_id']);
            }
            include "categories/update.php";
            break;

        case 'update_categories':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $name = $_POST['name'];
                $category_id = $_POST['category_id'];
                update_categories($category_id, $name);
                $thongbao = "Cập nhật danh mục thành công";
            }
            $listcategories = loadall_categories();
            include "categories/list.php";
            break;

        case 'add_product':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $product_name = $_POST['product_name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $stock_quantity = $_POST['stock_quantity'];
                
                // Check if user is logged in and has user_id
                $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Default to 1 or handle as needed
                
                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Upload thành công
                }

                insert_product($product_name, $description, $price, $stock_quantity, $image, $user_id);
                $thongbao = "Thêm sản phẩm thành công";
            }
            include "view/store/add.php";
            break;

        case 'list_products':
            if (isset($_POST['timkiem'])) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = '';
            }
            $listproducts = loadall_products($keyword);
            include "view/store/list.php";
            break;

        case 'xoa_product':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                delete_product($_GET['product_id']);
            }
            $listproducts = loadall_products();
            include "view/store/list.php";
            break;

        case 'sua_product':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product = loadone_product($_GET['product_id']);
            }
            include "view/store/edit.php";
            break;

        case 'update_product':
            if (isset($_POST['capnhat'])) {
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $stock_quantity = $_POST['stock_quantity'];
                
                $image = '';
                if ($_FILES['image']['size'] > 0) {
                    $image = $_FILES['image']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }

                update_product($product_id, $product_name, $description, $price, $stock_quantity, $image);
                $thongbao = "Cập nhật thành công";
            }
            $listproducts = loadall_products();
            include "view/store/list.php";
            break;

        case 'list_comments':
            $listcomments = loadall_comments();
            include "view/comments/list.php";
            break;

        case 'xoa_comment':
            if (isset($_GET['comment_id']) && ($_GET['comment_id'] > 0)) {
                delete_comment($_GET['comment_id']);
            }
            $listcomments = loadall_comments();
            include "view/comments/list.php";
            break;

        case 'list_payments':
            if(isset($_POST['timkiem'])) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = '';
            }
            $listpayments = loadall_payments($keyword);
            include "view/payments/list.php";
            break;

        case 'xoa_payment':
            if(isset($_GET['payment_id']) && ($_GET['payment_id'] > 0)) {
                delete_payment($_GET['payment_id']);
            }
            $listpayments = loadall_payments("");
            include "view/payments/list.php";
            break;

        case 'thongke':
            $listthongke = loadall_thongke();
            include "view/thongke/list.php";
            break;

        case 'list_notifications':
            if(isset($_POST['timkiem'])) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = '';
            }
            $listnotifications = loadall_notifications($keyword);
            include "view/notifications/list.php";
            break;

        case 'xoa_notification':
            if(isset($_GET['notification_id']) && ($_GET['notification_id'] > 0)) {
                delete_notification($_GET['notification_id']);
            }
            $listnotifications = loadall_notifications("");
            include "view/notifications/list.php";
            break;

        case 'list_chapters':
            if(isset($_GET['comic_id']) && $_GET['comic_id'] > 0) {
                $comic_id = $_GET['comic_id'];
                $comic = loadone_comic($comic_id);
                $chapters = get_chapters_by_comic($comic_id);
                include "view/comics/list_chapters.php";
            } else {
                header("Location: index.php?act=list_comics");
            }
            break;

        case 'add_chapter':
            if(isset($_GET['comic_id'])) {
                $comic_id = $_GET['comic_id'];
                
                if(isset($_POST['themmoi'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $chapter_number = $_POST['chapter_number'];
                    $comic_id = $_POST['comic_id'];
                    
                    // Thêm debug để kiểm tra dữ liệu
                    var_dump([
                        'title' => $title,
                        'content' => $content,
                        'chapter_number' => $chapter_number,
                        'comic_id' => $comic_id
                    ]);
                    
                    $result = insert_chapter($comic_id, $title, $content, $chapter_number);
                    if($result) {
                        $thongbao = "Thêm chapter thành công!";
                        // Chuyển hướng sau khi thêm thành công
                        header("Location: index.php?act=list_chapters&comic_id=".$comic_id);
                    } else {
                        $thongbao = "Thêm chapter thất bại!";
                    }
                }
                
                include "view/comics/add_chapter.php";
            } else {
                header("Location: index.php?act=list_comics");
            }
            break;

        case 'edit_chapter':
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $chapter_id = $_GET['id'];
                $chapter = get_chapter($chapter_id);
                if(isset($_POST['update_chapter'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    
                    update_chapter($chapter_id, $title, $content);
                    header("Location: index.php?act=list_chapters&comic_id=".$chapter['comic_id']);
                }
                include "view/comics/edit_chapter.php";
            } else {
                header("Location: index.php?act=list_comics");
            }
            break;

        case 'delete_chapter':
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $chapter = get_chapter($_GET['id']);
                $comic_id = $chapter['comic_id'];
                delete_chapter($_GET['id']);
                header("Location: index.php?act=list_chapters&comic_id=".$comic_id);
            } else {
                header("Location: index.php?act=list_comics");
            }
            break;

        // case 'dskh':
        //     $listtaikhoan = loadall_taikhoan("", 0);
        //     include "taikhoan/list.php";
        //     break;

        // case 'dsbl':
        //     $listbinhluan = loadall_binhluan(0);
        //     include "binhluan/list.php";
        //     break;

        default:
            include "../admin/home.php";
            break;
    }
} else {
    include "../admin/home.php";
}




include "../admin/footer.php";
