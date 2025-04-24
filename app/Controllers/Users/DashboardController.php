<?php
class DashboardController{
    public function dashboard(){
        $categoryModel = new CategoryUserModel();
        $listCategory = $categoryModel->getCategoryDashboard();

        $productModel = new ProductUserModel();
        $listProduct = $productModel->getProductDashboard();

        include 'app/Views/Users/index.php';
    }

    public function myAccount()
    {
        include 'app/Views/Users/myaccount.php';
    }
    public function accountDetail()
    {
        $userModel = new UserModel2();
        $user = $userModel->getCurrentUser();
        include 'app/Views/Users/account-detail.php';
    }
    public function accountUpdate()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->changePassword();


            $userModel = new UserModel2();
            $user = $userModel->getCurrentUser();
            // Thêm ảnh
            $uploadDir = 'assets/Admin/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = $user->image;

            if(!empty($_FILES['image']['name'])){
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $newFileName = uniqid() . '.' . $fileExtension;

                if(in_array($fileType, $allowedTypes)){
                    $destPath = $uploadDir . $newFileName;
                    if(!move_uploaded_file($fileTmpPath, $destPath)){
                        $destPath = "";
                    }
                    // Xóa ảnh cũ
                    unlink($user->image);
                }

            }

            $userModel = new UserModel2();
            $message = $userModel->updateCurrentUser($destPath);

            if($message){
                $_SESSION['message'] = 'Chỉnh sửa thành công';
                header("Location: " . BASE_URL . "?&act=account-detail");
                exit;
            }else{
                $_SESSION['message'] = 'Chỉnh sửa không thành công';
                header("Location: " . BASE_URL . "?&act=account-detail");
                exit;
            }
        }
    }

    public function changePassword(){
        if(
            $_POST['current-password'] != "" &&
            $_POST['new-password'] != "" &&
            $_POST['current-password'] != "" &&
            $_POST['new-password'] == $_POST['confirm-password']
        ){
            $userModel = new UserModel2();
            $userModel->changePassword($_POST['current-password'],$_POST['new-password']);
        }

    }
    public function showShop(){
        $productModel = new ProductUserModel();
        $listProduct = $productModel->getDataShop();

        $categoryModel = new CategoryUserModel();
        if (isset($_GET['category_id'])) {
            $category = $categoryModel->getCategoryById($_GET['category_id']);
        }

        $listCategory = $categoryModel->getCategoryDashboard();
        $stock = $productModel->getProductStock();

        if(isset($_GET['instock'])){
            $listProduct = array_filter($listProduct, function($product){
                return $product->stock > 0;
            });
        }

        if(isset($_GET['outstock'])){
            $listProduct = array_filter($listProduct, function($product){
                return $product->stock ==0;
            });
        }

        if(isset($_GET['min'])){
            $listProduct = array_filter($listProduct, function($product){
                if($product->price_sale != null){
                    return $product->price_sale >= $_GET['min'];
                }
                return $product->price > $_GET['min'];
            });
        }

        if(isset($_GET['max'])){
            $listProduct = array_filter($listProduct, function($product){
                if($product->price_sale != null){
                    return $product->price_sale <= $_GET['max'];
                }
                return $product->price < $_GET['max'];
            });
        }

        if(isset($_GET['product-name'])){
            $listProduct = $productModel->getDataShopName();
        }

        include 'app/Views/Users/shop.php';
        }

        public function productDetail(){
            $productModel = new ProductUserModel();
            $product = $productModel->getProductById();

            $productImage = $productModel->getProductImageById();
            $otherProduct = $productModel->getOtherProduct($product->category_id, $product->id);
            $comment = $productModel->getComment($product->id);
            foreach($comment as $key => $value){
                $rating = $productModel->getCommentByUser($product->id, $value->user_id);
                if($rating){
                    $comment[$key]->rating = $rating->rating;
                }else{
                    $comment[$key]->rating = null;
                }
            }
            $ratingProduct = $productModel->getRating($product->id);
            $ratingAvg = $productModel->avgRating($product->id);

            include 'app/Views/Users/product-detail.php';
        }

        public function writeReview(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $productModel = new ProductUserModel();
                $productModel->saveRating();
                $productModel->saveComment();
            }
            header("Location:" . BASE_URL . "?act=product-detail&product_id=" . $_POST['productId']);
        }

        public function addToCart(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $cartModel = new CartUserModel();
                $data = $cartModel->addCartModel();
                echo json_encode($data);
            }
        }

        public function showToCart(){
            $cartModel = new CartUserModel();
            $data = $cartModel->showCartModel();
            echo json_encode($data);
        }

        public function updateToCart(){
            $cartModel = new CartUserModel();
            $data = $cartModel->updateCartModel();
            echo json_encode($data);
        }

        public function shoppingCart(){
            $cartModel = new CartUserModel();
            $data = $cartModel->showCartModel();

            include 'app/Views/Users/shopping-cart.php';
        }

        public function checkout(){
            $userModel = new UserModel2();
            $currentUser = $userModel->getCurrentUser();

            $cartModel = new CartUserModel();
            $products = $cartModel->showCartModel();

            include 'app/Views/Users/check-out.php';
        }

        public function submitCheckout(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $cartModel = new CartUserModel();
                $products = $cartModel->showCartModel();

                $orderModel = new OrderUserModel();
                $addOrder = $orderModel->order($products);
                if($addOrder){
                    $cartModel->deleteCartDetail();

                    header("Location: " . BASE_URL);
                }
            }
        }

        public function showOrder(){
            $orderModel = new OrderUserModel();
            $orders = $orderModel->getAllOrder();

            include 'app/Views/Users/show-order.php';
        }

        public function showOrderDetail(){
            $orderModel = new OrderUserModel();
            $order_detail = $orderModel->getOrderDetail();

            include 'app/Views/Users/show-order-detail.php';
        }

        public function cancelOrder(){
            $orderModel = new OrderUserModel();
            $orderModel->cancelOrderModel();
            header("Location: " . BASE_URL . "?act=show-order");
        }
    }
