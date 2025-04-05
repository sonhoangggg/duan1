<!DOCTYPE html>
<head>
    
    <meta charset="utf-8">
    <title>Vongtey - Website bán vòng tay hàng đầu VN</title>    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">

    <style>
        .thongbao {
            color: rgb(22, 88, 10);
            font-style: italic;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            font-weight: 500;
            margin: 10px 0;
            padding: 5px;
            border-left: 3px solid rgb(43, 138, 5);
            background-color:rgb(208, 254, 177);
            letter-spacing: 2px;
            font-size: 15px;
        }
    </style>


    <!-- Font -->
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="assets/Admin/icon/style.css">

    

</head>

<body>
    <div id="wrapper">
        <div id="page">
            <div class="layout-wrap">
                <div id="preload" class="preload-container">
                    <div class="preloading"><span></span></div>
                </div>

                <!-- Sidebar -->
                <?php include 'app/Views/Admin/layouts/sidebar.php' ?>

                <!-- Content -->
                <div class="section-content-right">
                    <?php include 'app/Views/Admin/layouts/header.php' ?>
                    
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="wg-box">
                                    <?php 
                                    if (isset($_SESSION['message'])) {
                                        echo "<p class='thongbao'>" . $_SESSION['message'] . "</p>";
                                        unset($_SESSION['message']);
                                    }
                                    ?>
                                    <div class="title-box">
                                        Danh sách sản phẩm
                                    </div>

                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <div class="show">
                                                <div class="text-tiny">Hiển thị</div>
                                                <div class="select">
                                                    <select>
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny">dòng</div>
                                            </div>
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Tìm kiếm..." name="name" required>
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="?role=admin&act=add-product">
                                            <i class="icon-plus"></i>Thêm sản phẩm
                                        </a>
                                    </div>

                                    <div class="wg-table table-product-list">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li><div class="body-title">STT</div></li>
                                            <li><div class="body-title">Tên sản phẩm</div></li>
                                            <li><div class="body-title">Hình ảnh</div></li>
                                            <li><div class="body-title">Danh mục</div></li>
                                            <li><div class="body-title">Giá</div></li>
                                            <li><div class="body-title">Số lượng</div></li>
                                            <li><div class="body-title">Thao tác</div></li>
                                        </ul>

                                        <ul class="flex flex-column">
                                            <?php foreach ($listProduct as $index => $product): ?>
                                                <li class="wg-product item-row">
                                                    <div class="body-text"><?= $index + 1 ?></div>
                                                    <div class="body-text"><?= htmlspecialchars($product->name) ?></div>
                                                    <div class="body-text">
                                                        <img src="<?= htmlspecialchars($product->image_main) ?>" alt="Hình ảnh" width="50">
                                                    </div>
                                                    <div class="body-text"><?= htmlspecialchars($product->categoryName) ?></div>
                                                    <div class="body-text">
                                                        <?= number_format($product->price ?? 0) ?> VND
                                                        <?php if (!empty($product->price_sale)): ?>
                                                            -<?= number_format($product->price_sale) ?> VND
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="body-text"><?= $product->stock ?></div>
                                                    <div class="list-icon-function">
                                                        <div class="item eye">
                                                            <a href="?role=admin&act=show-product&id=<?= $product->id ?>">
                                                                <i class="icon-eye"></i>
                                                            </a>
                                                        </div>
                                                        <div class="item edit">
                                                            <a href="?role=admin&act=update-product&id=<?= $product->id ?>">
                                                                <i class="icon-edit-3"></i>
                                                            </a>
                                                        </div>
                                                        <div class="item trash">
                                                            <a class="delete-product" href="?role=admin&act=delete-product&id=<?= $product->id ?>">
                                                                <i class="icon-trash-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <ul class="wg-pagination">
                                            <li><a href="#"><i class="icon-chevron-left"></i></a></li>
                                            <li><a href="#">1</a></li>
                                            <li class="active"><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#"><i class="icon-chevron-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'app/Views/Admin/layouts/footer.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/Admin/js/jquery.min.js"></script>
    <script src="assets/Admin/js/bootstrap.min.js"></script>
    <script src="assets/Admin/js/main.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-product").forEach(function (element) {
        element.addEventListener("click", function (event) {
            event.preventDefault(); 
            let confirmDelete = confirm("Bạn có chắc chắn muốn xóa danh mục này không?");
            if (confirmDelete) {
                window.location.href = this.getAttribute("href");
            } else {
                location.reload();
            }
        });
    });
});
</script>
</body>

</html>
