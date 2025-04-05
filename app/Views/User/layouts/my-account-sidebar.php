<div class="col-lg-3">
    <div class="wrap-sidebar-account">
        <ul class="my-account-nav">
            <li>
                <a href="?act=my-account" class="my-account-nav-item
                <?= $_GET['act'] == 'my-account' ? 'active' : '' ?>
                ">
                    Bảng điều khiển
                </a>
            </li>
            <li><a href="my-account-orders.html" class="my-account-nav-item">Đơn hàng</a></li>
            <!-- <li><a href="my-account-address.html" class="my-account-nav-item">Địa chỉ</a></li> -->
            <li>
                <a href="?act=account-detail" class="my-account-nav-item
                    <?= $_GET['act'] == 'account-detail' ? 'active' : '' ?>
                ">
                    Chi tiết tài khoản
                </a>
            </li>
            <!-- <li><a href="my-account-wishlist.html" class="my-account-nav-item">Danh sách yêu thích</a></li> -->
            <li><a href="?act=logout" class="my-account-nav-item">Đăng xuất</a></li>
        </ul>
    </div>
</div>
