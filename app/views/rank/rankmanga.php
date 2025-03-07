<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Horizontal Manga Slider - Coverflow Effect</title>
    <script src="public/js/swiper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="public/css/index.css" />
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
        body{
        margin: 0;
        padding: 0;
        }
        
        .swiper-container {
        margin-top:70px; /* Thêm khoảng cách phía trên slider */
        }
        
      /* .swiper-wrapper {
        display: flex;
      } */

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
        color: #283655;
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
        background-color: #283655;
        color: white;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        transform: translateY(-50%) scale(1.1);
      }

      .swiper-button-next::after,
      .swiper-button-prev::after {
        font-size: 20px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
        <!-- Swiper Container -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <!-- Các bìa truyện -->
        <div class="swiper-slide">
          <img src="public/image/6.jpeg" alt="Manga 1" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/2.jpeg" alt="Manga 2" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/5.jpeg" alt="Manga 3" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/4.jpeg" alt="Manga 4" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/3.jpeg" alt="Manga 5" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/6.jpeg" alt="Manga 6" />
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
        <div class="swiper-slide">
          <img src="public/image/6.jpeg" alt="Manga 1" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/2.jpeg" alt="Manga 2" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/5.jpeg" alt="Manga 3" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/4.jpeg" alt="Manga 4" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/3.jpeg" alt="Manga 5" />
        </div>
        <div class="swiper-slide">
          <img src="public/image/6.jpeg" alt="Manga 6" />
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

    <!-- Mục truyện mới cập nhật và bảng xếp hạng -->
    <div class="new-updates-ranking">
      <div class="left-box">
        <div class="title-wrapper">
          <h3>BẢNG XẾP HẠNG HÀNG THÁNG<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
          <div class="underline"></div>
        </div>
        <!-- Danh sách truyện mới cập nhật -->
        <div class="manga-list">
          <?php 
          // Initialize ComicModel
          $comicModel = new App\Models\ComicModel();
          
          // Get all comics using the model
          $topComics = $comicModel->getAll();
          
          // Kiểm tra nếu $topComics là mảng hợp lệ
          if (is_array($topComics)) {
              // Sắp xếp theo số lượng yêu thích
              usort($topComics, function($a, $b) {
                  return $b['favorites'] - $a['favorites'];
              });
          } else {
              // Xử lý khi $topComics không phải là mảng (ví dụ: null hoặc rỗng)
              $topComics = []; // Mặc định là mảng rỗng
          }
          
          // Lấy 8 truyện đứng đầu
          $topComics = array_slice($topComics, 0, 8);
          
          foreach($topComics as $comic): 
          ?>
            <div class="manga-item">
              <div class="manga-thumb">
                <div class="stats-overlay">
                  <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> <?php echo number_format($comic['favorites']); ?></span>
                  <?php if($comic['status'] == 'ongoing'): ?>
                    <span class="up-badge">UP</span>
                  <?php endif; ?>
                </div>
                <img src="app/upload/<?php echo $comic['cover_image']; ?>" alt="<?php echo $comic['title']; ?>">
                <div class="manga-title"><?php echo $comic['title']; ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>

      <div class="right-box">
        <div class="title-wrapper">
          <h3>XẾP HẠNG TRUYỆN TRANH<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
          <div class="underline"></div>
        </div>
        
        <!-- Tab Content -->
        <div class="tab-content" id="daily">
          <div class="ranking-item">
            <span class="rank">1</span>
            <img src="public/image/2.jpeg" alt="Be By My Side">
            <div class="ranking-info">
              <div class="genre">Romance</div>
              <h4>Be By My Side</h4>
              <p class="author">Team yundo / sumto</p>
            </div>
          </div>
          <div class="ranking-item">
            <span class="rank">2</span>
            <img src="public/image/3.jpeg" alt="I've Fallen for the Empire's Greatest Villainess">
            <div class="ranking-info">
              <div class="genre">Romance</div>
              <h4>I've Fallen for the Empire's Greatest Villainess</h4>
              <p class="author">AJI / Atsushi</p>
            </div>
          </div>
          <div class="ranking-item">
            <span class="rank">3</span>
            <img src="public/image/4.jpeg" alt="Girlfriend Manual">
            <div class="ranking-info">
              <div class="genre">Romance</div>
              <h4>Girlfriend Manual</h4>
              <p class="author">saefira (Merlin)</p>
            </div>
          </div>
          <div class="ranking-item">
            <span class="rank">4</span>
            <img src="public/image/5.jpeg" alt="The Necromancer Family's Young Heir">
            <div class="ranking-info">
              <div class="genre">Fantasy</div>
              <h4>The Necromancer Family's Young Heir</h4>
              <p class="author">Jung seonyui / guback</p>
            </div>
          </div>
          <div class="ranking-item">
            <span class="rank">5</span>
            <img src="public/image/6.jpeg" alt="Devilish Son-In-Law">
            <div class="ranking-info">
              <div class="genre">Fantasy</div>
              <h4>Devilish Son-In-Law</h4>
              <p class="author">Park Soi / iiyuk</p>
            </div>
          </div>
        </div>

        <div class="tab-content" id="monthly" style="display: none;">
          <div class="ranking-item">
            <span class="rank">1</span>
            <img src="public/image/5.jpeg" alt="Manga">
            <div class="ranking-info">
              <h4>Bleach</h4>
              <p>Lượt xem: 45,678</p>
            </div>
          </div>
          <div class="ranking-item">
            <span class="rank">2</span>
            <img src="public/image/6.jpeg" alt="Manga">
            <div class="ranking-info">
              <h4>Death Note</h4>
              <p>Lượt xem: 38,901</p>
            </div>
          </div>
          <div class="ranking-item">
            <span class="rank">3</span>
            <img src="public/image/2.jpeg" alt="Manga">
            <div class="ranking-info">
              <h4>Attack on Titan</h4>
              <p>Lượt xem: 32,145</p>
            </div>
          </div>
        </div>

        <div class="title-wrapper">
          <h3>LỊCH SỬ ĐỌC<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
            <div class="underline"></div>
        </div>

        <!-- Reading History Content -->
        <div class="tab-content" id="history">
          <div class="ranking-item">
            <span class="rank"><i class="fas fa-clock" style="color: #666;"></i></span>
            <img src="public/image/2.jpeg" alt="Last Read Manga">
            <div class="ranking-info">
              <div class="genre">Romance</div>
              <h4>Be By My Side</h4>
              <p class="author">Chapter 45 • 2 giờ trước</p>
            </div>
          </div>
          
          <div class="ranking-item">
            <span class="rank"><i class="fas fa-clock" style="color: #666;"></i></span>
            <img src="public/image/3.jpeg" alt="Last Read Manga">
            <div class="ranking-info">
              <div class="genre">Fantasy</div>
              <h4>I've Fallen for the Empire's Greatest Villainess</h4>
              <p class="author">Chapter 23 • 5 giờ trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-clock" style="color: #666;"></i></span>
            <img src="public/image/4.jpeg" alt="Last Read Manga">
            <div class="ranking-info">
              <div class="genre">Romance</div>
              <h4>Girlfriend Manual</h4>
              <p class="author">Chapter 12 • 1 ngày trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-clock" style="color: #666;"></i></span>
            <img src="public/image/5.jpeg" alt="Last Read Manga">
            <div class="ranking-info">
              <div class="genre">Action</div>
              <h4>The Necromancer Family's Young Heir</h4>
              <p class="author">Chapter 67 • 2 ngày trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-clock" style="color: #666;"></i></span>
            <img src="public/image/6.jpeg" alt="Last Read Manga">
            <div class="ranking-info">
              <div class="genre">Comedy</div>
              <h4>Devilish Son-In-Law</h4>
              <p class="author">Chapter 89 • 3 ngày trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-clock" style="color: #666;"></i></span>
            <img src="public/image/5.jpeg" alt="Last Read Manga">
            <div class="ranking-info">
              <div class="genre">Action</div>
              <h4>The Necromancer Family's Young Heir</h4>
              <p class="author">Chapter 67 • 2 ngày trước</p>
            </div>
          </div>
        </div>

        <div class="title-wrapper">
          <h3>HOẠT ĐỘNG GẦN ĐÂY<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
            <div class="underline"></div>
        </div>

        <!-- Recent Activity Content -->
        <div class="tab-content" id="recent-activity">
          <div class="ranking-item">
            <span class="rank"><i class="fas fa-comment" style="color: #ff6b81;"></i></span>
            <img src="public/image/2.jpeg" alt="Recent Activity">
            <div class="ranking-info">
              <div class="genre">Bình luận của bạn</div>
              <h4>Be By My Side</h4>
              <p class="author">"Tập này hay quá!" • 30 phút trước</p>
            </div>
          </div>
          
          <div class="ranking-item">
            <span class="rank"><i class="fas fa-heart" style="color: #ff6b81;"></i></span>
            <img src="public/image/3.jpeg" alt="Recent Activity">
            <div class="ranking-info">
              <div class="genre">Đã thêm vào yêu thích</div>
              <h4>I've Fallen for the Empire's Greatest Villainess</h4>
              <p class="author">1 giờ trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-book-reader" style="color: #1ae41a;"></i></span>
            <img src="public/image/4.jpeg" alt="Recent Activity">
            <div class="ranking-info">
              <div class="genre">Đã đọc Chapter 13</div>
              <h4>Girlfriend Manual</h4>
              <p class="author">2 giờ trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-comment" style="color: #ff6b81;"></i></span>
            <img src="public/image/5.jpeg" alt="Recent Activity">
            <div class="ranking-info">
              <div class="genre">Bình luận của bạn</div>
              <h4>The Necromancer Family's Young Heir</h4>
              <p class="author">"Cốt truyện rất cuốn!" • 3 giờ trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-heart" style="color: #ff6b81;"></i></span>
            <img src="public/image/6.jpeg" alt="Recent Activity">
            <div class="ranking-info">
              <div class="genre">Đã thêm vào yêu thích</div>
              <h4>Devilish Son-In-Law</h4>
              <p class="author">4 giờ trước</p>
            </div>
          </div>

          <div class="ranking-item">
            <span class="rank"><i class="fas fa-book-reader" style="color: #1ae41a;"></i></span>
            <img src="public/image/5.jpeg" alt="Recent Activity">
            <div class="ranking-info">
              <div class="genre">Đã đọc Chapter 69</div>
              <h4>The Necromancer Family's Young Heir</h4>
              <p class="author">5 giờ trước</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Khởi tạo Swiper slider
      const swiper = new Swiper('.swiper-container', {
        spaceBetween: 50, // Khoảng cách giữa các slide
        slidesPerView: 5, // Số lượng slide hiển thị cùng lúc
        loop: true, // Lặp lại slider
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          1024: {
            slidesPerView: 5, // Hiển thị 5 slide trên màn hình rộng
          },
          768: {
            slidesPerView: 3, // Hiển thị 3 slide trên màn hình tablet
          },
          480: {
            slidesPerView: 1, // Hiển thị 1 slide trên màn hình nhỏ
          },
        },
      });
    </script>
  </body>
</html>
