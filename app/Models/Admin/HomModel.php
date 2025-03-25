<?php
class HomModel{
    public $db;
    public function __construct(){
        $this->db = new Datebase();

    }

    public function getUsers(){
        $sql ="SELECT * FROM users";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetch( );
        return $result;
    }
    
        
    
}