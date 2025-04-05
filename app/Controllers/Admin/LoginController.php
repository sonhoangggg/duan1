<?php
class LoginController{
    public function login(){
        include 'app/Views/Admin/login.php';
    }

    public function postLogin(){
        $homeModel = new HomeModel();
        $dataUsers = $homeModel->checkLogin();

        if($dataUsers){
            $_SESSION['users'] = [
                'id' => $dataUsers->id,
                'name' => $dataUsers->name,
                'email' => $dataUsers->email
            ];
            header("Location: ?role=admin&act=home");
            exit;
        }else{
            $_SESSION['error'] = "Email hoặc Password không đúng!";
            header("Location: ?role=admin&act=login");
            exit;
        }
    }

    public function logout(){
        if(isset($_SESSION['users'])){
            unset($_SESSION['users']);
        }
        $_SESSION['error'] = "Đăng xuất thành công";
            header("Location: ?role=admin&act=login");
            exit;
    }
}