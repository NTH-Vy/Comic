<?php

    if(is_array($dm)){
        extract($dm);
    }


?>

<div class="row">
            <div class="row frmtitle"><h1>CẬP NHẬT LOẠI HÀNG HOÁ</h1></div>
            <div class="row frmcontent">
                <form action="index.php?act=updatedm" method="post">
                    <div class="row mb10">
                        MÃ LOẠI
                        <input type="text" name="maloai" disabled>
                    </div>
                    <div class="row mb10">
                        TÊN LOẠI
                        <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name ;?>">
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id ;?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=lisdm"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    
                    ?>
                </form>
            </div>
        </div>
    </div>    