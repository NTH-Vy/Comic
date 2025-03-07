<div class="row mb">
            <!-- box trái thân trang -->
            <div class="boxtrai mr">
            <div class="row mb">
                <?php
                    extract($onesp);
                ?>
            <div class="boxtitle"><?=$name?></div>
                <div class="row boxcontent ">
                    <?php
                        
                        $img=$img_path.$img;
                        echo '<div class="row mb spct"><img style="width: 50%;" src="'.$img.'"></div>';
                        echo $mota;
                    ?>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
                });
            </script>
            <div class="row" id="binhluan">
                
            </div>
            <div class="row mb">
                <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
                <div class="row boxcontent ">
                <?php
                        foreach ($sp_cung_loai as $sp_cung_loai) {
                            extract($sp_cung_loai);
                            $linksp="index.php?act=sanphamct&idsp=".$id;
                            echo '<li><a href="'.$linksp.'">'.$name.'</a></li>';
                        }
                    ?>
                </div>      
            </div>
            </div>
            <!-- box phải thân trang -->
            <div class="boxphai">
                <?php include "boxright.php";?>
            </div>
        </div>