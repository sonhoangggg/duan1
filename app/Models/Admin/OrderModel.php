<?php

class OrderModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllOrder()
    {
        $sql = "select * from `order`";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function doanhThu(){
        $sql = "SELECT SUM(total) AS revenue FROM `order` WHERE status = 'completed'";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['revenue'] : 0;

    }
    public function tongDonHang(){

    }

   
}
