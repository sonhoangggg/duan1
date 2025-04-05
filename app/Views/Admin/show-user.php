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

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets\Admin\images\logo_bestbalo.png">
    <link rel="apple-touch-icon-precomposed" href="assets\Admin\images\logo_bestbalo.png">


</head>

<body>

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- tải trước -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /tải trước -->
                <!-- menu bên trái -->
                <?php include 'app/Views/Admin/layouts/sidebar.php' ?>
                <!-- /menu bên trái -->
                <!-- nội dung bên phải -->
                <div class="section-content-right">
                    <!-- tiêu đề trang quản trị -->
                    <?php include 'app/Views/Admin/layouts/header.php' ?>
                    <!-- /tiêu đề trang quản trị -->
                    <!-- nội dung chính -->
                    <div class="main-content">
                        <!-- khung nội dung chính -->
                        <div class="main-content-inner">
                            <!-- khung nội dung chính -->
                            <div class="main-content-wrap"> 
                                <div class="wg-box">
                                    <div class="title-box">
                                        Chi tiết người dùng
                                    </div>
                                    <form action="#">
                                        <div class="mb-5">
                                            <label for="name">Tên</label>
                                            <input type="text" id="name" placeholder="Tên" name="name" class="form-control" 
                                            value="<?= $user->name ?>" readonly>
                                        </div>

                                        <div class="mb-5">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" placeholder="Email" name="email" class="form-control"
                                            value="<?= $user->email ?>" readonly>
                                        </div>

                                        <div class="mb-5">
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" id="address" placeholder="Địa chỉ" name="address" class="form-control"
                                            value="<?= $user->address ?>" readonly>
                                        </div>

                                        <div class="mb-5">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="text" id="phone" placeholder="Số điện thoại" name="phone" class="form-control"
                                            value="<?= $user->phone ?>" readonly>
                                        </div>

                                        <div class="mb-5">
                                            <label for="image">Ảnh đại diện</label>
                                            <img src="<?= $user->image ?>" alt="" width="50">
                                        </div>

                                        <div class="mb-5">
                                            <label for="role">Vai trò</label>
                                            <select id="role" name="role" class="form-control" readonly>
                                                <option value="" hidden>Chọn vai trò</option>
                                                <option value="1"
                                                    <?php
                                                        if($user->role == "1"){
                                                            echo "selected";
                                                        }
                                                    ?>
                                                >Quản trị viên</option>
                                                <option value="2"
                                                    <?php
                                                        if($user->role == "2"){
                                                            echo "selected";
                                                        }
                                                    ?>
                                                >Người dùng</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /khung nội dung chính -->
                        </div>
                        <!-- /khung nội dung chính -->
                        <!-- chân trang -->
                        <?php include 'app/Views/Admin/layouts/footer.php' ?>
                        <!-- /chân trang -->
                    </div>
                    <!-- /nội dung chính -->
                </div>
                <!-- /nội dung bên phải -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Các tệp JavaScript -->
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
