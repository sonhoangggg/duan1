<?php
class OrderUserModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function order($products){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $note = $_POST['note'];
        $total = $_POST['total'];
        $user_id = $_SESSION['users']['id'];
        $now = date('Y-m-d H:i:s');
        $status = "pending";

        $sql = "insert INTO `order`(`user_id`, `status`, `total`, `created_at`, `updated_at`, `name`, `address`, `phone`, `email`, `notes`) VALUES (:user_id, :status, :total, :created_at, :updated_at, :name, :address, :phone, :email, :notes)";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':created_at', $now);
        $stmt->bindParam(':updated_at', $now);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':notes', $note);


        if($stmt->execute()){
            $orderId = $this->db->pdo->lastInsertId();
            // Tạo mới order detail
            foreach ($products as $key => $value) {
                $sql = "INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES (:order_id, :product_id, :quantity, :price)";
                $stmt = $this->db->pdo->prepare($sql);
                $price_order = $value->price_sale != null ? $value->price_sale : $value->price;
                $stmt->bindParam(':order_id', $orderId);
                $stmt->bindParam(':product_id', $value->product_id);
                $stmt->bindParam(':quantity', $value->quantity);
                $stmt->bindParam(':price', $price_order);
                $stmt->execute();
            }
            return true;
        }else{
            return false;
        }
    }

    public function getAllOrder(){
        $user_id = $_SESSION['users']['id'];
        $sql = "select * from `order` where user_id = :user_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
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

    public function cancelOrderModel(){
        $order_id = $_GET['order_id'];
        $status = 'canceled';
        $sql = "update `order` SET `status`=:status WHERE id = :order_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':order_id', $order_id);
        return $stmt->execute();
    }
}