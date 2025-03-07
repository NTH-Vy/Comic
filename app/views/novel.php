<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Horizontal Manga Slider - Coverflow Effect</title>
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
          <h3>BÂY GIỜ CÓ GÌ MỚI!<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
          <div class="underline"></div>
        </div>
        <!-- Danh sách truyện mới cập nhật -->
        <div class="manga-list">
          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count">1,199 만화</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Blind Kiss">
              <div class="manga-title">블라인드 키스</div>
            </div>
          </div>
          
          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 1.7M</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/4.jpeg" alt="The Reborn Young Lord">
            </div>
            <div class="manga-title">The Reborn Young Lord is an Assassin</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>
        </div>

        <div class="title-wrapper">
          <h3>TRUYỆN TRANH ĐỀ CỬ<i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
            <div class="underline"></div>
        </div>
        <!-- Danh sách truyện mới cập nhật -->
        <div class="manga-list">
          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count">1,199 만화</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Blind Kiss">
              <div class="manga-title">블라인드 키스</div>
            </div>
          </div>
          
          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 1.7M</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/4.jpeg" alt="The Reborn Young Lord">
            </div>
            <div class="manga-title">The Reborn Young Lord is an Assassin</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>
        </div>

        <div class="title-wrapper">
          <h3>BẢNG XẾP HẠNG HÀNG THÁNG <i class="fas fa-chevron-right" style="font-size: 14px; margin-left: 8px;"></i></h3>
          <div class="underline"></div>
        </div>
                <!-- Danh sách truyện mới cập nhật -->
        <div class="manga-list">
          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count">1,199 만화</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Blind Kiss">
              <div class="manga-title">블라인드 키스</div>
            </div>
          </div>
          
          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 1.7M</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/4.jpeg" alt="The Reborn Young Lord">
            </div>
            <div class="manga-title">The Reborn Young Lord is an Assassin</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>

          <div class="manga-item">
            <div class="manga-thumb">
              <div class="stats-overlay">
                <span class="view-count"><i class="fas fa-heart" style="color: #1ae41a;"></i> 599,422</span>
                <span class="up-badge">UP</span>
              </div>
              <img src="public/image/3.jpeg" alt="Duchess in Ruins">
            </div>
            <div class="manga-title">Duchess in Ruins</div>
          </div>
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
