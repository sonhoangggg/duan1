<?php

class CartUserModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function addCartModel(){
        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];
        $userId = $_SESSION['users']['id'];
        $now = date('Y-m-d H:i:s');

        $sql = "select * from cart where user_id = :user_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $cart = $stmt->fetch();
        if(!$cart){
            $sql = "INSERT INTO `cart`(`user_id`, `created_at`, `updated_at`) VALUES (:user_id, :created_at, :updated_at)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':created_at', $now);
            $stmt->bindParam(':updated_at', $now);

            if($stmt->execute()){
                // Lấy ID của sản phẩm mới thêm
                $cartId = $this->db->pdo->lastInsertId();
            }else{
                return false;
            }
        }else{
            $cartId = $cart->id;
        }

        $sql = "select * from cart_detail where cart_id = :cart_id and product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':cart_id', $cartId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        $cartDetail = $stmt->fetch();
        if($cartDetail){
            $sql = "UPDATE `cart_detail` SET `quantity`= :quantity WHERE id = :cart_detail_id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':cart_detail_id', $cartDetail->id);
            $newQuantity = intval($cartDetail->quantity) + intval($quantity);
            $stmt->bindParam(':quantity', $newQuantity);
            $stmt->execute();
        }else{
            $sql = "INSERT INTO `cart_detail`(`cart_id`, `product_id`, `quantity`) VALUES (:cart_id, :product_id, :quantity)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
        }

        $sql = "select cart_detail.*, products.name, products.image_main, products.price, products.price_sale from cart_detail JOIN products on cart_detail.product_id = products.id where cart_detail.cart_id = :cart_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':cart_id', $cartId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function showCartModel(){
        $userId = $_SESSION['users']['id'];
        $sql = "select * from cart where user_id = :user_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $cart = $stmt->fetch();
        if(!$cart){
            $sql = "INSERT INTO `cart`(`user_id`, `created_at`, `updated_at`) VALUES (:user_id, :created_at, :updated_at)";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':created_at', $now);
            $stmt->bindParam(':updated_at', $now);

            if($stmt->execute()){
                // Lấy ID của sản phẩm mới thêm
                $cartId = $this->db->pdo->lastInsertId();
            }else{
                return false;
            }
        }else{
            $cartId = $cart->id;
        }

        $sql = "select cart_detail.*, products.name, products.image_main, products.price, products.price_sale from cart_detail JOIN products on cart_detail.product_id = products.id where cart_detail.cart_id = :cart_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':cart_id', $cartId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateCartModel(){
        $cart_detail_Id = $_POST['cart_detail_id'];
        $action = $_POST['action']; // increase, decrease, deleted

        switch ($action){
            case 'increase':{
                $sql = "UPDATE `cart_detail` SET `quantity` = quantity + 1 WHERE id = :cart_detail_id";
                $stmt = $this->db->pdo->prepare($sql);
                $stmt->bindParam(':cart_detail_id', $cart_detail_Id);
                $stmt->execute();
                break;
            }

            case 'decrease':{
                $sql = "UPDATE `cart_detail` SET `quantity`= quantity - 1 WHERE id = :cart_detail_id and quantity > 1";
                $stmt = $this->db->pdo->prepare($sql);
                $stmt->bindParam(':cart_detail_id', $cart_detail_Id);
                $stmt->execute();
                break;
            }

            case 'deleted':{
                $sql = "DELETE FROM `cart_detail` WHERE id = :cart_detail_id";
                $stmt = $this->db->pdo->prepare($sql);
                $stmt->bindParam(':cart_detail_id', $cart_detail_Id);
                $stmt->execute();
                break;
            }
        }
        return $this->showCartModel();
    }

    public function deleteCartDetail(){
        $userId = $_SESSION['users']['id'];
        $sql = "SELECT * FROM `cart` WHERE user_id = :user_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $cart = $stmt->fetch();
        if($cart){
            $sql = "DELETE FROM `cart_detail` WHERE cart_id = :cart_id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':cart_id', $cart->id);
            return $stmt->execute();
        }
        return false;
    }
}