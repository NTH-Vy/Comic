<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý truyện tranh</title>
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .users-table th:last-child,
        .users-table td:last-child {
            width: 120px !important; /* Đặt chiều rộng cố định cho cột thao tác */
            white-space: nowrap;
            overflow: visible;
            padding: 12px 15px;
        }

        /* Điều chỉnh style cho các nút */
        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
            min-width: max-content; /* Đảm bảo không bị co lại */
        }

        .edit-btn, .delete-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px;
            border-radius: 6px;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            min-width: 35px;
            height: 35px;
        }

        .edit-btn {
            background: var(--primary);
        }

        .delete-btn {
            background: #dc3545;
        }

        .edit-btn:hover, .delete-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(67, 97, 238, 0.2);
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }

        .page-link {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
        }

        .page-link:hover {
            background-color: #f5f5f5;
        }

        .page-link.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <div class="header-title">
                <h1><i class="fas fa-book"></i> Quản lý truyện</h1>
            </div>
            <div class="search-box">
                <form action="index.php" method="GET">
                    <input type="hidden" name="act" value="list_comics">
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="keyword" 
                               placeholder="Tìm kiếm theo tiêu đề..." 
                               value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                        <button type="submit" name="timkiem">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="content">
            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th class="id-column">ID</th>
                            <th class="title-column">TIÊU ĐỀ</th>
                            <th class="desc-column">TÓM TẮT</th>
                            <th class="cover-column">ẢNH BÌA</th>
                            <th class="author-column">TÁC GIẢ</th>
                            <th class="status-column">TRẠNG THÁI</th>
                            <th class="views-column">LƯỢT XEM</th>
                            <th class="actions-column">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listcomics as $comic): ?>
                            <?php
                            extract($comic);
                            $suasp = "index.php?act=sua_comics&id=" . $comic_id;
                            $xoasp = "index.php?act=xoa_comics&id=" . $comic_id;
                            $hinhpath = "../upload/" . $cover_image;
                            $cover_image = is_file($hinhpath) ? "<img src='" . $hinhpath . "' class='cover-image'>" : "<div class='no-photo'>No Photo</div>";
                            ?>
                            <tr>
                                <td class="id-cell">#<?= $comic_id ?></td>
                                <td class="title-cell">
                                    <div class="manga-title-wrap">
                                        <?= $title ?>
                                    </div>
                                </td>
                                <td class="description-cell">
                                    <div class="description-wrap" title="<?= $description ?>">
                                        <?= mb_strimwidth($description, 0, 100, "...") ?>
                                    </div>
                                </td>
                                <td class="cover-cell"><?= $cover_image ?></td>
                                <td class="author-cell"><?= $author_name ?></td>
                                <td class="status-cell">
                                    <span class="status-badge <?= strtolower($status) ?>">
                                        <?= $status ?>
                                    </span>
                                </td>
                                <td class="views-cell">
                                    <div class="views-count">
                                        <i class="fas fa-eye"></i>
                                        <?= number_format($views) ?>
                                    </div>
                                </td>
                                <td class="actions-cell">
                                    <div class="action-buttons">
                                        <a href="<?= $suasp ?>" class="edit-btn" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="index.php?act=list_chapters&comic_id=<?= $comic_id ?>" class="edit-btn" style="background: #28a745;" title="Quản lý chapter">
                                            <i class="fas fa-list"></i>
                                        </a>
                                        <a href="<?= $xoasp ?>" class="delete-btn" 
                                           onclick="return confirm('Bạn có chắc muốn xóa truyện này?')"
                                           title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row mb10" style="margin-top: 20px;">
                <a href="index.php?act=add_comics" class="save-btn">THÊM MỚI</a>
            </div>

            <!-- Thêm phần phân trang -->
            <div class="pagination">
                <?php if(isset($total_pages) && $total_pages > 1): ?>
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="index.php?act=list_comics&page=<?= $i ?>&keyword=<?= htmlspecialchars($keyword ?? '') ?>" 
                           class="page-link <?= ($current_page == $i) ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
