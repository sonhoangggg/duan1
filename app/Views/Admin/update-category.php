<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<style>
    .error-message {
        color: red;
        /* Màu đỏ cho lỗi */
        font-style: italic;
        /* Chữ nghiêng */
        font-family: 'Arial', sans-serif;
        /* Font chữ đẹp, đơn giản */
        font-size: 14px;
        /* Kích thước chữ vừa phải */
        font-weight: 500;
        /* Độ đậm nhẹ nhàng */
        margin: 10px 0;
        /* Tạo khoảng cách trên dưới */
        padding: 5px;
        /* Khoảng cách bên trong giúp dễ nhìn */
        border-left: 3px solid red;
        /* Đường viền trái nhấn mạnh */
        background-color: #ffe6e6;
        /* Nền nhạt để dễ đọc */
        letter-spacing: 2px;
        font-size: 15px;
    }
</style>

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
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                <!-- section-menu-left -->
                <?php include 'app/Views/Admin/layouts/sidebar.php' ?>
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    <?php include 'app/Views/Admin/layouts/header.php' ?>
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="wg-box">
                                    <?php
                                    if (isset($_SESSION['message'])) {
                                        echo "<p>" . $_SESSION['message'] . "</p>";
                                        unset($_SESSION['message']);
                                    }
                                    if (isset($_SESSION['error'])) {
                                        echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                    <div class="title-box"
                                        style="background: radial-gradient(circle at top, gray, blue);
                                            color: black; 
                                            border: 3px solid black; 
                                            border-radius: 15px;
                                            width: 200px; 
                                            height: 50px;
                                            color:white; 
                                            padding-left: 10px;
                                            font-size: 18px; 
                                            font-weight: bold; 
                                            font-family: Arial, sans-serif; 
                                            text-align: center; 
                                            line-height: 10px;">
                                            Chỉnh Sửa danh mục
                                    </div>
                                    <form action="?role=admin&act=update-post-category&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">

                                        <div class="mb-5">
                                            <h5><label for="name">Tên Danh Mục</label></h5>
                                            <input type="text" id="name" placeholder="Nhập tên danh mục ..." name="name"
                                                class="form-control" value="<?= $category->category_name ?>">
                                        </div>
                                        <div class="mb-5">
                                            <h5><label for="image">Image</label></h5>

                                            <img src="<?= $category->image ?>"
                                                alt="Current Image"
                                                style="width: 150px; height: auto; margin-bottom: 10px;">

                                            <input type="file" id="image" name="image" accept="image/*" class="form-control">
                                        </div>

                                        <button class="btn btn-warning"
                                            style='width: 100px;
                                                background-color: blue;
                                                height:30px;
                                                margin-top:10px;
                                                border-radius:10px;
                                                border: 2px solid black;
                                                font-size:15px;
                                        '>Sửa</button>
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

</body>

</html>