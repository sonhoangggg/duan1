<?php
include 'app/Database/Database.php';

// Model
    // Admin
include 'app/Models/Admin/HomeModel.php';
include 'app/Models/Admin/CategoryModel.php';
include 'app/Models/Admin/ProductModel.php';
include 'app/Models/Admin/UserModel.php';
include 'app/Models/Admin/OrderModel.php';


 // User
 include 'app/Models/Users/LoginModel.php';
 include 'app/Models/Users/CartUserModel.php';
 include 'app/Models/Users/CategoryUserModel.php';
 include 'app/Models/Users/ProductUserModel.php';

// Controller
    // Admin
    include 'app/Controllers/Admin/ControllerAdmin.php';
    include 'app/Controllers/Admin/HomeController.php';
    include 'app/Controllers/Admin/LoginController.php';
    include 'app/Controllers/Admin/CategoryController.php';
    include 'app/Controllers/Admin/ProductController.php';
    include 'app/Controllers/Admin/UserController.php';
    include 'app/Controllers/Admin/OrderController.php';



    // User
    include 'app/Controllers/Users/LoginUserController.php';
    include 'app/Controllers/Users/DashboardController.php';

include 'router/web.php';

