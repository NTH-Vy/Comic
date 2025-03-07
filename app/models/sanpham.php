<?php

class Sanpham {
    
    public static function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm) {
        $sql = "INSERT INTO sanpham (name, price, img, mota, iddm) VALUES (:name, :price, :img, :mota, :iddm)";
        return pdo_execute($sql, [
            ':name' => $tensp,
            ':price' => $giasp,
            ':img' => $hinh,
            ':mota' => $mota,
            ':iddm' => $iddm
        ]);
    }

    public static function delete_sanpham($id) {
        $sql = "DELETE FROM sanpham WHERE id = :id";
        return pdo_execute($sql, [':id' => $id]);
    }

    public static function loadall_sanpham_top10() {
        $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 10";
        return pdo_query($sql);
    }

    public static function loadall_sanpham_home() {
        $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 15";
        return pdo_query($sql);
    }

    public static function loadall_sanpham($kyw = "", $iddm = 0) {
        $sql = "SELECT * FROM sanpham WHERE 1";
        $params = [];

        if (!empty($kyw)) {
            $sql .= " AND name LIKE :kyw";
            $params[':kyw'] = "%$kyw%";
        }

        if ($iddm > 0) {
            $sql .= " AND iddm = :iddm";
            $params[':iddm'] = $iddm;
        }

        $sql .= " ORDER BY id DESC";
        return !empty($params) ? pdo_query($sql, $params) : pdo_query($sql);
    }

    public static function load_ten_dm($iddm) {
        if ($iddm > 0) {
            $sql = "SELECT name FROM danhmuc WHERE id = :iddm";
            $dm = pdo_query_one($sql, [':iddm' => $iddm]);
            return $dm ? $dm['name'] : "";
        }
        return "";
    }

    public static function loadone_sanpham($id) {
        $sql = "SELECT * FROM sanpham WHERE id = :id";
        return pdo_query_one($sql, [':id' => $id]);
    }

    public static function load_sanpham_cungloai($id, $iddm) {
        $sql = "SELECT * FROM sanpham WHERE iddm = :iddm AND id <> :id";
        return pdo_query($sql, [':iddm' => $iddm, ':id' => $id]);
    }

    public static function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh = "") {
        $sql = "UPDATE sanpham SET iddm = :iddm, name = :name, price = :price, mota = :mota";
        $params = [
            ':iddm' => $iddm,
            ':name' => $tensp,
            ':price' => $giasp,
            ':mota' => $mota,
            ':id' => $id
        ];

        if (!empty($hinh)) {
            $sql .= ", img = :img";
            $params[':img'] = $hinh;
        }

        $sql .= " WHERE id = :id";
        return pdo_execute($sql, $params);
    }
}

?>
