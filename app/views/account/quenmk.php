<div class="row mb">
            <!-- box trái thân trang -->
            <div class="boxtrai mr">
            <div class="row mb">
                
            <div class="boxtitle">QUÊN MẬT KHẨU</div>
                <div class="row boxcontent formtaikhoan">
                    <form action="index.php?act=quenmk" method="post">
                        <div class="row mb10">
                            Email
                            <input type="email" name="email" style="width: 100%; border: 1px #ccc solid; padding: 5px 10px; border-radius: 5px;" >
                        </div>
                        
                        <div class="row mb10">
                            <input type="submit" value="Gửi" name="guiemail">
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