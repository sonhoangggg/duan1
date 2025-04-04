<?php
 class Datebase {
    public $pdo;
    public function __construct()
    {
        $host ="localhost";
        $db = "du_an_vong_tay_cao_cap";
        $user = "root";
        $password = "";
        $port="3306";

        $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=UTF8";
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
 }