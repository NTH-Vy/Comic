<?php
namespace App\Helpers;

class TimeHelper {
    public static function timeAgo($datetime) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        if ($diff->y > 0) return $diff->y . ' năm trước';
        if ($diff->m > 0) return $diff->m . ' tháng trước';
        if ($diff->d > 0) return $diff->d . ' ngày trước';
        if ($diff->h > 0) return $diff->h . ' giờ trước';
        if ($diff->i > 0) return $diff->i . ' phút trước';
        return 'Vừa xong';
    }
} 