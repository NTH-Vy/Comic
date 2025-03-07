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

      .manga-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 20px;
        padding: 100px;
        margin-top: 20px;
      }

      .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
      }

      .manga-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
      }

      .manga-card:hover {
        transform: translateY(-5px);
      }

      .manga-card img {
        width: 100%;
        height: 280px;
        object-fit: cover;
      }

      .manga-info {
        padding: 15px;
      }

      .manga-info h3 {
        margin: 0;
        font-size: 16px;
        color: #333;
      }

      .manga-info .genre {
        display: inline-block;
        padding: 2px 8px;
        background-color: #e9ecef;
        border-radius: 12px;
        font-size: 12px;
        color: #495057;
        margin-bottom: 5px;
      }

      .filter-section {
        background: white;
        padding: 15px;
        margin: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        position: fixed;
        right: 20px;
        top: 100px;
        width: 250px;
        max-height: 80vh;
        overflow-y: auto;
        z-index: 100;
      }

      .genre-filters {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        margin-bottom: 15px;
      }

      .genre-btn {
        padding: 6px 12px;
        border: 1px solid #eee;
        border-radius: 15px;
        background: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 12px;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .genre-btn:hover {
        background: #e9ecef;
      }

      .genre-btn.active {
        background: #6c5ce7;
        color: white;
        border-color: #6c5ce7;
      }

      .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
      }

      .pagination button {
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        background: #6c5ce7;
        color: white;
        cursor: pointer;
      }

      .pagination button:disabled {
        background: #ccc;
        cursor: not-allowed;
      }

      /* Responsive */
      @media (max-width: 768px) {
        .filter-section {
            position: static;
            width: auto;
            margin: 20px;
        }

        .manga-grid {
            margin-right: 20px;
        }

        .genre-filters {
            grid-template-columns: repeat(3, 1fr);
        }
      }
    </style>
  </head>
  <body>

    <!-- Hiển thị grid truyện -->
    <div class="manga-grid">
        <?php if(!empty($comics)): ?>
            <?php foreach($comics as $comic): ?>
                <div class="manga-card">
                    <a href="index.php?act=detailmanga&id=<?= $comic['comic_id'] ?>">
                        <img src="app/upload/<?= htmlspecialchars($comic['cover_image']) ?>" 
                             alt="<?= htmlspecialchars($comic['title']) ?>">
                        <div class="manga-info">
                            <h3><?= htmlspecialchars($comic['title']) ?></h3>
                            <div class="genre"><?= htmlspecialchars($comic['categories'] ?? 'Chưa phân loại') ?></div>
                            <p class="view-count">Lượt xem: <?= number_format($comic['views'] ?? 0) ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có truyện nào.</p>
        <?php endif; ?>
    </div>

    <!-- Phân trang -->
    <div class="pagination">
        <?php if($currentPage > 1): ?>
            <button onclick="changePage(<?= $currentPage - 1 ?>)">Trang trước</button>
        <?php endif; ?>
        
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <button <?= $i === $currentPage ? 'class="active"' : '' ?> 
                    onclick="changePage(<?= $i ?>)">
                <?= $i ?>
            </button>
        <?php endfor; ?>
        
        <?php if($currentPage < $totalPages): ?>
            <button onclick="changePage(<?= $currentPage + 1 ?>)">Trang sau</button>
        <?php endif; ?>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const genreButtons = document.querySelectorAll('.genre-btn');
        const mangaCards = document.querySelectorAll('.manga-card');
        
        // Tìm kiếm
        searchInput.addEventListener('input', filterMangas);
        
        // Lọc theo thể loại
        genreButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
                filterMangas();
            });
        });
        
        function filterMangas() {
            const searchTerm = searchInput.value.toLowerCase();
            const activeGenres = Array.from(document.querySelectorAll('.genre-btn.active'))
                                    .map(btn => btn.dataset.genre);
            
            mangaCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const categories = card.dataset.categories.split(',');
                
                const matchesSearch = title.includes(searchTerm);
                const matchesGenres = activeGenres.length === 0 || 
                                    activeGenres.some(genre => categories.includes(genre));
                
                card.style.display = matchesSearch && matchesGenres ? 'block' : 'none';
            });
        }
    });

    function changePage(page) {
        window.location.href = `index.php?act=fullmanga&page=${page}`;
    }
    </script>
</body>
</html>
    