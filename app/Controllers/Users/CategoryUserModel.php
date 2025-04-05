<?php
class CategoryUserModel {
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCategoryDB(){
        $sql = "select * from categories";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getCategoryById($id){
        $sql = "SELECT * FROM categories WHERE id = :id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;

    }
}
