<?php

$act = isset($_GET['act']) ? $_GET['act'] : "";

switch ($act){
    case 'home':
        {
        $homeController = new HomeController();
        $homeController->dashboard();
        break;
        }
        case 'product':{
            break;
        }
        default:{
            $homeController = new HomeController();
            $homeController->dashboard();
            break;
        }
}