<?php
class ControllerAdmin{
    public function __construct(){
        if(!isset($_SESSION['users'])){
            $_SESSION['error'] = "Bạn phải đăng nhập trước!";
            header("Location: ?role=admin&act=login");
            exit;
        }
    }
}