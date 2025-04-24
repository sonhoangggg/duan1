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

    <!-- Favicon -->
   
    <style>
        .header-default{
            margin-bottom: 0 !important;
        }
        .alert-success {
            color: red;
        }
        .alert-error {
            color: green;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
    <script>
        function validateForm(event) {
            let email = document.getElementById("property3").value;
            let emailError = document.getElementById("email-error");
            emailError.textContent = "";

            if (email.trim() === "") {
                event.preventDefault();
                emailError.textContent = "Email không được để trống";
                return;
            }

            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                event.preventDefault();
                emailError.textContent = "Email không hợp lệ";
            }

            let currentPassword = document.getElementById("property7").value;
            let newPassword = document.getElementById("property8").value;
            let confirmPassword = document.getElementById("property9").value;
            let passwordError = document.getElementById("password-error");
            passwordError.textContent = "";

            if (newPassword !== confirmPassword) {
                event.preventDefault();
                passwordError.textContent = "Mật khẩu mới và xác nhận mật khẩu không khớp";
                return;
            }

            if (currentPassword === "") {
                event.preventDefault();
                passwordError.textContent = "Vui lòng nhập mật khẩu hiện tại";
                return;
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
                <div class="heading text-center">Chi tiết Tài khoản</div>
            </div>
        </div>

        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <?php include 'app/Views/Users/layouts/my-account-sidebar.php' ?> 
                    <div class="col-lg-9">
                        <div class="my-account-content account-edit">
                            <div class="">
                                <?php
                                if(isset($_SESSION['message'])){
                                    $messageType = $_SESSION['message_type'] ?? 'error';
                                    echo "<p class='alert-" . $messageType . "'>" . $_SESSION['message'] . "</p>";
                                    unset($_SESSION['message']);
                                    unset($_SESSION['message_type']);
                                }
                                ?>
                                <form class="" id="form-password-change" action="?act=account-update" enctype="multipart/form-data" method="post" onsubmit="validateForm(event)">
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property2" name="name" value="<?= $user->name ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property2">Họ và Tên</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="email" id="property3" name="email" value="<?= $user->email ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property3">Email</label>
                                        <div id="email-error" class="error-message"></div>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property4" name="address" value="<?= $user->address ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property4">Địa chỉ</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property5" name="phone" value="<?= $user->phone ?>">
                                        <label class="tf-field-label fw-4 text_black-2" for="property5">Số điện thoại</label>
                                    </div>
                                    <div class="tf-field style-1 mb_15">
                                        <img src="<?= $user->image ?>" alt="" width="100px"> <br>
                                        <input class="tf-field-input tf-input" type="file" id="property6" name="image" accept="image/*">
                                        <label class="tf-field-label fw-4 text_black-2" for="property6"></label>
                                    </div>
                                    <h6 class="mb_20">Thay đổi mật khẩu</h6>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property7" name="current-password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property7">Mật khẩu hiện tại</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property8" name="new-password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property8">Mật khẩu mới</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property9" name="confirm-password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property9">Xác nhận mật khẩu</label>
                                        <div id="password-error" class="error-message"></div>
                                    </div>
                                    <div class="mb_20">
                                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Lưu thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
