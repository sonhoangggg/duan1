<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8">
    <title>Vongtey - Tài khoản</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css"/>

   
    
    <style>
        .header-default{
            margin-bottom: 0 !important;
        }
    </style>
</head>

<body class="preload-wrapper popup-loader">
    <!-- Hiệu ứng tải trang -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /Hiệu ứng tải trang -->
    <div id="wrapper">
        <!-- Header -->
            <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->
            <div class="tf-page-title style-2">
                <div class="container-full">
                    <div class="heading text-center">Tài khoản của tôi</div>
                </div>
            </div>

            <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <?php include 'app/Views/Users/layouts/my-account-sidebar.php' ?> 
                    <div class="col-lg-9">
                        <div class="my-account-content account-dashboard">
                            <div class="mb_60">
                                <h5 class="fw-5 mb_20">Xin chào bạn!</h5>
                                <p>
                                    Từ bảng điều khiển tài khoản của bạn, bạn có thể xem <a class="text_primary" href="my-account-orders.html">đơn hàng gần đây</a>, quản lý <a class="text_primary" href="my-account-address.html">địa chỉ giao hàng và thanh toán</a>, và <a class="text_primary" href="my-account-edit.html">chỉnh sửa mật khẩu và thông tin tài khoản</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
            <?php include 'app/Views/Users/layouts/footer.php' ?>
        <!-- /Footer -->
        
    </div>

    <!-- Nút cuộn lên đầu trang -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /Nút cuộn lên đầu trang -->

    <!-- Javascript -->
    <script type="text/javascript" src="assets/Users/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/carousel.js"></script>
    <script type="text/javascript" src="assets/Users/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/lazysize.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/count-down.js"></script>
    <script type="text/javascript" src="assets/Users/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/multiple-modal.js"></script>
    <script type="text/javascript" src="assets/Users/js/main.js"></script>
</body>
</html>
