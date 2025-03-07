<?php
function loadall_users($page = 1, $items_per_page = 10, $keyword = '') {
    $start = ($page - 1) * $items_per_page;
    
    if($keyword != '') {
        $sql = "SELECT * FROM users WHERE user_email LIKE ? ORDER BY user_id DESC LIMIT $start, $items_per_page";
        return pdo_query($sql, '%' . $keyword . '%');
    } else {
        $sql = "SELECT * FROM users ORDER BY user_id ASC LIMIT $start, $items_per_page";
        return pdo_query($sql);
    }
}

function insert_users($user_email, $username, $password, $role) {
    // Hash mật khẩu trước khi lưu vào database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users(user_email, username, password, role) 
            VALUES(?, ?, ?, ?)";
    pdo_execute($sql, $user_email, $username, $hashed_password, $role);
}

function delete_users($id) {
    $sql = "DELETE FROM users WHERE user_id=?";
    pdo_execute($sql, $id);
}

function loadone_users($id) {
    $sql = "SELECT * FROM users WHERE user_id=?";
    return pdo_query_one($sql, $id);
}

function update_users($id, $user_email, $username, $password, $role) {
    if($password != "") {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET user_email=?, username=?, password=?, role=? WHERE user_id=?";
        pdo_execute($sql, $user_email, $username, $hashed_password, $role, $id);
    } else {
        $sql = "UPDATE users SET user_email=?, username=?, role=? WHERE user_id=?";
        pdo_execute($sql, $user_email, $username, $role, $id);
    }
}

function count_users($keyword = '') {
    if($keyword != '') {
        $sql = "SELECT COUNT(*) as total FROM users WHERE user_email LIKE ?";
        $result = pdo_query_one($sql, '%' . $keyword . '%');
    } else {
        $sql = "SELECT COUNT(*) as total FROM users";
        $result = pdo_query_one($sql);
    }
    return (int)$result['total'];
}
