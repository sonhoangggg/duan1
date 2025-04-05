<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8">
    <title>Vongtey - Đăng nhập</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css"/>

    <!-- Favicon -->
   
    
    <style>
        .header-default {
            margin-bottom: 0 !important;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .success-message {
            color: green;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body class="preload-wrapper popup-loader">

    <!-- Màn hình tải -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">
        <!-- Header -->
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->

        <div class="tf-page-title style-2">
            <div class="container-full">
                <div class="heading text-center">Đăng nhập</div>
            </div>
        </div>

        <section class="flat-spacing-10">
            <div class="container">
                <div class="tf-grid-layout lg-col-2 tf-login-wrap">
                    <div class="tf-login-form">
                        <div id="login">
                            <h5 class="mb_36">Đăng nhập</h5>

                            <!-- Hiển thị thông báo -->
                            <?php                         
                                if(isset($_SESSION['error'])){
                                    echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
                                    unset($_SESSION['error']);
                                }
                                
                                if(isset($_SESSION['message'])){
                                    echo "<p class='success-message'>" . $_SESSION['message'] . "</p>";
                                    unset($_SESSION['message']);
                                }
                            ?>

                            <div>
                                <form id="login-form" action="?act=post-login" method="post" onsubmit="return validateForm()">
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" type="email" id="email" name="email" placeholder="">
                                        <label class="tf-field-label fw-4 text_black-2" for="email">Email *</label>
                                        <p id="email-error" class="error-message"></p>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" type="password" id="password" name="password" placeholder="">
                                        <label class="tf-field-label fw-4 text_black-2" for="password">Mật khẩu *</label>
                                        <p id="password-error" class="error-message"></p>
                                    </div>
                                    <div class="mb_20">
                                        <a href="#recover" class="tf-btn btn-line">Quên mật khẩu?</a>
                                    </div>
                                    <div>
                                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tf-login-content">
                        <h5 class="mb_36">Tôi là người mới</h5>
                        <p class="mb_20">Đăng ký để nhận quyền truy cập sớm vào các đợt giảm giá, cũng như cập nhật các xu hướng và khuyến mãi mới.</p>
                        <a href="?act=register" class="tf-btn btn-line">Đăng ký<i class="icon icon-arrow1-top-left"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include 'app/Views/Users/layouts/footer.php' ?>
        <!-- /Footer -->
    </div>

    <!-- Javascript -->
    <script type="text/javascript">
        function validateForm() {
            let isValid = true;
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let emailError = document.getElementById("email-error");
            let passwordError = document.getElementById("password-error");

            // Xóa thông báo cũ
            emailError.textContent = "";
            passwordError.textContent = "";

            if (!email) {
                emailError.textContent = "Vui lòng nhập email";
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailError.textContent = "Email không hợp lệ";
                isValid = false;
            }

            if (!password) {
                passwordError.textContent = "Vui lòng nhập mật khẩu";
                isValid = false;
            }

            return isValid;
        }
    </script>

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
