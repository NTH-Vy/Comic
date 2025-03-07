<?php
function loadall_payments($keyword = '') {
    $sql = "SELECT p.*, u.username 
            FROM payments p 
            INNER JOIN users u ON p.user_id = u.user_id";
    
    if($keyword != '') {
        $sql .= " WHERE u.username LIKE '%$keyword%'";
    }
    
    $sql .= " ORDER BY p.payment_date DESC";
    
    return pdo_query($sql);
}

function delete_payment($payment_id) {
    $sql = "DELETE FROM payments WHERE payment_id = ?";
    pdo_execute($sql, $payment_id);
}
