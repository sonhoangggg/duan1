<?php

class OrderModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function getAllOrder(){
        $sql = "select * from `order`";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrderDetail(){
        $order_id = $_GET['order_id'];
        $sql = "SELECT order_detail.*, products.name, products.image_main, (order_detail.quantity * order_detail.price) AS total FROM `order_detail` JOIN products on order_detail.product_id = products.id WHERE order_detail.order_id = :order_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function changeStatusModel(){
        $order_id = $_POST['order_id'];
        $new_status = $_POST['status'];
    
        // Lấy trạng thái hiện tại của đơn hàng
        $sql = "SELECT `status` FROM `order` WHERE id = :order_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        $current_status = $stmt->fetchColumn();
    
        // Xác định các bước trạng thái hợp lệ
        $valid_transitions = [
            'pending' => ['shipping', 'canceled'], // Từ 'pending' có thể sang 'shipping' hoặc 'canceled'
            'shipping' => ['completed'],          // Từ 'shipping' chỉ có thể sang 'completed'
            'completed' => [],                    // 'completed' không thể thay đổi
            'canceled' => []                       // 'canceled' không thể thay đổi
        ];
    
        // Kiểm tra nếu trạng thái mới hợp lệ
        if (!isset($valid_transitions[$current_status]) || !in_array($new_status, $valid_transitions[$current_status])) {
            return false; // Trạng thái mới không hợp lệ, không cập nhật
        }
    
        // Cập nhật trạng thái đơn hàng
        $sql = "UPDATE `order` SET `status`=:status WHERE id = :order_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':status', $new_status);
        $stmt->bindParam(':order_id', $order_id);
        return $stmt->execute();
    }

}