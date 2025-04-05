<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<style>

</style>

<head>
    <meta charset="utf-8">
    <title>Vongtey - Website bán vòng tay  hàng đầu VN</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/animation.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Admin/css/styles.css">

    <style>
        .thongbao {
            color: rgb(65, 9, 9);
            font-style: italic;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            font-weight: 500;
            margin: 10px 0;
            padding: 5px;
            border-left: 3px solid rgb(43, 138, 5);
            background-color:rgb(208, 254, 177);
            letter-spacing: 2px;
            font-size: 15px;
        }
    </style>

    <!-- Font -->
    <link rel="stylesheet" href="assets/Admin/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="assets/Admin/icon/style.css">

    

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
                                        echo "<p class='thongbao'>" . $_SESSION['message'] . "</p>";
                                        unset($_SESSION['message']);
                                    }
                                    ?>

                                    <div class="title-box">
                                        Danh sách Danh mục sản phẩm
                                    </div>
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <div class="show">
                                                <div class="text-tiny">Hiện Thị</div>
                                                <div class="select">
                                                    <select class="">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny"></div>
                                            </div>
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Tìm Kiếm..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208"
                                            href="?role=admin&act=add-category"><i class="icon-plus"></i>Thêm Danh Mục</a>
                                    </div>
                                    <div class="wg-table table-product-list">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li>
                                                <div class="body-title">STT</div>
                                            </li>
                                            <li>
                                                <div class="body-title">Tên Danh Mục</div>
                                            </li>
                                            <li>
                                                <div class="body-title">Hình ảnh</div>
                                            </li>
                                            <li>
                                                <div class="body-title">Hoạt động</div>
                                            </li>
                                        </ul>
                                        <ul class="flex flex-column">
                                            <?php foreach ($listCategory as $key => $value): ?>
                                                <li class="wg-product item-row ">
                                                    <div style="font-size:20px;font-weight: bold;" class="body-text text-main-dark mt-4"><?= $key + 1 ?></div>
                                                    <div style="font-size:15px;font-weight: bold;" class="body-text text-main-dark mt-4"><?= $value->name ?></div>
                                                    <div class="body-text text-main-dark mt-4">
                                                        <img src="<?= $value->image ?>" alt="" width="50">
                                                    </div>
                                                    <div class="list-icon-function">

                                                        <div class="item edit">
                                                            <a href="?role=admin&act=update-category&id=<?= $value->id ?>">
                                                                <i class="icon-edit-3"></i>
                                                            </a>
                                                        </div>
                                                        <div class="item trash">
                                                            <a class="delete-category" href="?role=admin&act=delete-category&id=<?= $value->id ?>">
                                                                <i class="icon-trash-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <ul class="wg-pagination">
                                            <li>
                                                <a href="#"><i class="icon-chevron-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">1</a>
                                            </li>
                                            <li class="active">
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="icon-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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

    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-category").forEach(function (element) {
        element.addEventListener("click", function (event) {
            event.preventDefault(); 
            let confirmDelete = confirm("Bạn có chắc chắn muốn xóa danh mục này không?");
            if (confirmDelete) {
                window.location.href = this.getAttribute("href");
            } else {
                location.reload();
            }
        });
    });
});
</script>
</body>

</html>