<?php

class LoginModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function checkLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email = :email and role = 2";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();
        if($result && password_verify($password, $result->password)){
            return $result;
        }
        
        return false;  
    }

    public function addUserToDB(){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $now = date('Y-m-d H:i:s');
      $role = "2";

      // Check email exists
      $sqlCheck = "select * from users where email = :email";
      $stmt1 = $this->db->pdo->prepare($sqlCheck);
      $stmt1->bindParam(':email', $email);
      $stmt1->execute();
      if(count($stmt1->fetchAll()) > 0){
          return false;
      }


      $sql = "
          INSERT INTO users(name, email, password, role) 
          VALUES (:name, :email, :password, :role)
      ";
      
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':role', $role);
      
      return $stmt->execute();
    }
}