<div class="row mb">
            <!-- box trái thân trang -->
            <div class="boxtrai mr">
            <div class="row mb">
                
            <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
                <div class="row boxcontent formtaikhoan">
                    <?php
                        if(isset($_SESSION['user'])&&(is_array(($_SESSION['user'])))){
                            extract($_SESSION['user']);
                        }
                    
                    ?>
                    <form action="index.php?act=edit_taikhoan" method="post">
                        <div class="row mb10">
                            Email
                            <input type="email" name="email" value="<?=$email?>" style="width: 100%; border: 1px #ccc solid; padding: 5px 10px; border-radius: 5px;" >
                        </div>
                        <div class="row mb10">
                            Tên đăng nhập
                            <input type="text" name="user" value="<?=$user?>">
                        </div>
                        <div class="row mb10">
                            Mật khẩu
                            <input type="password" name="pass" value="<?=$pass?>">
                        </div>
                        <div class="row mb10">
                            Địa chỉ
                            <input type="text" name="address" value="<?=$address?>">
                        </div>
                        <div class="row mb10">
                            Điện thoại
                            <input type="text" name="tel" value="<?=$tel?>">
                        </div>
                        <div class="row mb10">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" value="Cập nhật" name="capnhat">
                            <input type="reset" value="Nhập lại" style="border-radius: 5px; padding: 5px 10px; background-color: white; border: 1px #ccc solid;">
                        </div>
                    </form>
                    <h2 class="thongbao">
                    <?php
                    
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }
                    
                    ?>
                    </h2>
                </div>
            </div>
           
            </div>
            <!-- box phải thân trang -->
            <div class="boxphai">
                <?php include "view/boxright.php";?>
            </div>
        </div>