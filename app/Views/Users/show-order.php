<!DOCTYPE html>
<html xmlns="assets\Admin\images\logo_bestbalo.png" xml:lang="vi-VN" lang="vi-VN">
<head>
    
    <meta charset="utf-8">
    <title>Vongtey</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css"/>


</head>

<body class="preload-wrapper popup-loader">


    <!-- Màn hình tải -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /Màn hình tải -->

    <div id="wrapper">
        <!-- Header -->
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->
        <div class="tf-page-title style-2">
            <div class="heading text-center">Đơn hàng</div>
        </div>
    <section class="flat-spacing-11">
         <div class="container">
            <table class="tf-table-page-cart">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Thành tiền</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <?php foreach($orders as $key => $value): ?>
                    <tr>
                        <td class="text-center"><?= $key + 1 ?></td>
                        <td class="text-center"><?= $value->name ?></td>
                        <td class="text-center"><?= $value->phone ?></td>
                        <td class="text-center"><?= $value->address ?></td>
                        <td class="text-center"><?= number_format($value->total) ?> vnd</td>
                        <td class="text-center">
                        <?php if ($value->status == 'pending'): ?>
                            <span class="badge text-bg-warning">Đang chờ</span>
                        <?php elseif ($value->status == 'confirmed'): ?>
                            <span class="badge text-bg-primary">Đã xác nhận</span>
                      
                        
                        <?php elseif ($value->status == 'shipping'): ?>
                            <span class="badge text-bg-primary">Đang giao hàng</span>
                        <?php elseif ($value->status == 'completed'): ?>
                            <span class="badge text-bg-success">Đã hoàn thành</span>
                        <?php elseif ($value->status == 'canceled'): ?>
                            <span class="badge text-bg-danger">Đã hủy</span>
                        <?php endif; ?>
                    </td>

                        <td class="text-end">
                            <a href="?act=show-order-detail&order_id=<?= $value->id ?>" class="btn btn-success">Chi tiết đơn hàng</a>
                            <?php if($value->status == 'pending'): ?>
                                <a href="?act=cancel-order&order_id=<?= $value->id ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn hủy đơn không?')">Hủy bỏ</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </table>
        </div>
    </section>



        <!-- Chân Trang -->
        <?php include 'app/Views/Users/layouts/footer.php' ?>
        <!-- /Chân Trang -->
    </div>

    <!-- nút lên đầu trang -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /nút lên đầu trang -->



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