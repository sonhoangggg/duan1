<?php
include 'app/Database/Database.php';

// Model
    // Admin
include 'app/Models/Admin/HomeModel.php';
include 'app/Models/Admin/CategoryModel.php';
include 'app/Models/Admin/ProductModel.php';

 // User
 include 'app/Models/Users/LoginModel.php';

// Controller
    // Admin
    include 'app/Controllers/Admin/ControllerAdmin.php';
    include 'app/Controllers/Admin/HomeController.php';
    include 'app/Controllers/Admin/LoginController.php';
    include 'app/Controllers/Admin/CategoryController.php';
    include 'app/Controllers/Admin/ProductController.php';

    // User
    include 'app/Controllers/Users/LoginUserController.php';
    include 'app/Controllers/Users/DashboardController.php';

include 'router/web.php';

