<?php
session_start();

// Database
include 'app/Database/Database.php';

// Model
    // Admin
    include 'app/Models/Admin/HomeModel.php';
    include 'app/Models/Admin/ProductModel.php';
    include 'app/Models/Admin/UserModel.php';
    include 'app/Models/Admin/CategoryModel.php';
    include 'app/Models/Admin/OrderModel.php';
    include 'app/Models/Admin/CommentRatingModel.php';


    // User
    include 'app/Models/Users/LoginModel.php';
    include 'app/Models/Users/ProductUserModel.php';
    include 'app/Models/Users/CategoryUserModel.php';
    include 'app/Models/Users/UserModel2.php';
    include 'app/Models/Users/CartUserModel.php';
    include 'app/Models/Users/OrderUserModel.php';


// Controller
    // Admin
    include 'app/Controllers/Admin/ControllerAdmin.php';
    include 'app/Controllers/Admin/HomeController.php';
    include 'app/Controllers/Admin/LoginController.php';
    include 'app/Controllers/Admin/UserController.php';
    include 'app/Controllers/Admin/ProductController.php';
    include 'app/Controllers/Admin/CategoryController.php';
    include 'app/Controllers/Admin/OrderController.php';
    include 'app/Controllers/Admin/CommentRatingController.php';

    
    // User
    include 'app/Controllers/Users/LoginUserController.php';
    include 'app/Controllers/Users/DashboardController.php';
    const BASE_URL = "http://localhost/du_an_1_php/";

// Router 
include 'router/web.php';


