<?php

class ProductModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }
    
    // danh sách sp
    public function getAllProduct(){
        $sql = "SELECT products.id, products.name, products.price, products.price_sale, products.category_id, products.stock
        , products.image_main, categories.name AS categoryName FROM `products` join categories on products.category_id = categories.id";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    // lấy id
    public function getProductByID()
    {
    $id = $_GET['id'];
    $sql = "
    select * from products where id = :id
    ";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
    return $stmt->fetch();
    }
    return false;
    }

    // lấy id hình ảnh
    public function getProductImageById($productId) {
        $sql = "SELECT * FROM product_image WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute([':product_id' => $productId]);
        return $stmt->fetchAll();
    }

    // xóa sản phẩm
    public function delete(){
        $id = $_GET['id'];
        $sqlProductImage = "DELETE FROM `product_image` WHERE product_id = :product_id";
        $stmt1 = $this->db->pdo->prepare($sqlProductImage);
        $stmt1->bindParam(':product_id', $id);

        $sqlProduct = "DELETE FROM `products` WHERE id = :id";
        $stmt2 = $this->db->pdo->prepare($sqlProduct);
        $stmt2->bindParam(':id', $id);

        if($stmt1->execute() && $stmt2->execute()){
            return true;
        }else{
            return false;
        }
    }

    // thêm sp
    public function addProductToDB($destPath) {
        $data = [
            ':name' => $_POST['name'],
            ':category_id' => $_POST['category'],
            ':description' => $_POST['description'],
            ':price' => $_POST['price'],
            ':price_sale' => is_numeric($_POST['pricesale'] ?? null) ? $_POST['pricesale'] : null,
            ':stock' => $_POST['stock'],
            ':image_main' => $destPath
        ];
    
        $sql = "
            INSERT INTO `products`(`name`, `category_id`, `description`, `price`, `price_sale`, `stock`, `image_main`) 
            VALUES (:name, :category_id, :description, :price, :price_sale, :stock, :image_main)
        ";
    
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute($data) ? $this->db->pdo->lastInsertId() : false;
    }

    public function addGalleryImage($destPathImage, $idProduct)
    {
        $sql = "INSERT INTO `product_image`(`product_id`, `image`) VALUES (:product_id, :image)";
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute([':product_id' => $idProduct, ':image' => $destPathImage]);
    }
    
    
    // sửa sp
    public function updateProductToDB($destPath)
    {
        $sql = "
            UPDATE `products` 
            SET 
                `name` = :name, 
                `category_id` = :category_id, 
                `description` = :description, 
                `price` = :price, 
                `price_sale` = :price_sale, 
                `stock` = :stock, 
                `image_main` = :image_main 
            WHERE 
                `id` = :id
        ";

        $stmt = $this->db->pdo->prepare($sql);

        return $stmt->execute([
            ':name' => $_POST['name'],
            ':category_id' => $_POST['category'],
            ':description' => $_POST['description'],
            ':price' => $_POST['price'],
            ':price_sale' => $_POST['pricesale'] ?? null,
            ':stock' => $_POST['stock'],
            ':image_main' => $destPath,
            ':id' => $_GET['id']
        ]);
    }
    public function deleteImageGarary($id)
    {
        $sql = "DELETE FROM `product_image` WHERE product_id = :product_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $id);
    
        return $stmt->execute();
    }
    
}