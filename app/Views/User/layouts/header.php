<header id="header" class="header-default header-absolute">
    <div class="px_15 lg-px_40">
        <div class="row wrapper-header align-items-center">
            <div class="col-md-4 col-3 tf-lg-hidden">
                <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                        <path d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z" fill="currentColor"></path>
                    </svg>
                </a>
            </div>
            <div class="col-xl-3 col-md-4 col-6">
                <a href="index.php" class="logo-header">
                    <img src="assets/Users/images/item/pnj.com.vn.png" alt="logo" class="logo">
                </a>
            </div>
            <div class="col-xl-6 tf-md-hidden">
                <nav class="box-navigation text-center">
                    <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                        <li class="menu-item">
                            <a href="?act" class="item-link">Trang chủ<i class="icon "></i></a>
                        </li>
                        <li class="menu-item">
                            <a href="?act=shop" class="item-link">Sản phẩm <i class="icon"></i></a>
                        </li>
                        <li class="menu-item">
                            <a href="?act=contact" class="item-link">Liên hệ<i class="icon"></i></a>
                        </li>
                        <li class="menu-item">
                            <a href="?act=blog" class="item-link">Tin tức<i class="icon"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-xl-3 col-md-4 col-3">
                <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                    </li>
                    <?php if(isset($_SESSION['users'])): ?>
                        <li class="nav-account dropdown">
                            <a href="#" class="nav-icon-item dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="icon icon-account"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="?act=my-account" class="dropdown-item">Tài khoản</a></li>
                                <li><a href="?act=shopping-cart" class="dropdown-item">Giỏ hàng</a></li>
                                <li><a href="?act=show-order" class="dropdown-item">Đơn hàng</a></li>
                                <li><a href="?act=logout" class="dropdown-item">Đăng xuất</a></li>
                            </ul>
                        </li>
                        <li class="nav-cart">
                            <a href="?act=shopping-cart">
                                <i class="icon icon-bag"></i><span class="count-box">.</span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-account">
                            <a href="?act=login" class="nav-icon-item">
                                <i class="icon icon-account"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</header>
