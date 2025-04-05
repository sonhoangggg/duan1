<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8">
    <title>Vongtey - Sản phẩm</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css"/>

  
    <style>
        .header-default{
            margin-bottom: 0 !important;
        }
    </style>
</head>

<body class="preload-wrapper popup-loader">
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- Header -->
            <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->
            <div class="tf-page-title style-2">
                <div class="container-full">
                    <div class="heading text-center">
                    <?php
                        if (isset($category)) {
                            echo $category->name;
                        } else {
                            echo "Sản phẩm mới";
                        }
                    ?>
                  </div>
                </div>
            </div>

            <section class="flat-spacing-2">
                <div class="container">
                    <div class="tf-shop-control grid-3 align-items-center">
                        <div class="tf-control-filter">
                            <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Bộ lọc</span></a>
                        </div>
                        <ul class="tf-control-layout d-flex justify-content-center">
                            <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                                <div class="item"><span class="icon icon-grid-2"></span></div>
                            </li>
                            <li class="tf-view-layout-switch sw-layout-3" data-value-grid="grid-3">
                                <div class="item"><span class="icon icon-grid-3"></span></div>
                            </li>
                            <li class="tf-view-layout-switch sw-layout-4 active" data-value-grid="grid-4">
                                <div class="item"><span class="icon icon-grid-4"></span></div>
                            </li>
                            <li class="tf-view-layout-switch sw-layout-5" data-value-grid="grid-5">
                                <div class="item"><span class="icon icon-grid-5"></span></div>
                            </li>
                            <li class="tf-view-layout-switch sw-layout-6" data-value-grid="grid-6">
                                <div class="item"><span class="icon icon-grid-6"></span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="wrapper-control-shop">
                        <div class="meta-filter-shop"></div>
                        <div class="grid-layout wrapper-shop" data-grid="grid-4">
                            <!-- card product 1 -->
                            <?php
                            //  var_dump($listProduct);
                            foreach($listProduct as $key =>$value): ?>
                            <div class="card-product" data-price="<?php $value->price ?>" data-color="orange black white">
                                <div class="card-product-wrapper">
                                    <a href="?act=product-detail&product_id=<?= $value->id ?>" class="product-img">
                                        <img class="lazyload img-product" data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt=" ">
                                        <img class="lazyload img-hover" data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt=" ">
                                    </a>
                                </div>
                                <div class="card-product-info">
                                    <a href="?act=product-detail&product_id=<?= $value->id ?>" class="title link"><?= $value->name ?></a>
                                    <?php if($value->price_sale != null): ?>
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
                            <?php  endforeach; ?>

                        </div>
                        <!-- pagination -->
                        <ul class="tf-pagination-wrap tf-pagination-list tf-pagination-btn">
                            <li class="active">
                                <a href="#" class="pagination-link">1</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">2</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">3</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">4</a>
                            </li>
                            <li>
                                <a href="#" class="pagination-link animate-hover-btn">
                                    <span class="icon icon-arrow-right"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </section>

        <!-- Fillter -->
        <div class="offcanvas offcanvas-start canvas-filter " id="filterShop" aria-modal="true" role="dialog">
        <div class="canvas-wrapper">
            <header class="canvas-header" style="top: 0px;">
                <div class="filter-icon">
                    <span class="icon icon-filter"></span>
                    <span>Bộ lọc</span>
                </div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </header>
            <div class="canvas-body">

                <div class="widget-facet ">
                    <div class="facet-title" data-bs-target="#product-name" data-bs-toggle="collapse" aria-expanded="true" aria-controls="product-name">
                        <span>Tên sản phẩm</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="product-name" class="collapse show">
                        <form action="?act" method="get">
                            <div class="d-flex mb-5">
                                <input type="hidden" name="act" value="shop">
                                <input type="text" placeholder="Tên sản phẩm" name="product-name">
                                <button class="btn btn-primary btn-sm">Tìm</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="widget-facet wd-categories">
                    <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                        <span>Danh mục sản phẩm</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="categories" class="collapse show">
                        <ul class="list-categoris current-scrollbar mb_36">
                            <?php foreach($listCategory as $key => $value): ?>
                            <li class="cate-item
                                <?php if(isset($_GET['category_id']) && $_GET['category_id'] == $value->id ): ?>
                                    current
                                <?php endif; ?>
                            ">
                                <a href="?act=shop&category_id=<?= $value->id ?>">
                                    <span><?= $value->name ?></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse" aria-expanded="true" aria-controls="availability">
                            <span>Tình trạng hàng</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="availability" class="collapse show">
                            <ul class="tf-filter-group current-scrollbar mb_36">
                                <li class="list-item d-flex gap-12 align-items-center">
                                    
                                    <a 
                                    <?php 
                                        if(isset($_GET['category_id'])) {
                                            echo 'href="' . '?act=shop&category_id=' . $_GET['category_id'] . '&instock=true"';
                                        }else{
                                            echo 'href="' . '?act=shop&instock=true"';
                                        }
                                    ?>
                                    class="label">
                                        <span>Còn hàng</span>&nbsp;<span>(<?= $stock[0]->instock ?>)</span>
                                    </a>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    
                                    <a 
                                    <?php 
                                        if(isset($_GET['category_id'])) {
                                            echo 'href="' . '?act=shop&category_id=' . $_GET['category_id'] . '&outstock=true"';
                                        }else{
                                            echo 'href="' . '?act=shop&outstock=true"';
                                        }
                                    ?>
                                    class="label">
                                        <span>Hết hàng</span>&nbsp;<span>(<?= $stock[1]->outstock ?>)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true" aria-controls="price">
                            <span>Giá</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="price" class="collapse show">
                            <form action="?act" method="get">
                                <div class="widget-price filter-price">
                                    <div class="d-flex"> 
                                        <input type="hidden" name="act" value="shop">
                                        <input  type="number" placeholder="Thấp nhất" class="me-3" name="min">
                                        <input  type="number" placeholder="Cao nhất" name="max">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary mt-2 btn-sm">Tìm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
            
        </div>       
    </div>
        <!-- /Fillter -->
        
        <!-- Footer -->
            <?php include 'app/Views/Users/layouts/footer.php' ?>
        <!-- /Footer -->
        
    </div>

    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /gotop -->


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