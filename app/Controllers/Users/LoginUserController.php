<?php
class LoginUserController{
    public function login(){
        include 'app/Views/Users/login.php';
    }

    public function postLogin(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $loginModel = new LoginModel();
          $dataUsers = $loginModel->checkLogin();
          if($dataUsers){
              $_SESSION['users'] = [
                  'id' => $dataUsers->id,
                  'name' => $dataUsers->name,
                  'email' => $dataUsers->email
              ];
              header("Location: " . "?act" );
              exit;
          }else{
              $_SESSION['error'] = "Email hoặc Password không đúng!";
              header("Location: " . "?act=login");
              exit;
          }
      } 
    }
    public function logout(){
        if(isset($_SESSION['users'])){
            unset($_SESSION['users']);
        }
        header("Location: " . "?act");
        exit;
    }

    public function register(){
        include 'app/Views/Users/register.php';
    }

    public function postRegister(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $loginModel = new LoginModel();
            $message = $loginModel->addUserToDB();

            if($message){
                $_SESSION['message'] = 'Đăng kí thành công';
                header("Location: " . "?act=login");
                exit;
            }else{
                $_SESSION['message'] = 'Đăng kí không thành công';
                header("Location: " . "?act=register");
                exit;
            }
        }
    }
}