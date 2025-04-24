<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";

// Đăng nhập user
if ($role == "user") {
    switch($act){
        case '': {
            $dashBoardController = new DashboardController();
            $dashBoardController->dashboard();
            break;
        }

        case 'login': {
            $loginController = new LoginUserController();
            $loginController->login();
            break;
        }

        case 'post-login': {
            $loginController = new LoginUserController();
            $loginController->postLogin();
            break;
        }

        case 'logout': {
            $loginController = new LoginUserController();
            $loginController->logout();
            break;
        }

        case 'register': {
            $loginController = new LoginUserController();
            $loginController->register();
            break;
        }

        case 'post-register': {
            $loginController = new LoginUserController();
            $loginController->postRegister();
            break;
        }

        case 'my-account': {
            $dashBoardController = new DashboardController();
            $dashBoardController->myAccount();
            break;
        }
        case 'account-detail': {
            $dashBoardController = new DashboardController();
            $dashBoardController->accountDetail();
            break;
        }
        case 'account-update': {
            $dashBoardController = new DashboardController();
            $dashBoardController->accountUpdate();
            break;
        }
        // Giỏ hàng
        case 'add-to-cart': {
            $dashBoardController = new DashboardController();
            $dashBoardController->addToCart();
            break;
        }
        
        case 'show-to-cart': {
            $dashBoardController = new DashboardController();
            $dashBoardController->showToCart();
            break;
        }
        case 'update-cart': {
            $dashBoardController = new DashboardController();
            $dashBoardController->updateToCart();
            break;
        }

        case 'shopping-cart': {
            $dashBoardController = new DashboardController();
            $dashBoardController->shoppingCart();
            break;
        }
        
        case 'check-out': {
            $dashBoardController = new DashboardController();
            $dashBoardController->checkout();
            break;
        }
        
        case 'submit-check-out': {
            $dashBoardController = new DashboardController();
            $dashBoardController->submitCheckout();
            break;
        }

        case 'shop': {
            $dashboardController = new DashboardController();
            $dashboardController->showShop();
            break;
        }
        case 'product-detail': {
            $dashboardController = new DashboardController();
            $dashboardController->productDetail();
            break;
        }
        case 'show-order': {
            $dashBoardController = new DashboardController();
            $dashBoardController->showOrder();
            break;
        }
        

        case 'show-order-detail': {
            $dashBoardController = new DashboardController();
            $dashBoardController->showOrderDetail();
            break;
        }
        
        case 'cancel-order': {
            $dashBoardController = new DashboardController();
            $dashBoardController->cancelOrder();
            break;
        }
        case 'write-review': {
            $dashBoardController = new DashboardController();
            $dashBoardController->writeReview();
            break;
        } 
    }
} else {
    // Đăng nhập Admin
    switch ($act) {
        case 'home':
            $homeController = new HomeController();
            $homeController->dashboard();
            break;

        case 'login':
            $loginController = new LoginController();
            $loginController->login();
            break;

        case 'post-login':
            $loginController = new LoginController();
            $loginController->postLogin();
            break;

        case 'logout':
            $loginController = new LoginController();
            $loginController->logout();
            break;

        // Quản lý user
        case 'all-user': {
            $userController = new UserController();
            $userController->getAllUser();
            break;
        }

        case 'show-user': {
            $userController = new UserController();
            $userController->showUser();
            break;
        }

        case 'add-user': {
            $userController = new UserController();
            $userController->addUser();
            break;
        }

        case 'post-add-user': {
            $userController = new UserController();
            $userController->addPostUser();
            break;
        }

        case 'update-user': {
            $userController = new UserController();
            $userController->updateUser();
            break;
        }

        case 'update-post-user': {
            $userController = new UserController();
            $userController->updatePostUser();
            break;
        }

        case 'delete-user': {
            $userController = new UserController();
            $userController->deleteUser();
            break;
        }

        // Quản lý sản phẩm
        case 'all-product': {
            $productController = new ProductController();
            $productController->showAllProduct();
            break;
        }

        case 'delete-product': {
            $productController = new ProductController();
            $productController->deleteProduct();
            break;
        }

        case 'add-product': {
            $productController = new ProductController();
            $productController->addProduct();
            break;
        }
        
        case 'add-post-product': {
            $productController = new ProductController();
            $productController->addPostProduct();
            break;
        }

        case 'update-product': {
            $productController = new ProductController();
            $productController->updateProduct();
            break;
        }

        case 'update-post-product': {
            $productController = new ProductController();
            $productController->updatePostProduct();
            break;
        }

        case 'show-product': {
            $productController = new ProductController();
            $productController->showProduct();
            break;
        }

        //quản lý danh mục
        case 'all-category':
            $categoryController = new CategoryController();
            $categoryController->getAllCategory();  
            break;

        case 'add-category':
            $categoryController = new CategoryController();
            $categoryController->addCategory();  
            break;

        case 'add-post-category':
            $categoryController = new CategoryController();
            $categoryController->addPostCategory();  
            break;
        
        case 'delete-category':
            $categoryController = new CategoryController();
            $categoryController->deleteCategory();   
            break;

        case 'update-category':
            $categoryController = new CategoryController();
            $categoryController->updateCategory();   
            break;
    
        case 'update-post-category':
            $categoryController = new CategoryController();
            $categoryController->updatePostCategory();  
            break;

        // Quản lý đơn hàng
        case 'show-order': {
            $orderController = new OrderController();
            $orderController->showOrder();
            break;
        }

        case 'show-order-detail': {
            $orderController = new OrderController();
            $orderController->showOrderDetail();
            break;
        }
        
        case 'order-change-status': {
            $orderController = new OrderController();
            $orderController->changeStatus();
            break;
        }
         //quản lý bình luận
         case 'comment-product':
            $commentModel = new CommentRatingController();
            $commentModel->showComment();  
            break;
        case 'comment-product-detail':
            $commentModel = new CommentRatingController();
            $commentModel->showCommentDetail();  
            break;
        case 'comment-reply':
            $commentModel = new CommentRatingController();
            $commentModel->commentReply();  
            break;    
        case 'comment-delete':
            $commentModel = new CommentRatingController();
            $commentModel->commentDelete();  
            break;
        default: {
            $commentRatingController = new CommentRatingController();
            $commentRatingController->showComment();
            break;
        }
    }

}
