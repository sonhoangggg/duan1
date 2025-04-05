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

    public function getOrderDetail()
    {
        $order_id = $_GET['order_id'];
        $sql = "SELECT order_detail.*, products.name, products.image_main, (order_detail.quantity * order_detail.price) AS total FROM `order_detail` JOIN products on order_detail.product_id = products.id WHERE order_detail.order_id = :order_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function changeStatusModel()
    {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];

        $sql = "UPDATE `order` SET `status`=:status WHERE id = :order_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':order_id', $order_id);
        return $stmt->execute();
    }

    public function doanhThu()
    {
        $sql = "SELECT SUM(total) AS revenue FROM `order` WHERE status = 'completed'";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['revenue'] : 0;
    }

    public function tongDonHang()
    {
        $sql = "SELECT COUNT(*) AS total_orders FROM `order` WHERE status = 'completed'";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int) $result['total_orders'] : 0;
    }
}
