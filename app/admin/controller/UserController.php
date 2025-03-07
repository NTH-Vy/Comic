<?php
function list_users() {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 10;
    
    // Đảm bảo rằng hàm count_users() được gọi từ model
    require_once "../app/admin/model/UsersModel.php";
    
    // Lấy tổng số users và gán vào biến $total_users
    $total_users = count_users();
    $listusers = loadall_users($page, $limit);
    
    // Sửa lại đường dẫn include cho view
    include "../app/admin/view/users/list.php";
}

function update_user() {
    if(isset($_POST['capnhat'])) {
        $user_id = $_POST['user_id'];
        $user_email = $_POST['user_email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        // Gọi hàm update từ model
        update_users($user_id, $user_email, $username, $password, $role);
        
        // Thông báo cập nhật thành công
        $thongbao = "Cập nhật thành công!";
    }
    
    // Load lại thông tin user sau khi cập nhật
    $dm = loadone_users($user_id);
    var_dump($_POST);  // Kiểm tra dữ liệu gửi lên
    include "../app/admin/view/users/edit.php";
}
?>
