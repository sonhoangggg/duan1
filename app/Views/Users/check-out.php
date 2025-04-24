<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Vongtey - Thanh toán</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css" />

    <!-- Favicon and Touch Icons  -->
    
    <style>
        .header-default {
            margin-bottom: 0 !important;
        }
    </style>
</head>

<body class="preload-wrapper popup-loader">
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- Header -->
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->
        <div class="tf-page-title style-2">
            <div class="container-full">
                <div class="heading text-center">Thanh Toán</div>
            </div>
        </div>

        <?php
        $total = 0;
        foreach ($products as $key => $value) {
            if ($value->price_sale != null) {
                $total = $total + (intval($value->price_sale)) * (intval($value->quantity));
            } else {
                $total = $total + (intval($value->price)) * (intval($value->quantity));
            }
        }
        ?>
        <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị 
            ?>
        <?php endif; ?>
        <section class="flat-spacing-11">
            <div class="container">
                <div class="tf-page-cart-wrap layout-2">
                    <div class="tf-page-cart-item">
                        <h5 class="fw-5 mb_20">Chi tiết thanh toán</h5>
                        <form action="?act=submit-check-out" class="form-checkout" method="post">
                            <input type="hidden" value="<?= $total ?>" name="total">
                            <div class="box grid-2">
                                <fieldset class="fieldset">
                                    <label for="first-name">Tên</label>
                                    <input type="text" id="first-name" placeholder="Name" name="name" value="<?= $currentUser->name ?>">
                                </fieldset>
                            </div>
                            <fieldset class="box fieldset">
                                <label for="address">Địa Chỉ</label>
                                <input type="text" id="address" value="<?= $currentUser->address ?>" name="address">
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="phone">Số điện thoại</label>
                                <input type="number" id="phone" value="<?= $currentUser->phone ?>" name="phone">
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="email">Email</label>
                                <input type="email" id="email" value="<?= $currentUser->email ?>" name="email">
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="note">Ghi chú</label>
                                <textarea name="note" id="note"></textarea>
                            </fieldset>
                        </form>
                    </div>
                    <div class="tf-page-cart-footer">
                        <div class="tf-cart-footer-inner">
                            <h5 class="fw-5 mb_20">Đơn hàng của bạn</h5>
                            <div class="tf-page-cart-checkout widget-wrap-checkout">
                                <ul class="wrap-checkout-product">

                                    <?php foreach ($products as $key => $value): ?>
                                        <li class="checkout-product-item">
                                            <figure class="img-product">
                                                <img src="<?= $value->image_main ?>" alt="product">
                                                <span class="quantity"><?= $value->quantity ?></span>
                                            </figure>
                                            <div class="content">
                                                <div class="info">
                                                    <p class="name"><?= $value->name ?></p>
                                                </div>
                                                <span class="price">
                                                    <?php
                                                    if ($value->price_sale != null) {
                                                        echo number_format($value->price_sale) . " vnd";
                                                    } else {
                                                        echo number_format($value->price) . " vnd";
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="d-flex justify-content-between line pb_20">
                                    <h6 class="fw-5">Tổng</h6>
                                    <h6 class="total fw-5">
                                        <?= number_format($total) . " vnd" ?>
                                    </h6>
                                </div>
                                <div class="wd-check-payment">
                                   
                                    <div class="fieldset-radio mb_20">
                                        <input type="radio" name="payment" id="delivery" class="tf-check">
                                        <label for="delivery">Thanh toán khi nhận hàng</label>
                                    </div>
                                    <input type="checkbox" id="check-agree" class="tf-check">
                                    <label for="check-agree" class="text_black-2">Tôi đã đọc kỹ các <a href="#" class="text-decoration-underline">điều khoản và điều kiện</a>.</label>
                                </div>
                            </div>
                            <button id="btn-check-out"
                                class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center">Thanh toán</button>
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

    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /gotop -->


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

    <script>
        $("#btn-check-out").click(function() {
            if ($("#check-agree").is(":checked")) {
                $(".form-checkout").submit()
            } else {
                alert("Vui lòng chọn điều khoản!");
            }
        })
    </script>
</body>

</html>