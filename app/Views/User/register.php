<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8">
    <title>Vongtey - Đăng ký</title>
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
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
    <script>
        function validateForm(event) {
            event.preventDefault();
            let isValid = true;

            let name = document.getElementById("property2");
            let email = document.getElementById("property3");
            let password = document.getElementById("property4");
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            document.querySelectorAll(".error-message").forEach(el => el.textContent = "");

            if (name.value.trim() === "") {
                document.getElementById("error-name").textContent = "Họ và Tên không được để trống.";
                isValid = false;
            }
            if (!emailPattern.test(email.value.trim())) {
                document.getElementById("error-email").textContent = "Email không được để trống.";
                isValid = false;
            }
            if (password.value.length < 6) {
                document.getElementById("error-password").textContent = "Mật khẩu phải có ít nhất 6 ký tự.";
                isValid = false;
            }
            if (isValid) {
                document.getElementById("register-form").submit();
            }
        }
    </script>
</head>
<body class="preload-wrapper popup-loader">
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <div id="wrapper">
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <div class="tf-page-title style-2">
            <div class="container-full">
                <div class="heading text-center">Đăng ký</div>
            </div>
        </div>
        <section class="flat-spacing-10">
            <div class="container">
                <div class="form-register-wrap">
                    <div class="flat-title align-items-start gap-0 mb_30 px-0">
                        <h5 class="mb_18">Đăng ký</h5>
                        <p class="text_black-2">Đăng ký ngay để nhận quyền truy cập sớm vào các đợt giảm giá, cập nhật sản phẩm mới và các chương trình khuyến mãi.</p>
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
                    </div>
                    <div>
                        <form id="register-form" action="?act=post-register" method="post" onsubmit="validateForm(event)">
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " type="text" id="property2" name="name">
                                <label class="tf-field-label fw-4 text_black-2" for="property2">Họ và Tên</label>
                                <span class="error-message text-danger" id="error-name"></span>
                            </div>
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " type="email" id="property3" name="email">
                                <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                                <span class="error-message text-danger" id="error-email"></span>
                            </div>
                            <div class="tf-field style-1 mb_30">
                                <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="password">
                                <label class="tf-field-label fw-4 text_black-2" for="property4">Mật khẩu *</label>
                                <span class="error-message text-danger" id="error-password"></span>
                            </div>
                            <div class="mb_20">
                                <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Đăng ký</button>
                            </div>
                            <div class="text-center">
                                <a href="?act=login" class="tf-btn btn-line">Bạn đã có tài khoản? Đăng nhập ngay<i class="icon icon-arrow1-top-left"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'app/Views/Users/layouts/footer.php' ?>
    </div>
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
