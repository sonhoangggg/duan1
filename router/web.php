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

    }
}else{
        // Đăng nhập Admin
        switch ($act) {
            case 'home':
                $homeController = new HomeController();
                $homeController->dashboard();
                break;
            }
}