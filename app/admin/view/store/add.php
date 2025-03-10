<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            height: 100px;
        }
        .button-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .preview-image {
            max-width: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1><i class="fas fa-plus-circle"></i> Thêm sản phẩm mới</h1>
        </div>

        <div class="content">
            <form action="index.php?act=add_product" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Tên sản phẩm</label>
                    <input type="text" name="product_name" id="product_name" required>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Giá ($)</label>
                    <input type="number" name="price" id="price" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="stock_quantity">Số lượng trong kho</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" required>
                </div>

                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" name="image" id="image" accept="image/*" required>
                    <div id="imagePreview" class="preview-image"></div>
                </div>

                <div class="button-group">
                    <input type="submit" name="themmoi" value="Thêm mới" class="save-btn">
                    <a href="index.php?act=list_products" class="cancel-btn">Hủy</a>
                </div>

                <?php
                if(isset($thongbao) && ($thongbao != "")) {
                    echo '<div class="alert alert-success">'.$thongbao.'</div>';
                }
                ?>
            </form>
        </div>
    </div>

    <script>
        // Preview image before upload
        document.getElementById('image').onchange = function(evt) {
            const [file] = this.files;
            if (file) {
                const preview = document.getElementById('imagePreview');
                preview.innerHTML = `<img src="${URL.createObjectURL(file)}" alt="Preview" style="max-width: 200px;">`;
            }
        };
    </script>
</body>
</html>
