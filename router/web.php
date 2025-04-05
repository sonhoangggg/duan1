<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";

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

    }
}else{
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
        // quản lí sản phẩm
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
        // Quản lý user
        case 'all-user': {
            $userController = new UserController();
            $userController->getAllUser();
            break;
        }


    }
            
    
}