<!DOCTYPE html>
<html xmlns="assets\Admin\images\logo_bestbalo.png" xml:lang="vi-VN" lang="vi-VN">

<head>

    <meta charset="utf-8">
    <title>Vongtey</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css" />

    <!-- Favicon và Biểu tượng Cảm ứng -->
    
</head>

<body class="preload-wrapper popup-loader">
    <?php
    if (isset($_SESSION['success_message'])) {
        echo '<div id="success-alert" class="alert alert-success" style="position: fixed; top: 10px; right: 10px; z-index: 1000; padding: 15px; background-color: #4CAF50; color: white; border-radius: 5px; transition: opacity 0.5s ease-in-out;">
                        ' . $_SESSION['success_message'] . '
                    </div>';
        unset($_SESSION['success_message']); // Xóa thông báo sau khi hiển thị
    }
    ?>


    <!-- Màn hình tải -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /Màn hình tải -->

    <div id="wrapper">
        <!-- Thanh Trên Cùng -->
        <?php include 'app/Views/Users/layouts/contact.php' ?>
        <!-- /Thanh Trên Cùng -->
        <!-- Header -->
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->
        <!-- Trình Chiếu -->
        <?php include 'app/Views/Users/layouts/slideshow.php' ?>
        <!-- /Trình Chiếu -->
        <!-- Chạy Chữ -->
        <?php include 'app/Views/Users/layouts/marquee.php' ?>

        <!-- /Chạy Chữ -->
        <!-- Danh Mục -->
        <section class="flat-spacing-4 flat-categorie">
            <div class="container-full">
                <div class="flat-title-v2">
                    <div class="box-sw-navigation">
                        <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-left"></span></div>
                        <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-right"></span></div>
                    </div>
                    <span class="text-3 fw-7 text-uppercase title wow fadeInUp" data-wow-delay="0s">MUA SẮM THEO DANH MỤC</span>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div dir="ltr" class="swiper tf-sw-collection" data-preview="3" data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                            <div class="swiper-wrapper">
                                <?php foreach ($listCategory as $key => $value): ?>
                                    <div class="swiper-slide" lazy="true">
                                        <div class="collection-item style-left hover-img">
                                            <div class="collection-inner">
                                                <a href="?act=shop&category_id=<?= $value->id ?>" class="collection-image img-style">
                                                    <img class="lazyload" data-src="<?= $value->image ?>" src="<?= $value->image ?>" alt="danh-muc">
                                                </a>
                                                <div class="collection-content">
                                                    <a href="?act=shop&category_id=<?= $value->id ?>" class="tf-btn collection-title hover-icon fs-15"><span>
                                                            <?= $value->name ?>
                                                        </span><i class="icon icon-arrow1-top-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="discovery-new-item">
                            <h5>Khám phá sản phẩm mới</h5>
                            <a href="shop-collection-list.html"><i class="icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Danh Mục -->

        <!-- Sản Phẩm Bán Chạy -->
        <section class="flat-spacing-5 pt_0 flat-seller">
            <div class="container">
                <div class="flat-title">
                    <span class="title wow fadeInUp" data-wow-delay="0s">Sản Phẩm Bán Chạy</span>
                    <p class="sub-title wow fadeInUp" data-wow-delay="0s">Cập nhật xu hướng mới nhất với các sản phẩm hot</p>
                </div>
                <div class="grid-layout loadmore-item wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">
                    <!-- card product 1 -->
                    <?php foreach ($listProduct as $key => $value): ?>
                        <div class="card-product fl-item">
                            <div class="card-product-wrapper">
                                <a href="?act=product-detail&product_id=<?= $value->id ?>" class="product-img">
                                    <img class="lazyload img-product" data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt="image-product">
                                    <img class="lazyload img-hover" data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt="image-product">
                                </a>
                            </div>
                            <div class="card-product-info">
                                <a href="?act=product-detail&product_id=<?= $value->id ?>" class="title link"><?= $value->name ?></a>
                                <div style="display: flex;">

                                    <?php if ($value->price_sale != null): ?>
                                        <span class="price" style="margin-right: 5px; text-decoration: line-through; ">
                                            <?= number_format($value->price) ?> VND
                                        </span>

                                        <span class="price price-sale">
                                            <?= number_format($value->price_sale) ?> VND
                                        </span>
                                    <?php else: ?>
                                        <span class="price" style="margin-right: 5px;">
                                            <?= number_format($value->price) ?> VND
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- /card product 1 -->
                </div>

                <div class="tf-pagination-wrap view-more-button text-center">
                    <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Xem thêm</span></button>
                </div>

            </div>
        </section>
        <!-- /Sản Phẩm Bán Chạy -->
        <!-- Hộp Icon -->
        <?php include 'app/Views/Users/layouts/iconbox.php' ?>
        <?php include 'app/Views/Users/layouts/slider.php' ?>

        <!-- /Hộp Icon -->
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

    <!-- Giỏ hàng -->
    <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="header">
                    <div class="title fw-5">Giỏ hàng</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">
                    <div class="tf-mini-cart-threshold">
                        <div class="tf-progress-bar">
                            <span style="width: 50%;">
                                <div class="progress-car">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="14" viewBox="0 0 21 14" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.875C0 0.391751 0.391751 0 0.875 0H13.5625C14.0457 0 14.4375 0.391751 14.4375 0.875V3.0625H17.3125C17.5867 3.0625 17.845 3.19101 18.0104 3.40969L20.8229 7.12844C20.9378 7.2804 21 7.46572 21 7.65625V11.375C21 11.8582 20.6082 12.25 20.125 12.25H17.7881C17.4278 13.2695 16.4554 14 15.3125 14C14.1696 14 13.1972 13.2695 12.8369 12.25H7.72563C7.36527 13.2695 6.39293 14 5.25 14C4.10706 14 3.13473 13.2695 2.77437 12.25H0.875C0.391751 12.25 0 11.8582 0 11.375V0.875ZM2.77437 10.5C3.13473 9.48047 4.10706 8.75 5.25 8.75C6.39293 8.75 7.36527 9.48046 7.72563 10.5H12.6875V1.75H1.75V10.5H2.77437ZM14.4375 8.89937V4.8125H16.8772L19.25 7.94987V10.5H17.7881C17.4278 9.48046 16.4554 8.75 15.3125 8.75C15.0057 8.75 14.7112 8.80264 14.4375 8.89937ZM5.25 10.5C4.76676 10.5 4.375 10.8918 4.375 11.375C4.375 11.8582 4.76676 12.25 5.25 12.25C5.73323 12.25 6.125 11.8582 6.125 11.375C6.125 10.8918 5.73323 10.5 5.25 10.5ZM15.3125 10.5C14.8293 10.5 14.4375 10.8918 14.4375 11.375C14.4375 11.8582 14.8293 12.25 15.3125 12.25C15.7957 12.25 16.1875 11.8582 16.1875 11.375C16.1875 10.8918 15.7957 10.5 15.3125 10.5Z"></path>
                                    </svg>
                                </div>
                            </span>
                        </div>
                        <div class="tf-progress-msg">
                            Mua thêm <span class="price fw-6">$75.00</span> để được <span class="fw-6">Miễn phí vận chuyển</span>
                        </div>
                    </div>
                    <div class="tf-mini-cart-wrap">
                        <div class="tf-mini-cart-main">
                            <div class="tf-mini-cart-sroll">
                                <div class="tf-mini-cart-items">
                                    <div class="tf-mini-cart-item">
                                        <div class="tf-mini-cart-image">
                                            <a href="product-detail.html">
                                                <img src="assets/Users/images/products/white-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="tf-mini-cart-info">
                                            <a class="title link" href="product-detail.html">Áo thun</a>
                                            <div class="meta-variant">Xám nhạt</div>
                                            <div class="price fw-6">$25.00</div>
                                            <div class="tf-mini-cart-btns">
                                                <div class="wg-quantity small">
                                                    <span class="btn-quantity minus-btn">-</span>
                                                    <input type="text" name="number" value="1">
                                                    <span class="btn-quantity plus-btn">+</span>
                                                </div>
                                                <div class="tf-mini-cart-remove">Xóa</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tf-mini-cart-bottom">
                <div class="tf-mini-cart-tool">
                    <div class="tf-mini-cart-tool-btn btn-add-note">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="currentColor">
                            <path d="M5.12187 16.4582H2.78952C2.02045 16.4582 1.39476 15.8325 1.39476 15.0634V2.78952C1.39476 2.02045 2.02045 1.39476 2.78952 1.39476H11.3634C12.1325 1.39476 12.7582 2.02045 12.7582 2.78952V7.07841C12.7582 7.46357 13.0704 7.77579 13.4556 7.77579C13.8407 7.77579 14.1529 7.46357 14.1529 7.07841V2.78952C14.1529 1.25138 12.9016 0 11.3634 0H2.78952C1.25138 0 0 1.25138 0 2.78952V15.0634C0 16.6015 1.25138 17.8529 2.78952 17.8529H5.12187C5.50703 17.8529 5.81925 17.5407 5.81925 17.1555C5.81925 16.7704 5.50703 16.4582 5.12187 16.4582Z"></path>
                            <path d="M15.3882 10.0971C14.5724 9.28136 13.2452 9.28132 12.43 10.0965L8.60127 13.9168C8.51997 13.9979 8.45997 14.0979 8.42658 14.2078L7.59276 16.9528C7.55646 17.0723 7.55292 17.1993 7.58249 17.3207C7.61206 17.442 7.67367 17.5531 7.76087 17.6425C7.84807 17.7319 7.95768 17.7962 8.07823 17.8288C8.19879 17.8613 8.32587 17.8609 8.44621 17.8276L11.261 17.0479C11.3769 17.0158 11.4824 16.9543 11.5675 16.8694L15.3882 13.0559C16.2039 12.2401 16.2039 10.9129 15.3882 10.0971ZM10.712 15.7527L9.29586 16.145L9.71028 14.7806L12.2937 12.2029L13.2801 13.1893L10.712 15.7527ZM14.4025 12.0692L14.2673 12.204L13.2811 11.2178L13.4157 11.0834C13.6876 10.8115 14.1301 10.8115 14.402 11.0834C14.6739 11.3553 14.6739 11.7977 14.4025 12.0692Z"></path>
                        </svg>
                    </div>
                    <div class="tf-mini-cart-tool-btn btn-add-gift">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.99566 2.73409C2.99566 0.55401 5.42538 -0.746668 7.23916 0.463462L8.50073 1.30516L9.7623 0.463462C11.5761 -0.746668 14.0058 0.55401 14.0058 2.73409V3.24744H14.8225C15.9633 3.24744 16.8881 4.17233 16.8881 5.31312V6.82566C16.8881 7.21396 16.5734 7.52873 16.1851 7.52873H15.8905V15.1877C15.8905 15.1905 15.8905 15.1933 15.8905 15.196C15.886 16.7454 14.6286 18 13.0782 18H3.92323C2.37003 18 1.11091 16.7409 1.11091 15.1877V7.52877H0.81636C0.42806 7.52877 0.113281 7.21399 0.113281 6.82569V5.31316C0.113281 4.17228 1.03812 3.24744 2.179 3.24744H2.99566V2.73409ZM4.40181 3.24744H7.79765V2.52647L6.45874 1.63317C5.57987 1.0468 4.40181 1.67677 4.40181 2.73409V3.24744ZM9.20381 2.52647V3.24744H12.5996V2.73409C12.5996 1.67677 11.4216 1.0468 10.5427 1.63317L9.20381 2.52647ZM2.179 4.6536C1.81472 4.6536 1.51944 4.94888 1.51944 5.31316V6.12261H5.73398L5.734 4.6536H2.179ZM5.73401 7.52877V13.9306C5.73401 14.1806 5.86682 14.4119 6.08281 14.5379C6.29879 14.6639 6.56545 14.6657 6.78312 14.5426L8.50073 13.5715L10.2183 14.5426C10.436 14.6657 10.7027 14.6639 10.9187 14.5379C11.1346 14.4119 11.2674 14.1806 11.2674 13.9306V7.52873H14.4844V15.1603C14.4844 15.1627 14.4843 15.1651 14.4843 15.1675V15.1877C14.4843 15.9643 13.8548 16.5938 13.0782 16.5938H3.92323C3.14663 16.5938 2.51707 15.9643 2.51707 15.1877V7.52877H5.73401ZM15.482 6.12258V5.31312C15.482 4.94891 15.1867 4.6536 14.8225 4.6536H11.2674V6.12258H15.482ZM9.86129 4.6536H7.14017V12.7254L8.15469 12.1518C8.36941 12.0304 8.63204 12.0304 8.84676 12.1518L9.86129 12.7254V4.6536Z"></path>
                        </svg>
                    </div>
                    <div class="tf-mini-cart-tool-btn btn-estimate-shipping">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="18" viewBox="0 0 26 18" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.811989C0 0.36354 0.36354 0 0.811989 0H15.4278C15.8763 0 16.2398 0.36354 16.2398 0.811989V3.10596H21.0144C23.6241 3.10596 25.8643 5.05894 25.8643 7.61523V14.6414C25.8643 15.0899 25.5007 15.4534 25.0523 15.4534H23.545C23.2139 16.9115 21.9098 18 20.3514 18C18.7931 18 17.4889 16.9115 17.1578 15.4534H8.69534C8.36423 16.9115 7.0601 18 5.50175 18C3.9434 18 2.63927 16.9115 2.30815 15.4534H0.811989C0.36354 15.4534 0 15.0899 0 14.6414V0.811989ZM2.35089 13.8294C2.74052 12.4562 4.00366 11.4503 5.50175 11.4503C6.99983 11.4503 8.26298 12.4562 8.6526 13.8294H14.6158V1.62398H1.62398V13.8294H2.35089ZM16.2398 4.72994V7.95749H24.2403V7.61523C24.2403 6.08759 22.8649 4.72994 21.0144 4.72994H16.2398ZM24.2403 9.58147H16.2398V13.8294H17.2006C17.5902 12.4562 18.8533 11.4503 20.3514 11.4503C21.8495 11.4503 23.1126 12.4562 23.5023 13.8294H24.2403V9.58147ZM5.50175 13.0743C4.58999 13.0743 3.85087 13.8134 3.85087 14.7251C3.85087 15.6369 4.58999 16.376 5.50175 16.376C6.41351 16.376 7.15263 15.6369 7.15263 14.7251C7.15263 13.8134 6.41351 13.0743 5.50175 13.0743ZM20.3514 13.0743C19.4397 13.0743 18.7005 13.8134 18.7005 14.7251C18.7005 15.6369 19.4397 16.376 20.3514 16.376C21.2632 16.376 22.0023 15.6369 22.0023 14.7251C22.0023 13.8134 21.2632 13.0743 20.3514 13.0743Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="tf-mini-cart-bottom-wrap">
                    <div class="tf-cart-totals-discounts">
                        <div class="tf-cart-total">Tổng phụ</div>
                        <div class="tf-totals-total-value fw-6">$49.99 USD</div>
                    </div>
                    <div class="tf-cart-tax">Thuế và <a href="#">phí vận chuyển</a> sẽ được tính khi thanh toán</div>
                    <div class="tf-mini-cart-line"></div>
                    <div class="tf-cart-checkbox">
                        <div class="tf-checkbox-wrapp">
                            <input class="" type="checkbox" id="CartDrawer-Form_agree" name="agree_checkbox">
                            <div>
                                <i class="icon-check"></i>
                            </div>
                        </div>
                        <label for="CartDrawer-Form_agree">
                            Tôi đồng ý với
                            <a href="#" title="Điều khoản dịch vụ">điều khoản và điều kiện</a>
                        </label>
                    </div>
                    <div class="tf-mini-cart-view-checkout">
                        <a href="view-cart.html" class="tf-btn btn-outline radius-3 link w-100 justify-content-center">Xem giỏ hàng</a>
                        <a href="checkout.html" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Thanh toán</span></a>
                    </div>
                </div>

                <div class="tf-mini-cart-tool-openable add-note">
                    <div class="overplay tf-mini-cart-tool-close"></div>
                    <div class="tf-mini-cart-tool-content">
                        <label for="Cart-note" class="tf-mini-cart-tool-text">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="currentColor">
                                    <path d="M5.12187 16.4582H2.78952C2.02045 16.4582 1.39476 15.8325 1.39476 15.0634V2.78952C1.39476 2.02045 2.02045 1.39476 2.78952 1.39476H11.3634C12.1325 1.39476 12.7582 2.02045 12.7582 2.78952V7.07841C12.7582 7.46357 13.0704 7.77579 13.4556 7.77579C13.8407 7.77579 14.1529 7.46357 14.1529 7.07841V2.78952C14.1529 1.25138 12.9016 0 11.3634 0H2.78952C1.25138 0 0 1.25138 0 2.78952V15.0634C0 16.6015 1.25138 17.8529 2.78952 17.8529H5.12187C5.50703 17.8529 5.81925 17.5407 5.81925 17.1555C5.81925 16.7704 5.50703 16.4582 5.12187 16.4582Z"></path>
                                    <path d="M15.3882 10.0971C14.5724 9.28136 13.2452 9.28132 12.43 10.0965L8.60127 13.9168C8.51997 13.9979 8.45997 14.0979 8.42658 14.2078L7.59276 16.9528C7.55646 17.0723 7.55292 17.1993 7.58249 17.3207C7.61206 17.442 7.67367 17.5531 7.76087 17.6425C7.84807 17.7319 7.95768 17.7962 8.07823 17.8288C8.19879 17.8613 8.32587 17.8609 8.44621 17.8276L11.261 17.0479C11.3769 17.0158 11.4824 16.9543 11.5675 16.8694L15.3882 13.0559C16.2039 12.2401 16.2039 10.9129 15.3882 10.0971ZM10.712 15.7527L9.29586 16.145L9.71028 14.7806L12.2937 12.2029L13.2801 13.1893L10.712 15.7527ZM14.4025 12.0692L14.2673 12.204L13.2811 11.2178L13.4157 11.0834C13.6876 10.8115 14.1301 10.8115 14.402 11.0834C14.6739 11.3553 14.6739 11.7977 14.4025 12.0692Z"></path>
                                </svg>
                            </div>
                            <span>Add Order Note</span>
                        </label>
                        <textarea name="note" id="Cart-note" placeholder="How can we help you?"></textarea>
                        <div class="tf-cart-tool-btns justify-content-center">
                            <div class="tf-mini-cart-tool-primary text-center w-100 fw-6 tf-mini-cart-tool-close">Close</div>
                        </div>
                    </div>
                </div>
                <div class="tf-mini-cart-tool-openable add-gift">
                    <div class="overplay tf-mini-cart-tool-close"></div>
                    <form class="tf-product-form-addgift">
                        <div class="tf-mini-cart-tool-content">
                            <div class="tf-mini-cart-tool-text">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.65957 3.64545C4.65957 0.73868 7.89921 -0.995558 10.3176 0.617949L11.9997 1.74021L13.6818 0.617949C16.1001 -0.995558 19.3398 0.73868 19.3398 3.64545V4.32992H20.4286C21.9498 4.32992 23.1829 5.56311 23.1829 7.08416V9.10087C23.1829 9.61861 22.7632 10.0383 22.2454 10.0383H21.8528V20.2502C21.8528 20.254 21.8527 20.2577 21.8527 20.2614C21.8467 22.3272 20.1702 24 18.103 24H5.89634C3.82541 24 2.14658 22.3212 2.14658 20.2502V10.0384H1.75384C1.23611 10.0384 0.816406 9.61865 0.816406 9.10092V7.08421C0.816406 5.56304 2.04953 4.32992 3.57069 4.32992H4.65957V3.64545ZM6.53445 4.32992H11.0622V3.36863L9.27702 2.17757C8.10519 1.39573 6.53445 2.2357 6.53445 3.64545V4.32992ZM12.9371 3.36863V4.32992H17.4649V3.64545C17.4649 2.2357 15.8942 1.39573 14.7223 2.17756L12.9371 3.36863ZM3.57069 6.2048C3.08499 6.2048 2.69128 6.59851 2.69128 7.08421V8.16348H8.31067L8.3107 6.2048H3.57069ZM8.31071 10.0384V18.5741C8.31071 18.9075 8.48779 19.2158 8.77577 19.3838C9.06376 19.5518 9.4193 19.5542 9.70953 19.3901L11.9997 18.0953L14.2898 19.3901C14.58 19.5542 14.9356 19.5518 15.2236 19.3838C15.5115 19.2158 15.6886 18.9075 15.6886 18.5741V10.0383H19.9779V20.2137C19.9778 20.2169 19.9778 20.2201 19.9778 20.2233V20.2502C19.9778 21.2857 19.1384 22.1251 18.103 22.1251H5.89634C4.86088 22.1251 4.02146 21.2857 4.02146 20.2502V10.0384H8.31071ZM21.308 8.16344V7.08416C21.308 6.59854 20.9143 6.2048 20.4286 6.2048H15.6886V8.16344H21.308ZM13.8138 6.2048H10.1856V16.9672L11.5383 16.2024C11.8246 16.0405 12.1748 16.0405 12.461 16.2024L13.8138 16.9672V6.2048Z"></path>
                                    </svg>
                                </div>
                                <div class="tf-gift-wrap-infos">
                                    <p>Do you want a gift wrap?</p>
                                    Only
                                    <span class="price fw-6">$5.00</span>
                                </div>
                            </div>
                            <div class="tf-cart-tool-btns">
                                <button type="submit" class="tf-btn fw-6 w-100 justify-content-center btn-fill animate-hover-btn radius-3"><span>Add a gift wrap</span></button>
                                <div class="tf-mini-cart-tool-primary text-center w-100 fw-6 tf-mini-cart-tool-close">Cancel</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tf-mini-cart-tool-openable estimate-shipping">
                    <div class="overplay tf-mini-cart-tool-close"></div>
                    <div class="tf-mini-cart-tool-content">
                        <div class="tf-mini-cart-tool-text">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.441406 1.13155C0.441406 0.782753 0.724159 0.5 1.07295 0.5H12.4408C12.7896 0.5 13.0724 0.782753 13.0724 1.13155V2.91575H16.7859C18.8157 2.91575 20.5581 4.43473 20.5581 6.42296V11.8878C20.5581 12.2366 20.2753 12.5193 19.9265 12.5193H18.7542C18.4967 13.6534 17.4823 14.5 16.2703 14.5C15.0582 14.5 14.0439 13.6534 13.7864 12.5193H7.20445C6.94692 13.6534 5.93259 14.5 4.72054 14.5C3.50849 14.5 2.49417 13.6534 2.23664 12.5193H1.07295C0.724159 12.5193 0.441406 12.2366 0.441406 11.8878V1.13155ZM2.26988 11.2562C2.57292 10.1881 3.55537 9.40578 4.72054 9.40578C5.88572 9.40578 6.86817 10.1881 7.17121 11.2562H11.8093V1.76309H1.7045V11.2562H2.26988ZM13.0724 4.17884V6.68916H19.295V6.42296C19.295 5.2348 18.2252 4.17884 16.7859 4.17884H13.0724ZM19.295 7.95226H13.0724V11.2562H13.8196C14.1227 10.1881 15.1051 9.40578 16.2703 9.40578C17.4355 9.40578 18.4179 10.1881 18.7209 11.2562H19.295V7.95226ZM4.72054 10.6689C4.0114 10.6689 3.43652 11.2437 3.43652 11.9529C3.43652 12.662 4.0114 13.2369 4.72054 13.2369C5.42969 13.2369 6.00456 12.662 6.00456 11.9529C6.00456 11.2437 5.42969 10.6689 4.72054 10.6689ZM16.2703 10.6689C15.5611 10.6689 14.9863 11.2437 14.9863 11.9529C14.9863 12.662 15.5611 13.2369 16.2703 13.2369C16.9794 13.2369 17.5543 12.662 17.5543 11.9529C17.5543 11.2437 16.9794 10.6689 16.2703 10.6689Z"></path>
                                </svg>
                            </div>
                            <span class="fw-6">Estimate Shipping</span>
                        </div>
                        <div class="field">
                            <p>Country</p>
                        
                        </div>
                        <div class="field">
                            <p>Zip code</p>
                            <input type="text" name="text" placeholder="">
                        </div>
                        <div class="tf-cart-tool-btns">
                            <a href="#" class="tf-btn fw-6 justify-content-center btn-fill w-100 animate-hover-btn radius-3"><span>Estimate</span></a>
                            <div class="tf-mini-cart-tool-primary text-center fw-6 w-100 tf-mini-cart-tool-close">Cancel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- /shoppingCart -->


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
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                var alertBox = document.getElementById("success-alert");
                if (alertBox) {
                    alertBox.style.opacity = "0";
                    setTimeout(function() {
                        alertBox.style.display = "none";
                    }, 500); // Chờ hiệu ứng mờ dần (0.5 giây)
                }
            }, 2000); // Hiển thị trong 2 giây
        });
    </script>
</body>

</html>