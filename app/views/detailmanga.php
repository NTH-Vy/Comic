<?php
use App\Helpers\TimeHelper;
// Đảm bảo có dữ liệu từ controller
if (!isset($comic)) {
    header("Location: index.php");
    exit;
}
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
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

      .title {
        font-size: 32px;
        font-family: 'Poppins', sans-serif;
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

    <div class="manga-detail-container">
        <div class="left-column">
            <div class="manga-info">
                <div class="manga-header">
                    <div class="manga-cover">
                        <img src="app/upload/<?php echo htmlspecialchars($comic['cover_image']); ?>" 
                             alt="<?php echo htmlspecialchars($comic['title']); ?>">
                    </div>
                    <div class="manga-header-info">
                        <div class="manga-meta-info">
                            <div class="manga-meta-row">
                                <h1 class="title"><?php echo htmlspecialchars($comic['title']); ?></h1>
                                <div class="meta-details">
                                    <span>Tác giả: <?php echo htmlspecialchars($comic['author_name']); ?></span>
                                    <span>Tình trạng: <?php echo $comic['status'] == 'ongoing' ? 'Đang tiến hành' : 'Đã hoàn thành'; ?></span>
                                    <span>Lượt xem: <?php echo number_format($comic['views']); ?></span>
                                </div>
                            </div>
                            <?php if (!empty($comic['categories'])): ?>
                            <div class="manga-tags">
                                <?php foreach(explode(',', $comic['categories']) as $category): ?>
                                    <span class="tag"><?php echo htmlspecialchars(trim($category)); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <div class="manga-description">
                                <p><?php echo nl2br(htmlspecialchars($comic['description'])); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="chapter-list">
                    <h3>Danh sách chương</h3>
                    <div class="chapter-items">
                        <?php if (!empty($chapters)): ?>
                            <?php foreach($chapters as $chapter): ?>
                            <div class="chapter-item">
                                <div class="chapter-left">
                                    <span class="chapter-number">Chapter <?php echo $chapter['chapter_number']; ?></span>
                                    <span class="chapter-title"><?php echo htmlspecialchars($chapter['title']); ?></span>
                                </div>
                                <span class="chapter-date">
                                    <?php echo date('Y-m-d', strtotime($chapter['created_at'])); ?>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Chưa có chapter nào.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="comments-section">
                    <h3>Bình luận</h3>
                    <?php if(isset($_SESSION['user'])): ?>
                        <div class="comment-form">
                            <form action="index.php?act=add_comment" method="POST">
                                <input type="hidden" name="comic_id" value="<?= $comic['comic_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                                <textarea name="content" placeholder="Viết bình luận của bạn..." required></textarea>
                                <button type="submit" name="submit_comment" class="submit-comment">Gửi</button>
                            </form>
                        </div>
                    <?php else: ?>
                        <p>Vui lòng <a href="index.php?act=login">đăng nhập</a> để bình luận.</p>
                    <?php endif; ?>

                    <div class="comment-list">
                        <?php if(!empty($comments)): ?>
                            <?php foreach($comments as $comment): ?>
                                <div class="comment-item">
                                    <div class="comment-avatar">
                                        <img src="public/image/avatar.jpg" alt="User Avatar">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-header">
                                            <span class="comment-author"><?= htmlspecialchars($comment['username']) ?></span>
                                            <span class="comment-date"><?= TimeHelper::timeAgo($comment['created_at']) ?></span>
                                        </div>
                                        <p class="comment-text"><?= htmlspecialchars($comment['content']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Chưa có bình luận nào.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cột bên phải -->
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

    <style>
        .manga-detail-container {
            display: flex;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .left-column {
            flex: 2;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .right-column {
            flex: 1;
        }

        .manga-info {
            margin-bottom: 30px;
        }

        .manga-header {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .manga-cover {
            flex-shrink: 0;
            width: 250px;
            height: 350px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .manga-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .manga-header-info {
            flex: 1;
        }

        .manga-meta-info {
            padding: 15px 0;
        }

        .manga-meta-row {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 15px;
        }

        .manga-title {
            font-size: 28px;
            color: #283655;
            font-weight: bold;
            margin: 0;
        }

        .meta-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .meta-details span {
            color: #666;
            font-size: 14px;
        }

        .manga-tags {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .tag {
            background: #f0f0f0;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 14px;
            color: #666;
        }

        .manga-description {
            color: #444;
            line-height: 1.6;
            font-size: 15px;
            margin-top: 20px;
        }

        .manga-description p {
            margin: 0;
        }

        .chapter-list {
            margin-bottom: 30px;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }

        .chapter-list h3 {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .chapter-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s;
        }

        .chapter-item:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }

        .chapter-left {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .chapter-number {
            font-weight: bold;
            color: #283655;
        }

        .chapter-title {
            color: #666;
        }

        .chapter-date {
            color: #999;
            font-size: 0.9em;
        }

        .comments-section {
            margin-top: 30px;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }

        .comment-form {
            margin-bottom: 30px;
        }

        .comment-list {
            margin-top: 30px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            resize: vertical;
            min-height: 80px;
        }

        .submit-comment {
            background: #283655;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .submit-comment:hover {
            background: #1a2540;
        }

        .comment-item {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .comment-avatar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .comment-author {
            font-weight: bold;
            color: #283655;
        }

        .comment-date {
            color: #999;
            font-size: 0.9em;
        }

        .comment-text {
            color: #444;
            line-height: 1.5;
        }

        .chapter-items {
            max-height: 500px;
            overflow-y: auto;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .page-btn {
            padding: 8px 12px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .page-btn:hover:not(:disabled) {
            background: #283655;
            color: white;
            border-color: #283655;
        }

        .page-btn.active {
            background: #283655;
            color: white;
            border-color: #283655;
        }

        .page-btn:disabled {
            background: #f5f5f5;
            color: #999;
            cursor: not-allowed;
        }

        /* Thêm style cho nút quay lại */
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .btn-back {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background-color: #283655;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #1a2540;
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .btn-back i {
            font-size: 16px;
        }
    </style>
  </body>
</html>
    
    