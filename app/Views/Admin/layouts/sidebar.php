<div class="section-menu-left">
    <div class="box-logo">
        <a href="?role=admin&act=home" id="site-logo-inner">
            <img src="assets\Users\images\item\pnj.com.vn.png" height="40px" width="80px">
        </a>
        <div class="button-show-hide">
            <i class="icon-chevron-left"></i>
        </div>
    </div>

    <div class="section-menu-left-wrap">
        <div class="center">
            <div class="center-item">
                <ul>
                    <!-- Bảng điều khiển -->
                    <li class="menu-item <?= (isset($_GET['act']) && $_GET['act'] == 'home') ? 'active' : '' ?>">
                        <a href="?role=admin&act=home">
                            <div class="icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2652 3.57566C12.1187 3.42921 11.8813 3.42921 11.7348 3.57566L5.25 10.0605V19.8748C5.25 20.0819 5.41789 20.2498 5.625 20.2498H9V16.1248C9 15.0893 9.83947 14.2498 10.875 14.2498H13.125C14.1605 14.2498 15 15.0893 15 16.1248V20.2498H18.375C18.5821 20.2498 18.75 20.0819 18.75 19.8748V10.0605L12.2652 3.57566ZM20.25 11.5605L21.2197 12.5302C21.5126 12.8231 21.9874 12.8231 22.2803 12.5302C22.5732 12.2373 22.5732 11.7624 22.2803 11.4695L13.3258 2.51499C12.5936 1.78276 11.4064 1.78276 10.6742 2.515L1.71967 11.4695C1.42678 11.7624 1.42678 12.2373 1.71967 12.5302C2.01256 12.8231 2.48744 12.8231 2.78033 12.5302L3.75 11.5605V19.8748C3.75 20.9104 4.58947 21.7498 5.625 21.7498H18.375C19.4105 21.7498 20.25 20.9104 20.25 19.8748V11.5605ZM13.5 20.2498H10.5V16.1248C10.5 15.9177 10.6679 15.7498 10.875 15.7498H13.125C13.3321 15.7498 13.5 15.9177 13.5 16.1248V20.2498Z" fill="#111111"/>
                                </svg>
                            </div>
                            <div class="text">Dashboard</div>
                        </a>
                    </li>

                    <!-- Quản lý sản phẩm -->
                    <li class="menu-item has-children <?= (isset($_GET['act']) && in_array($_GET['act'], ['all-product', 'add-product'])) ? 'active' : '' ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-file-plus"></i></div>
                            <div class="text">Quản lý sản phẩm</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="?role=admin&act=all-product">
                                    <div class="text">Danh sách sản phẩm</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="?role=admin&act=add-product">
                                    <div class="text">Thêm sản phẩm</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Quản lý danh mục -->
                    <li class="menu-item has-children
                                    <?php
                                        if(isset($_GET['act']) && $_GET['act'] == 'all-category'|| $_GET['act'] == 'add-category'){
                                            echo 'active';
                                        }
                                    ?>
                                    ">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-layers"></i></div>
                                            <div class="text">Quản lý danh mục</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="?role=admin&act=all-category" class="">
                                                    <div class="text">Danh sách</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="?role=admin&act=add-category" class="">
                                                    <div class="text">Thêm mới</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                    <!-- Quản lý đơn hàng -->
                    <li class="menu-item has-children">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon">
                                                <svg width="24" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0001 2C8.34322 2 7.00008 3.34315 7.00008 5V5.75H13.0001V5C13.0001 3.34315 11.6569 2 10.0001 2ZM14.5001 5.75V5C14.5001 2.51472 12.4854 0.5 10.0001 0.5C7.51479 0.5 5.50008 2.51472 5.50008 5V5.75H3.51287C2.55332 5.75 1.74862 6.47444 1.64817 7.42872L0.385015 19.4287C0.268481 20.5358 1.13652 21.5 2.24971 21.5H17.7504C18.8636 21.5 19.7317 20.5358 19.6151 19.4287L18.352 7.42872C18.2515 6.47444 17.4468 5.75 16.4873 5.75H14.5001ZM13.0001 7.25H7.00008V8.66146C7.23023 8.86745 7.37508 9.16681 7.37508 9.5C7.37508 10.1213 6.8714 10.625 6.25008 10.625C5.62876 10.625 5.12508 10.1213 5.12508 9.5C5.12508 9.16681 5.26992 8.86745 5.50008 8.66146V7.25H3.51287C3.32096 7.25 3.16002 7.39489 3.13993 7.58574L1.87677 19.5857C1.85347 19.8072 2.02707 20 2.24971 20H17.7504C17.9731 20 18.1467 19.8072 18.1234 19.5857L16.8602 7.58574C16.8401 7.39489 16.6792 7.25 16.4873 7.25H14.5001V8.66146C14.7302 8.86746 14.8751 9.16681 14.8751 9.5C14.8751 10.1213 14.3714 10.625 13.7501 10.625C13.1288 10.625 12.6251 10.1213 12.6251 9.5C12.6251 9.16681 12.7699 8.86745 13.0001 8.66146V7.25Z" fill="#111111"/>
                                                </svg>
                                            </div>
                                            <div class="text">Quản lý đơn hàng</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="?role=admin&act=show-order">
                                                    <div class="text">Danh sách đơn hàng</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>   

                    <!-- Quản lý người dùng -->
                    <li class="menu-item has-children
                    <?php
                        if(isset($_GET['act']) && ($_GET['act'] == 'all-user' || $_GET['act'] == 'add-user' || $_GET['act'] == 'show-user' || $_GET['act'] == 'update-user')){
                            echo 'active';
                        }
                    ?>
                    ">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-user"></i></div>
                            <div class="text">Quản lý người dùng</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="?role=admin&act=all-user">
                                    <div class="text">Danh sách người dùng</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="?role=admin&act=add-user">
                                    <div class="text">Thêm người dùng</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Quản lý bình luận -->
                    <li class="menu-item">
                        <a href="?role=admin&act=comment-product" class="">
                            <div class="icon"><i class="icon-pie-chart"></i></div>
                            <div class="text">Quản lý bình luận</div>
                        </a>
                    </li>

                    <!-- Đăng xuất -->
                    <li class="menu-item">
                        <a href="?role=admin&act=logout">
                            <div class="icon">
                            <svg width="24" height="22" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.125 18.6875C8.125 18.903 8.0394 19.1097 7.88702 19.262C7.73465 19.4144 7.52799 19.5 7.3125 19.5H1.625C1.19402 19.5 0.780698 19.3288 0.475951 19.024C0.171205 18.7193 0 18.306 0 17.875V1.625C0 1.19402 0.171205 0.780698 0.475951 0.475951C0.780698 0.171205 1.19402 0 1.625 0H7.3125C7.52799 0 7.73465 0.0856026 7.88702 0.237976C8.0394 0.390349 8.125 0.597012 8.125 0.8125C8.125 1.02799 8.0394 1.23465 7.88702 1.38702C7.73465 1.5394 7.52799 1.625 7.3125 1.625H1.625V17.875H7.3125C7.52799 17.875 7.73465 17.9606 7.88702 18.113C8.0394 18.2653 8.125 18.472 8.125 18.6875ZM19.2623 9.17516L15.1998 5.11266C15.0474 4.9602 14.8406 4.87455 14.625 4.87455C14.4094 4.87455 14.2026 4.9602 14.0502 5.11266C13.8977 5.26511 13.812 5.47189 13.812 5.6875C13.812 5.90311 13.8977 6.10989 14.0502 6.26234L16.7263 8.9375H7.3125C7.09701 8.9375 6.89035 9.0231 6.73798 9.17548C6.5856 9.32785 6.5 9.53451 6.5 9.75C6.5 9.96549 6.5856 10.1722 6.73798 10.3245C6.89035 10.4769 7.09701 10.5625 7.3125 10.5625H16.7263L14.0502 13.2377C13.8977 13.3901 13.812 13.5969 13.812 13.8125C13.812 14.0281 13.8977 14.2349 14.0502 14.3873C14.2026 14.5398 14.4094 14.6255 14.625 14.6255C14.8406 14.6255 15.0474 14.5398 15.1998 14.3873L19.2623 10.3248C19.3379 10.2494 19.3978 10.1598 19.4387 10.0611C19.4796 9.9625 19.5006 9.85678 19.5006 9.75C19.5006 9.64322 19.4796 9.5375 19.4387 9.43886C19.3978 9.34023 19.3379 9.25062 19.2623 9.17516Z" fill="#111111"/>
                                </svg>
                            </div>
                            <div class="text">Đăng xuất</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
