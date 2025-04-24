<?php
class Database{
    public $pdo;
    public function __construct(){
        $host = 'localhost';
        $db_name = 'du_an_vong_tay_cao_cap';
        $user = 'root';
        $password = '';
        $port = '3306';
        
        $dsn = "mysql:host=$host;dbname=$db_name;port=$port;charset=UTF8";
        try{
            $this->pdo = new PDO($dsn, $user, $password);
            if($this->pdo){
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}