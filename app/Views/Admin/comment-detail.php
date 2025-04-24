<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->
<style>
    
</style>

<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:29 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Vongtey - Website bán vòng tay  hàng đầu VN</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
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
                                    if(isset($_SESSION['message'])){
                                            echo "<p>" . $_SESSION['message'] . "</p>";
                                            unset($_SESSION['message']);
                                        }
                                ?>
                                    <div class="title-box">
                                        Danh sách bình luận của sản phẩm 
                                    </div>
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <!-- <div class="show">
                                                <div class="text-tiny">Showing</div>
                                                <div class="select">
                                                    <select class="">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                    </select>
                                                </div>
                                                <div class="text-tiny">entries</div>
                                            </div> -->
                                            <!-- <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form> -->
                                        </div>
                                    
                                    </div>
                                    <div class="wg-table table-product-list">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li>
                                                <div class="body-title">STT</div>
                                            </li>    
                                            <li>
                                                <div class="body-title">Tên khách hàng</div>
                                            </li>
                                            <li>
                                                <div class="body-title">Nội dung</div>
                                            </li>      
                                            <li>
                                                <div class="body-title">Ngày bình luận</div>
                                            </li>                                           
                                            <li>
                                                <div class="body-title">Hành động</div>
                                            </li>
                                        </ul>
                                        <ul class="flex flex-column">
                                            <?php foreach($commentDetail as $key => $value): ?>
                                                <li class="wg-product item-row ">
                                                    <div style="font-size:20px;font-weight: bold;" class="body-text text-main-dark mt-4"><?= $key+ 1?></div>
                                                    <div style="font-size:15px;font-weight: bold;" class="body-text text-main-dark mt-4"><?= $value->name?></div>
                                                    <div style="font-size:15px;font-weight: 500;" class="body-text text-main-dark mt-4">
                                                        <?= $value->comment ?>
                                                    </div>  
                                                    <div style="font-size:15px;font-weight: bold;" class="body-text text-main-dark mt-4">
                                                        <?=date("d/m/Y", strtotime($value->created_at)) ?> 
                                                    </div>
                                                    
                                                    <div class="list-icon-function">
                                                        <div class="item eye">
                                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal" data-commnet="<?= $value->id ?>">Trả lời</button>
                                                        </div>
                                                        <form action="?role=admin&act=comment-delete" method="post">
                                                            <input type="hidden" name="productId" value="<?= $product->id ?>">
                                                            <input type="hidden" name="commentId" value="<?= $value->id ?>">
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa không')"> Xóa</button>
                                                        </form>                                                
                                                        
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <!-- <div class="divider"></div> -->
                                    <!-- <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 entries</div>
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
                                    </div> -->
                                </div>
                            </div>
                            </div>
                            <!-- /main-content-wrap -->
                        </div>

                        <!-- Modal -->  
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                            <div class="modal-dialog">  
                                <div class="modal-content">  
                                    <div class="modal-header">  
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>  
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                                    </div>  
                                    <form action="?role=admin&act=comment-reply" method="post">  
                                        <input type="hidden" name="product-id" value="<?= $product->id ?>">  
                                        <input type="hidden" name="comment-id" id="comment-id">  
                                        <div class="modal-body">  
                                            <textarea name="reply" class="from-control" placeholder="Nội dung trả lời"></textarea>
                                        </div>  
                                        <div class="modal-footer">  
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>  
                                            <button type="submit" class="btn btn-primary">Trả lời</button>  
                                        </div>  
                                    </form>  
                                </div>  
                            </div>  
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
    let commentId = document.querySelector('#comment-id');  

    var exampleModal = document.getElementById('exampleModal');  
    exampleModal.addEventListener('show.bs.modal', function(event) {  
        var button = event.relatedTarget;  
        var id = button.getAttribute('data-commnet')
        commentId.value = id 

        // Cập nhật nội dung cho modal.  
        // var modalTitle = exampleModel.querySelector('.modal-title');  
        // var modalBodyInput = exampleModel.querySelector('.modal-body input');  

        // modalTitle.textContent = 'Tin nhắn mới đến ' + recipient  
        // modalBodyInput.value = recipient;  
    })

    </script>

</body>


<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:54 GMT -->
</html>