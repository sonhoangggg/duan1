<!DOCTYPE html>
<html xmlns="assets/Admin/images/logo_bestbalo.png" xml:lang="vi-VN" lang="vi-VN">
<head>
    <meta charset="utf-8">
    <title>Vongtey - Website bán vòng tay hàng đầu VN</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">
    <link rel="stylesheet" href="assets/Admin/icon/style.css">
    <link rel="shortcut icon" href="assets/Admin/images/logo_bestbalo.png">
    <link rel="apple-touch-icon-precomposed" href="assets/Admin/images/logo_bestbalo.png">
</head>
<style>
        .container {
            width: 100%;
        }

        .table-title, .wg-product {
            display: grid;
            grid-template-columns: 5% 30% 15% 10% 15% 15%;
            align-items: center;
            text-align: center;
            padding: 10px 0;
        }

        .table-title {
            font-weight: bold;
            border-bottom: 2px solid #ccc;
        }

        .wg-product {
            border-bottom: 1px solid #ddd;
        }

        .wg-product img {
            width: 50px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>

<body>
    <div id="wrapper">
        <div id="page">
            <div class="layout-wrap">
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <?php include 'app/Views/Admin/layouts/sidebar.php' ?>
                <div class="section-content-right">
                    <?php include 'app/Views/Admin/layouts/header.php' ?>
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap"> 
                            <div class="wg-box">
                                    <div class="title-box">Danh sách đơn hàng</div>     
                                    <div class="container">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li>STT</li>
                                            <li>Tên sản phẩm</li>
                                            <li>Hình ảnh</li>
                                            <li>Số lượng</li>
                                            <li>Giá</li>
                                            <li>Tổng cộng</li>
                                        </ul>
                                        <ul class="flex flex-column">
                                            <?php foreach($order_detail as $key => $value): ?>
                                                <li class="wg-product item-row flex gap20">
                                                    <div class="body-text"><?= $key + 1 ?></div>
                                                    <div class="body-text"><?= $value->name ?></div>
                                                    <div class="body-text">
                                                        <img src="<?= $value->image_main ?>" alt="" width="50">
                                                    </div>
                                                    <div class="body-text"><?= $value->quantity ?></div>
                                                    <div class="body-text"><?= number_format($value->price) ?> VND</div>
                                                    <div class="body-text"><?= number_format($value->total) ?> VND</div>
                                                </li>
                                            <?php endforeach; ?>
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
</body>
</html>
