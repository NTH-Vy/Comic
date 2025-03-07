<?php
function loadall_comments() {
    $sql = "SELECT c.*, u.username, co.title as comic_title, ch.chapter_number 
            FROM comments c
            LEFT JOIN users u ON c.user_id = u.user_id
            LEFT JOIN comics co ON c.comic_id = co.comic_id
            LEFT JOIN chapters ch ON c.chapter_id = ch.chapter_id
            ORDER BY c.created_at DESC";
    return pdo_query($sql);
}

function delete_comment($comment_id) {
    $sql = "DELETE FROM comments WHERE comment_id = ?";
    pdo_execute($sql, $comment_id);
}
