<!DOCTYPE html>
<head>
    
    <meta charset="utf-8">
    <title>Vongtey - Website bán vòng tay hàng đầu VN</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">



    <!-- Font -->
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="assets/Admin/icon/style.css">


</head>

<body>
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">
                <!-- Sidebar -->
                <?php include 'app/Views/Admin/layouts/sidebar.php'; ?>

                <!-- Main content -->
                <div class="section-content-right">
                    <?php include 'app/Views/Admin/layouts/header.php'; ?>

                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap"> 
                                <div class="wg-box">
                                    <div class="title-box">
                                        Chi tiết Sản phẩm
                                    </div>
                                    <form action="#">
                                        <!-- Tên sản phẩm -->
                                        <div class="mb-5">
                                            <label for="name">Tên sản phẩm</label>
                                            <input type="text" id="name" name="name" class="form-control" 
                                                value="<?= $product->name ?>" readonly>
                                        </div>

                                        <!-- Giá sản phẩm -->
                                        <div class="mb-5">
                                            <label for="price">Giá</label>
                                            <input type="text" id="price" name="price" class="form-control" 
                                                value="<?= $product->price ?> VND" readonly>
                                        </div>

                                        <!-- Tồn kho -->
                                        <div class="mb-5">
                                            <label for="stock">Số lượng tồn kho</label>
                                            <input type="text" id="stock" name="stock" class="form-control" 
                                                value="<?= $product->stock ?>" readonly>
                                        </div>

                                        <!-- Danh mục -->
                                        <div class="mb-5">
                                            <label for="category">Danh mục</label>
                                            <input type="text" id="category" name="category" class="form-control" 
                                                value="<?= $category->category_name ?>" readonly>
                                        </div>

                                        <!-- Mô tả -->
                                        <div class="mb-5">
                                            <label for="description">Mô tả</label>
                                            <textarea id="description" name="description" class="form-control" readonly><?= $product->description ?></textarea>
                                        </div>

                                        <!-- Ảnh chính -->
                                        <div class="mb-5">
                                            <label for="image_main">Ảnh chính</label>
                                            <?php if (!empty($product->image_main)): ?>
                                                <img src="<?= $product->image_main ?>" alt="Ảnh chính" width="200">
                                            <?php else: ?>
                                                <p>Không có ảnh chính</p>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Ảnh phụ -->
                                        <div class="mb-5">
                                            <label>Ảnh phụ</label>
                                            <div>
                                                <?php if (!empty($listProductImage)): ?>
                                                    <?php foreach ($listProductImage as $image): ?>
                                                        <img src="<?= $image->image ?>" alt="Ảnh phụ" width="100" style="margin-right: 10px;">
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <p>Không có ảnh phụ</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Nút quay lại -->
                                        <div class="mb-5">
                                            <a href="?role=admin&act=all-product" class="btn btn-primary">Quay lại</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include 'app/Views/Admin/layouts/footer.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="assets/Admin/js/jquery.min.js"></script>
    <script src="assets/Admin/js/bootstrap.min.js"></script>
    <script src="assets/Admin/js/main.js"></script>
</body>
</html>
