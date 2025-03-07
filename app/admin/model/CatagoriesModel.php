<?php
function loadall_categories() {
    $sql = "SELECT * FROM categories ORDER BY category_id ASC";
    return pdo_query($sql);
}

function insert_categories($name) {
    $sql = "INSERT INTO categories(name) 
            VALUES(?)";
    pdo_execute($sql, $name);
}

function delete_categories($category_id) {
    $sql = "DELETE FROM categories WHERE category_id=?";
    pdo_execute($sql, $category_id);
}

function loadone_categories($category_id) {
    $sql = "SELECT * FROM categories WHERE category_id=?";
    return pdo_query_one($sql, $category_id);
}

function update_categories($category_id, $name) {
    $sql = "UPDATE categories SET name=? 
            WHERE category_id=?";
    pdo_execute($sql, $name, $category_id);
}
