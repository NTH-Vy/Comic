<?php
function get_visit_stats() {
    $sql = "SELECT SUM(views) as total_views FROM comics";
    $total_views = pdo_query_one($sql);

    $sql = "SELECT c.title, c.views 
            FROM comics c 
            ORDER BY c.views DESC 
            LIMIT 5";
    $most_viewed = pdo_query($sql);

    return [
        'total_views' => $total_views['total_views'],
        'most_viewed' => $most_viewed
    ];
}

function get_purchase_stats() {
    $sql = "SELECT COUNT(*) as total_orders, 
            SUM(amount) as total_revenue 
            FROM payments";
    $payment_stats = pdo_query_one($sql);

    $sql = "SELECT p.*, u.username 
            FROM payments p
            JOIN users u ON p.user_id = u.user_id 
            ORDER BY p.payment_date DESC 
            LIMIT 5";
    $recent_payments = pdo_query($sql);

    return [
        'total_orders' => $payment_stats['total_orders'],
        'total_revenue' => $payment_stats['total_revenue'],
        'recent_payments' => $recent_payments
    ];
}

function get_popular_comics() {
    $sql = "SELECT c.*, a.name as author_name,
            (SELECT COUNT(*) FROM bookmarks b WHERE b.comic_id = c.comic_id) as bookmark_count
            FROM comics c
            LEFT JOIN authors a ON c.author_id = a.author_id
            ORDER BY c.views DESC, bookmark_count DESC
            LIMIT 5";
    return pdo_query($sql);
}

function get_active_users() {
    $sql = "SELECT u.username, u.user_email,
            COUNT(DISTINCT b.bookmark_id) as bookmarks,
            COUNT(DISTINCT c.comment_id) as comments,
            COUNT(DISTINCT p.payment_id) as purchases
            FROM users u
            LEFT JOIN bookmarks b ON u.user_id = b.user_id
            LEFT JOIN comments c ON u.user_id = c.user_id
            LEFT JOIN payments p ON u.user_id = p.user_id
            GROUP BY u.user_id
            ORDER BY (bookmarks + comments + purchases) DESC
            LIMIT 5";
    return pdo_query($sql);
}
