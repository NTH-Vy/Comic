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
      .manga-title {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 20px 15px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      }

      .manga-title-text {
        margin: 0;
        font-size: 14px;
        font-weight: 500;
        position: absolute;
        bottom: 15px;
        transition: all 0.3s ease;
      }

      .read-now-btn {
        opacity: 0;
        background: #6c5ce7;
        color: white;
        padding: 8px 32px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s ease;
        transform: translateY(20px);
        position: absolute;
        bottom: 15px;
      }

      .manga-thumb:hover .manga-title-text {
        transform: translateY(-40px);
      }

      .manga-thumb:hover .read-now-btn {
        opacity: 1;
        transform: translateY(0);
      }

      .read-now-btn:hover {
        background: #5f4ed6;
        transform: scale(1.05);
      }

      .ranking-item {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #eee;
        transition: all 0.3s ease;
      }

      .ranking-item:hover {
        background-color: #f8f9fa;
        cursor: pointer;
      }

      .rank {
        width: 40px;
        text-align: center;
      }

      .ranking-item img {
        width: 60px;
        height: 80px;
        object-fit: cover;
        margin: 0 15px;
        border-radius: 4px;
      }

      .ranking-info {
        flex: 1;
        overflow: hidden;
      }

      .genre {
        display: inline-block;
        padding: 2px 8px;
        background-color: #e9ecef;
        border-radius: 12px;
        font-size: 12px;
        color: #495057;
        margin-bottom: 5px;
      }

      .ranking-info h4 {
        margin: 0 0 5px 0;
        font-size: 14px;
        color: #343a40;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .author {
        margin: 0;
        font-size: 12px;
        color: #6c757d;
      }

      /* Thêm hiệu ứng hover cho ảnh */
      .ranking-item img:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
      }

      /* Màu sắc cho top 3 */
      .ranking-item:nth-child(1) .rank { color: #ffd700; }
      .ranking-item:nth-child(2) .rank { color: #c0c0c0; }
      .ranking-item:nth-child(3) .rank { color: #cd7f32; }
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
          <h3>BÂY GIỜ CÓ GÌ MỚI!<a href="index.php?act=newmanga"><i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></a></h3>
          <div class="underline"></div>
        </div>
        <!-- Danh sách truyện mới cập nhật -->
        <div class="manga-list">
          <?php
          require_once "app/models/pdo.php";
          require_once "app/admin/model/ComicsModel.php";

          // Lấy dữ liệu comics từ database
          $listComics = loadall_comics();
          ?>
          <?php if (!empty($listComics)): ?>
            <?php foreach($listComics as $comic): ?>
              <div class="manga-item">
                <div class="manga-thumb">
                  <div class="stats-overlay">
                    <span class="view-count"><?php echo number_format($comic['views']); ?> lượt xem</span>
                    <?php if($comic['status'] == 'ongoing'): ?>
                      <span class="up-badge">UP</span>
                    <?php endif; ?>
                  </div>
                  <?php
                  // Kiểm tra và hiển thị ảnh
                  $imagePath = "app/uploads/" . $comic['cover_image'];
                  if(file_exists($imagePath) && !empty($comic['cover_image'])) {
                      $imageUrl = $imagePath;
                  } else {
                      $imageUrl = "app/uploads/default.jpg"; // Ảnh mặc định nếu không tìm thấy
                  }
                  ?>
                  <img src="<?php echo $imageUrl; ?>" alt="<?php echo $comic['title']; ?>">
                  <div class="manga-title">
                    <span class="manga-title-text"><?php echo $comic['title']; ?></span>
                    <a href="index.php?act=detailmanga&id=<?php echo $comic['comic_id']; ?>" class="read-now-btn">Đọc ngay</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Không có truyện nào được tìm thấy</p>
          <?php endif; ?>
        </div>

        <div class="title-wrapper">
          <h3>TRUYỆN TRANH ĐỀ CỬ<a href="index.php?act=hotmanga"><i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></a></h3>
            <div class="underline"></div>
        </div>
        <!-- Danh sách truyện mới cập nhật -->
        <div class="manga-list">
          <?php 
          $recommendedComics = loadall_comics();
          usort($recommendedComics, function($a, $b) {
            return $b['views'] - $a['views'];
          });
          $recommendedComics = array_slice($recommendedComics, 0, 8);
          
          foreach($recommendedComics as $comic): 
          ?>
            <div class="manga-item">
              <div class="manga-thumb">
                <div class="stats-overlay">
                  <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> <?php echo number_format($comic['favorites']); ?></span>
                  <?php if($comic['status'] == 'ongoing'): ?>
                    <span class="up-badge">UP</span>
                  <?php endif; ?>
                </div>
                <img src="public/image/<?php echo $comic['cover_image']; ?>" alt="<?php echo $comic['title']; ?>">
                <div class="manga-title">
                  <span class="manga-title-text"><?php echo $comic['title']; ?></span>
                  <a href="index.php?act=detailmanga&id=<?php echo $comic['comic_id']; ?>" class="read-now-btn">Đọc ngay</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="title-wrapper">
          <h3>BẢNG XẾP HẠNG HÀNG THÁNG<a href="index.php?act=rankmanga"><i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></a></h3>
          <div class="underline"></div>
        </div>
        <!-- Danh sách truyện mới cập nhật -->
        <div class="manga-list">
          <?php 
          $topComics = loadall_comics();
          usort($topComics, function($a, $b) {
            return $b['favorites'] - $a['favorites'];
          });
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
                <img src="public/image/<?php echo $comic['cover_image']; ?>" alt="<?php echo $comic['title']; ?>">
                <div class="manga-title">
                  <span class="manga-title-text"><?php echo $comic['title']; ?></span>
                  <a href="index.php?act=detailmanga&id=<?php echo $comic['comic_id']; ?>" class="read-now-btn">Đọc ngay</a>
                </div>
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
          <?php 
          $top_comics = get_top_comics(5);
          $rank = 1;
          foreach($top_comics as $comic):
              $categories = explode(',', $comic['categories']);
              $first_category = !empty($categories[0]) ? $categories[0] : 'Unknown';
              $cover_image = !empty($comic['cover_image']) ? "upload/" . $comic['cover_image'] : "public/image/no-image.png";
          ?>
          <div class="ranking-item">
              <span class="rank"><?= $rank++ ?></span>
              <img src="<?= $cover_image ?>" alt="<?= htmlspecialchars($comic['title']) ?>">
              <div class="ranking-info">
                  <div class="genre"><?= htmlspecialchars($first_category) ?></div>
                  <h4><?= htmlspecialchars($comic['title']) ?></h4>
                  <p class="author"><?= htmlspecialchars($comic['author_name']) ?></p>
                  <p class="views"><i class="fas fa-eye"></i> <?= number_format($comic['views']) ?></p>
              </div>
          </div>
          <?php endforeach; ?>
        </div>

        <div class="title-wrapper">
          <h3>LỊCH SỬ ĐỌC<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
            <div class="underline"></div>
        </div>

        <!-- Reading History Content -->
        <div class="tab-content" id="history">
          <?php 
          $recent_comics = get_recent_read_comics(6);
          foreach($recent_comics as $comic):
              $categories = explode(',', $comic['categories']);
              $first_category = !empty($categories[0]) ? $categories[0] : 'Unknown';
              $cover_image = !empty($comic['cover_image']) ? "upload/" . $comic['cover_image'] : "public/image/no-image.png";
              $time_ago = time_elapsed_string($comic['last_read']);
          ?>
          <div class="ranking-item">
              <span class="rank"><i class="fas fa-clock" style="color: #666;"></i></span>
              <img src="<?= $cover_image ?>" alt="<?= htmlspecialchars($comic['title']) ?>">
              <div class="ranking-info">
                  <div class="genre"><?= htmlspecialchars($first_category) ?></div>
                  <h4><?= htmlspecialchars($comic['title']) ?></h4>
                  <p class="author">Chapter <?= $comic['chapter_number'] ?> • <?= $time_ago ?></p>
              </div>
          </div>
          <?php endforeach; ?>
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
  </body>
</html>
