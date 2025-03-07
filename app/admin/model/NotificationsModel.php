<?php
function loadall_notifications($keyword = "") {
    $sql = "SELECT n.*, u.username 
            FROM notifications n 
            LEFT JOIN users u ON n.user_id = u.user_id";
    
    if($keyword != "") {
        $sql .= " WHERE n.content LIKE '%".$keyword."%' OR u.username LIKE '%".$keyword."%'";
    }
    
    $sql .= " ORDER BY n.created_at DESC";
    
    return pdo_query($sql);
}

function delete_notification($notification_id) {
    $sql = "DELETE FROM notifications WHERE notification_id = ?";
    pdo_execute($sql, $notification_id);
}

function mark_as_read($notification_id) {
    $sql = "UPDATE notifications SET is_read = 1 WHERE notification_id = ?";
    pdo_execute($sql, $notification_id);
}
