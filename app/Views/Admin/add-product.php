<!DOCTYPE html>
<head>
    
    <meta charset="utf-8">
    <title>Vongtey - Website bán vòng tay  hàng đầu VN</title>
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
                                        echo "<p class='error-message'>" . $_SESSION['message'] . "</p>";
                                        unset($_SESSION['message']);
                                    }
                                                                            if(isset($_SESSION['error'])){
                                            echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
                                            unset($_SESSION['error']);
                                        }
                                    ?>
                                    <div class="title-box">
                                        Thêm mới sản phẩm
                                    </div>
                                    <form action="?role=admin&act=add-post-product" method="post" enctype="multipart/form-data">
                                        <div class="mb-5">
                                            <label for="name">Tên sản phẩm</label>
                                            <input type="text" id="name" placeholder="Nhập tên sản phẩm..." name="name" class="form-control">
                                        </div>

                                        <div class="mb-5">
                                            <label for="category">Danh mục</label>
                                            <select name="category" id="category">
                                                <?php foreach($listCategory as $key => $value): ?>
                                                    <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="mb-5">
                                            <label for="price">Giá</label>
                                            <input type="text" id="price" placeholder="Giá sản phẩm..." name="price" class="form-control">
                                        </div>

                                        <div class="mb-5">
                                            <label for="price-sale">Giá khuyến mãi</label>
                                            <input type="text" id="price-sale" placeholder="Giá khuyến mãi..." name="pricesale" class="form-control">
                                        </div>

                                        <div class="mb-5">
                                            <label for="stock">Số lượng</label>
                                            <input type="text" id="stock" placeholder="Số lượng" name="stock" class="form-control">
                                        </div>

                                        <div class="mb-5">
                                            <label for="image_main">Ảnh chính</label>
                                            <input type="file" id="image_main" placeholder="Ảnh chính" name="image_main" class="form-control" accept="image/*">
                                        </div>

                                        <div class="mb-5">
                                            <label for="description">Mô tả sản phẩm</label>
                                            <textarea id="description" placeholder="Nhập mô tả..." name="description" class="form-control"></textarea>
                                        </div>

                                        <div class="mb-5">
                                            <h4>Ảnh phụ khác</h4>
                                            <button class="btn-sm btn btn-primary" id="btnAddImage">Thêm ảnh</button>
                                            <div class="block-image">
                                                
                                            </div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-success">Thêm mới</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /main-content-wrap -->
                        </div>
                        <!-- /main-content-wrap -->
                        <!-- bottom-page -->
                        <?php include 'app/Views/Admin/layouts/footer.php' ?>
                        <!-- /bottom-page -->
                    </div>
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="assets/Admin/js/jquery.min.js"></script>
    <script src="assets/Admin/js/bootstrap.min.js"></script>
    <script src="assets/Admin/js/bootstrap-select.min.js"></script>
    <script src="assets/Admin/js/zoom.js"></script>
    <script src="assets/Admin/js/morris.min.js"></script>
    <script src="assets/Admin/js/raphael.min.js"></script>
    <script src="assets/Admin/js/morris.js"></script>
    <script src="assets/Admin/js/jvectormap.min.js"></script>
    <script src="assets/Admin/js/jvectormap-us-lcc.js"></script>
    <script src="assets/Admin/js/jvectormap-data.js"></script>
    <script src="assets/Admin/js/jvectormap.js"></script>
    <script src="assets/Admin/js/apexcharts/apexcharts.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-1.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-2.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-3.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-4.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-5.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-6.js"></script>
    <script src="assets/Admin/js/apexcharts/line-chart-7.js"></script>
    <script src="assets/Admin/js/switcher.js"></script>
    <script defer src="assets/Admin/js/theme-settings.js"></script>
    <script src="assets/Admin/js/main.js"></script>

    <script>
        $(".block_image").empty();
        $("#btnAddImage").click(function(e) {
            e.preventDefault();
            let UI = `
                <div class="mt-4 mb-4">
                    <span>Hình ảnh</span>
                    <div class="d-flex">
                        <input type="file" class="form-control" name="image[]" accept="image/*">
                        <button class="btn-sm btn btn-danger btn-delete">Xóa</button>
                    </div>
                </div>
                `;
            $(".block-image").append(UI)
        })

        $(".block-image").on('click', '.btn-delete', function() {
            $(this).parent().parent().remove()
        })
    </script>
</body>



</html>