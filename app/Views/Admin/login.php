<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">



    <!-- Font -->
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="assets/Admin/icon/style.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/Admin/images/logo_bestbalo.png">
    <link rel="apple-touch-icon-precomposed" href="assets/Admin/images/logo_bestbalo.png">

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="login-page">
                <div class="left">
                    <div class="login-box">
                        <div>
                            <h3>ĐĂNG NHẬP</h3>
                        </div>
                        <div class="error">
                            <?php 
                                if(isset($_SESSION['error'])){
                                    echo "<p>" . $_SESSION['error'] . "</p>";
                                    unset($_SESSION['error']);
                                }
                            ?>
                        </div>
                        <form class="form-login flex flex-column gap22 w-full" action="?role=admin&act=post-login" method="post">
                            <fieldset class="email">
                                <div class="body-title mb-10 text-white">Nhập địa chỉ email</div>
                                <input class="flex-grow" type="email" placeholder="Nhập địa chỉ email tại đây..." name="email" tabindex="0" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10 text-white">Nhâp mật khẩu</div>
                                <input class="password-input" type="password" placeholder="Nhập mật khẩu..." name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <button type="submit" class="tf-button w-full">Đăng nhập</button>
                        </form>
                        <div class="bottom body-text text-center text-center text-white w-full">
                            Bạn chưa có tài khoản?
                            <a href="#" class="body-text tf-color">Đăng ký</a>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <img src="assets/Admin/images/preview_PKTT_1200x1200 (1).png" alt="">
                </div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="assets/Admin/js/jquery.min.js"></script>
    <script src="assets/Admin/js/bootstrap.min.js"></script>
    <script src="assets/Admin/js/bootstrap-select.min.js"></script>
    <script defer src="assets/Admin/js/main.js"></script>

</body>
</html>