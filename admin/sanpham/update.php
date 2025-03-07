<?php
$imgPath = "../upload/" . $sanpham['img'];

if (is_file($imgPath)) {
    $hinh = "<img src='" . $imgPath . "' height='80'>";
} else {
    $hinh = "no photo";
}
?>

<div class="row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT LOẠI HÀNG HOÁ</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                <select name="iddm">
                    <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            if ($danhmuc['id'] == $sanpham['iddm']) {
                                echo '<option value="' . $danhmuc['id'] . '" selected> ' . $danhmuc['name'] . '</option>';
                                continue;
                            }

                            echo '<option value="' . $danhmuc['id'] . '"> ' . $danhmuc['name'] . '</option>';
                        }
                    ?>

                </select>
            </div>
            <div class="row mb10">
                TÊN SẢN PHẨM <br>
                <input type="text" name="tensp" value="<?= $sanpham['name'] ?>">
            </div>
            <div class="row mb10">
                GIÁ <br>
                <input type="text" name="giasp" value="<?= $sanpham['price'] ?>">
            </div>
            <div class="row mb10">
                HÌNH <br>
                <input type="file" name="hinh">
                <?= $hinh ?>
            </div>
            <div class="row mb10">
                MÔ TẢ <br>
                <textarea name="mota" cols="30" rows="10"><?= $sanpham['mota'] ?></textarea>
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?= $sanpham['id'] ?>">
                <input type="submit" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

            ?>
        </form>
    </div>
</div>
</div>