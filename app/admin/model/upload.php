<?php
function upload_file($file, $target_dir = "../upload/") {
    // Kiểm tra xem thư mục upload có tồn tại không, nếu không thì tạo mới
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $result = [
        'status' => false,
        'name' => '',
        'error' => ''
    ];

    // Kiểm tra xem có file được upload không
    if (!isset($file['name']) || $file['error'] != 0) {
        $result['error'] = "Không có file được upload hoặc file upload bị lỗi";
        return $result;
    }

    $file_name = basename($file["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra kích thước file (giới hạn 5MB)
    if ($file["size"] > 5000000) {
        $result['error'] = "File quá lớn. Vui lòng chọn file nhỏ hơn 5MB.";
        return $result;
    }

    // Kiểm tra định dạng file
    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_types)) {
        $result['error'] = "Chỉ chấp nhận file JPG, JPEG, PNG & GIF.";
        return $result;
    }

    // Tạo tên file unique để tránh trùng lặp
    $new_file_name = uniqid() . '.' . $imageFileType;
    $target_file = $target_dir . $new_file_name;

    // Upload file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $result['status'] = true;
        $result['name'] = $new_file_name;
    } else {
        $result['error'] = "Có lỗi xảy ra khi upload file.";
    }

    return $result;
} 