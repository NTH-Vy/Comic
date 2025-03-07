<?php
function loadall_categories() {
    $sql = "SELECT * FROM categories ORDER BY name ASC";
    return pdo_query($sql);
}

function loadone_category($category_id) {
    $sql = "SELECT * FROM categories WHERE category_id = ?";
    return pdo_query_one($sql, $category_id);
}

function get_comics_by_category($category_id) {
    $sql = "SELECT c.*, a.name as author_name 
            FROM comics c 
            LEFT JOIN authors a ON c.author_id = a.author_id
            JOIN comic_categories cc ON c.comic_id = cc.comic_id
            WHERE cc.category_id = ?
            ORDER BY c.created_at DESC";
    return pdo_query($sql, $category_id);
}

function insert_category($name) {
    $sql = "INSERT INTO categories(name) VALUES(?)";
    pdo_execute($sql, $name);
}

function update_category($category_id, $name) {
    $sql = "UPDATE categories SET name = ? WHERE category_id = ?";
    pdo_execute($sql, $name, $category_id);
}

function delete_category($category_id) {
    $sql = "DELETE FROM categories WHERE category_id = ?";
    pdo_execute($sql, $category_id);
}
?>