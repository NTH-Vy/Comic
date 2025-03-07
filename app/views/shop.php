<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop - Manga Store</title>
    <link rel="stylesheet" href="public/css/index.css" />
    <link rel="stylesheet" href="public/css/shop.css" />
    <!-- Swiper CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        
        .swiper-container {
            width: 100%;
            max-width: 1200px;
            height: 450px;
            position: relative;
            margin: 0 auto;
            padding: 20px;
            overflow: hidden;
            margin-top: 70px;
        }

        .swiper-slide {
            width: 300px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s, opacity 0.5s;
            margin: 0;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Nút điều hướng */
        .swiper-button-next,
        .swiper-button-prev {
            background-color: rgba(255, 255, 255, 0.8);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: #1e1f26;
            transform: translateY(-50%);
            z-index: 10;
            transition: all 0.3s ease;
        }

        .swiper-button-next {
            right: 20px;
        }

        .swiper-button-prev {
            left: 20px;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background-color: #1e1f26;
            color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 20px;
            font-weight: bold;
        }
        </div>
        <div class="swiper-slide">
          <img src="public/image/2.jpeg" alt="Manga 7" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/5.jpeg" alt="Manga 8" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/4.jpeg" alt="Manga 9" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/3.jpeg" alt="Manga 10" />
        </div>
      </div>
      <!-- Nút điều hướng -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- Chia layout thành 2 phần -->
    <div class="new-updates-ranking">
        <!-- Phần bên trái - Products -->
        <div class="left-box">
            <div class="title-wrapper">
                <h3>SẢN PHẨM NỔI BẬT<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
                <div class="underline"></div>
            </div>
            <div class="products-grid">
                <?php foreach($products as $product): ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="upload/<?= htmlspecialchars($product['image']) ?>" 
                             alt="<?= htmlspecialchars($product['product_name']) ?>">
                        <div class="product-tags">
                            <?php if($product['is_new']): ?>
                                <span class="tag new">Mới</span>
                            <?php endif; ?>
                            <?php if($product['discount'] > 0): ?>
                                <span class="tag sale">-<?= $product['discount'] ?>%</span>
                            <?php endif; ?>
                        </div>
                        <button class="favorite-btn">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><?= htmlspecialchars($product['product_name']) ?></h3>
                        <p class="product-price">
                            <?php if($product['discount'] > 0): ?>
                                <span class="original-price"><?= number_format($product['price']) ?>đ</span>
                                <span class="discounted-price">
                                    <?= number_format($product['price'] * (1 - $product['discount']/100)) ?>đ
                                </span>
                            <?php else: ?>
                                <span class="current-price"><?= number_format($product['price']) ?>đ</span>
                            <?php endif; ?>
                        </p>
                        <div class="product-actions">
                            <button class="btn-add-cart" data-product-id="<?= $product['product_id'] ?>">
                                <i class="fas fa-shopping-cart"></i> Thêm vào giỏ
                            </button>
                            <button class="btn-buy-now" data-product-id="<?= $product['product_id'] ?>">
                                Mua ngay
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Phần bên phải - Rankings -->
        <div class="right-box">
            <div class="title-wrapper">
                <h3>XẾP HẠNG LƯỢT MUA<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
                <div class="underline"></div>
            </div>
            
            <div class="tab-content" id="purchase-ranking">
                <?php foreach($top_products as $index => $product): ?>
                <div class="ranking-item">
                    <span class="rank"><?= $index + 1 ?></span>
                    <img src="upload/<?= htmlspecialchars($product['image']) ?>" 
                         alt="<?= htmlspecialchars($product['product_name']) ?>">
                    <div class="ranking-info">
                        <div class="genre">Manga</div>
                        <h4><?= htmlspecialchars($product['product_name']) ?></h4>
                        <p class="author"><?= number_format($product['price']) ?>đ • <?= $product['sales_count'] ?> lượt mua</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const swiper = new Swiper(".swiper-container", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 150,
            modifier: 1,
            slideShadows: true,
          },
          spaceBetween: 0,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
      });

      // JavaScript for Tab Switching
      function switchTab(element, tabId) {
        // Remove active class from all tabs
        const tabs = document.querySelectorAll(".tab");
        tabs.forEach((tab) => tab.classList.remove("active"));
        
        // Add active class to clicked tab
        element.classList.add("active");
        
        // Hide all tab contents
        const tabContents = document.querySelectorAll(".tab-content");
        tabContents.forEach((content) => content.style.display = "none");
        
        // Show selected tab content
        document.getElementById(tabId).style.display = "block";
      }
    </script>
  </body>
</html>

