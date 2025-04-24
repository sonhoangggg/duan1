<?php

class ProductUserModel {
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function getProductDashboard(){
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 12";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
    public function getDataShop(){
        $sql = "SELECT * FROM `products`";
        if(isset($_GET['category_id'])){
            $sql = $sql . " WHERE category_id = :category_id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':category_id', $_GET['category_id'] );
        } else{
            $stmt = $this->db->pdo->prepare($sql);
        }

        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getProductStock(){
        $sql1 = "SELECT COUNT(id) as instock FROM `products` where stock > 0";
        $query1 = $this->db->pdo->query($sql1);
        $inStock = $query1->fetch();

        $sql2 = "SELECT COUNT(id) as outstock FROM `products` where stock = 0";
        $query2 = $this->db->pdo->query($sql2);
        $outStock = $query2->fetch();
        return [$inStock, $outStock];
    }

    public function getDataShopName(){
        $productName = $_GET['product-name'];
        $sql = "SELECT * FROM `products` WHERE name like '%$productName%'";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function getProductById(){
        if(isset($_GET['product_id'])){
            $sql = "SELECT * FROM `products` WHERE id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id', $_GET['product_id'] );
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
    }

    public function getProductImageById(){
        if(isset($_GET['product_id'])){
            $sql = "SELECT * FROM `product_image` WHERE product_id = :id";
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id', $_GET['product_id'] );
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }

    public function getOtherProduct($categoryId, $productId){
        $sql = "SELECT * FROM `products` WHERE category_id = :category_id and id != :productId";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getComment($productId){
        $sql = "SELECT product_comment.*, users.name, users.image FROM `product_comment` JOIN users on product_comment.user_id = users.id where product_comment.product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function saveRating(){
        $sql = "select * from product_rating where user_id = :user_id and product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['users']['id']);
        $stmt->bindParam(':product_id', $_POST['productId']);
        $stmt->execute();
        if($stmt->fetch()){     
        $sql = "UPDATE `product_rating` SET `rating`=:rating WHERE user_id = :user_id and product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['users']['id']);
        $stmt->bindParam(':rating', $_POST['rate']);
        $stmt->bindParam(':product_id', $_POST['productId']);
        return $stmt->execute();
        }

        $productId = $_POST['productId'];
        $rate =  $_POST['rate'];
        $userid = $_SESSION['users']['id'];
        $now = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `product_rating`(`product_id`, `user_id`, `rating`, `created_at`) VALUES (:product_id, :user_id, :rating, :created_at)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':user_id', $userid);
        $stmt->bindParam(':rating', $rate);
        $stmt->bindParam(':created_at', $now);
        return $stmt->execute();
    }

    public function saveComment(){
        $productId = $_POST['productId'];
        $userid = $_SESSION['users']['id'];
        $comment = $_POST['comment'];
        $now = date('Y-m-d H:i:s');
        $parent = null;

        $sql = "INSERT INTO `product_comment`(`product_id`, `user_id`, `comment`, `created_at`, `parent`) VALUES (:product_id, :user_id, :comment, :created_at, :parent)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':user_id', $userid);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':created_at', $now);
        $stmt->bindParam(':parent', $parent);
        return $stmt->execute();
    }

    public function getCommentByUser($productId, $userId){
        $sql = "select * from product_rating where user_id = :user_id and product_id= :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getRating($productId){
        $sql = "select * from product_rating where product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function avgRating($productId){
        $sql = "SELECT avg(rating) as avgRating FROM `product_rating` WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        
        $result = $stmt->fetch();
        $avgRating = $result->avgRating;
    
        // Kiểm tra nếu avgRating là null, trả về 0
        return $avgRating !== null ? round($avgRating, 1) : 0;
    }
    
}