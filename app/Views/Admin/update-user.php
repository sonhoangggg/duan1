<!DOCTYPE html>
<html lang="vi">
<head>
    
    <meta charset="utf-8">
    <title>Vongtey - Website bán vòng tay hàng đầu VN</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Giao Diện -->
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">

    <!-- Font -->
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">

    <!-- Biểu Tượng -->
    <link rel="stylesheet" href="assets/Admin/icon/style.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/Admin/images/logo_bestbalo.png">
    <link rel="apple-touch-icon-precomposed" href="assets/Admin/images/logo_bestbalo.png">

</head>

<body>

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page">
            <div class="layout-wrap">
                
                <!-- Hiệu Ứng Tải Trang -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>

                <!-- Thanh Menu Bên Trái -->
                <?php include 'app/Views/Admin/layouts/sidebar.php' ?>

                <!-- Nội Dung Chính -->
                <div class="section-content-right">
                    
                    <!-- Thanh Header -->
                    <?php include 'app/Views/Admin/layouts/header.php' ?>
                    
                    <!-- Phần Chính -->
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap"> 
                                <div class="wg-box">
                                    
                                    <?php 
                                        if(isset($_SESSION['message'])){
                                            echo "<p class='text-success'>" . $_SESSION['message'] . "</p>";
                                            unset($_SESSION['message']);
                                        }
                                        if(isset($_SESSION['error'])){
                                            echo "<p class='text-danger'>" . $_SESSION['error'] . "</p>";
                                            unset($_SESSION['error']);
                                        }
                                    ?>

                                    <div class="title-box">
                                        Chỉnh Sửa Người Dùng
                                    </div>

                                    <form action="?role=admin&act=update-post-user&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-5">
        <label for="name">Họ và Tên</label>
        <input type="text" id="name" placeholder="Nhập họ và tên" name="name" class="form-control" value="<?= $user->name ?>">
    </div>

    <div class="mb-5">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control" value="<?= $user->email ?>" readonly>
    </div>

    <div class="mb-5">
        <label for="password">Mật Khẩu</label>
        <input type="password" id="password" placeholder="Nhập mật khẩu" name="password" class="form-control">
    </div>

    <div class="mb-5">
        <label for="address">Địa Chỉ</label>
        <input type="text" id="address" placeholder="Nhập địa chỉ" name="address" class="form-control" value="<?= $user->address ?>">
    </div>

    <div class="mb-5">
        <label for="phone">Số Điện Thoại</label>
        <input type="text" id="phone" placeholder="Nhập số điện thoại" name="phone" class="form-control" value="<?= $user->phone ?>" pattern="^0\d{9}$" title="Số điện thoại phải bắt đầu bằng 0 và có đúng 10 chữ số" required>
    </div>

    <div class="mb-5">
        <label for="image">Ảnh Đại Diện</label><br>
        <img src="<?= $user->image ?>" alt="Ảnh đại diện" width="50"><br>
        <input type="file" id="image" name="image" accept="image/*" class="form-control">
    </div>

    <div class="mb-5">
        <label for="role">Vai Trò</label>
        <select id="role" name="role" class="form-control">
            <option value="" hidden>Chọn vai trò</option>
            <option value="1" <?= $user->role == "1" ? "selected" : "" ?>>Quản trị viên</option>
            <option value="2" <?= $user->role == "2" ? "selected" : "" ?>>Người dùng</option>
        </select>
    </div>

    <button class="btn btn-warning">Cập Nhật</button>
</form>


                                </div>
                            </div>
                        </div>

                        <!-- Phần Chân Trang -->
                        <?php include 'app/Views/Admin/layouts/footer.php' ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
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
