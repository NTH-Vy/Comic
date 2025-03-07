<?php
function insert_product($product_name, $description, $price, $stock_quantity, $image, $user_id) {
    $sql = "INSERT INTO store(product_name, description, price, stock_quantity, image, user_id) 
            VALUES(?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $product_name, $description, $price, $stock_quantity, $image, $user_id);
}

function delete_product($product_id) {
    $sql = "DELETE FROM store WHERE product_id=?";
    pdo_execute($sql, $product_id);
}

function loadall_products($keyword = "") {
    $sql = "SELECT s.*, u.username FROM store s 
            LEFT JOIN users u ON s.user_id = u.user_id";
    if($keyword != "") {
        $sql .= " WHERE product_name LIKE ? OR description LIKE ?";
        return pdo_query($sql, "%".$keyword."%", "%".$keyword."%");
    }
    return pdo_query($sql);
}

function loadone_product($product_id) {
    $sql = "SELECT * FROM store WHERE product_id=?";
    return pdo_query_one($sql, $product_id);
}

function update_product($product_id, $product_name, $description, $price, $stock_quantity, $image = '') {
    if($image != '') {
        $sql = "UPDATE store SET 
                product_name=?, 
                description=?, 
                price=?, 
                stock_quantity=?,
                image=?
                WHERE product_id=?";
        pdo_execute($sql, $product_name, $description, $price, $stock_quantity, $image, $product_id);
    } else {
        $sql = "UPDATE store SET 
                product_name=?, 
                description=?, 
                price=?, 
                stock_quantity=?
                WHERE product_id=?";
        pdo_execute($sql, $product_name, $description, $price, $stock_quantity, $product_id);
    }
}
