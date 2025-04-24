<?php
class CategoryModel{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function allCategory(){
        $sql = "select * from categories";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function addCategory($destPath){
        $name = $_POST['name'];
        $image = $destPath; // Đường dẫn ảnh được tải lên
        $sql = "INSERT INTO categories(name, image) VALUES (:name, :image)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);

        return $stmt->execute();
    }

    public function deleteCategory(){
        $id = $_GET['id'];
        $category = $this->getCategoryByID();

        // Xóa ảnh nếu tồn tại
        if ($category && !empty($category->image)) {
            unlink($category->image);
        }

        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute(); 
    }

    public function getCategoryByID(){
        $id = $_GET['id'];
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return $stmt->fetch();
        }
        return false;
    }

    public function updateCategoryToDB($destPath){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $category = $this->getCategoryByID();

        // Nếu có ảnh mới, cập nhật đường dẫn; nếu không, giữ nguyên ảnh cũ
        $image = !empty($destPath) ? $destPath : $category->image;

        // Nếu có ảnh mới, xóa ảnh cũ
        if (!empty($destPath) && $category && !empty($category->image)) {
            unlink($category->image);
        }

        $sql = "UPDATE categories SET name=:name, image=:image WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);

        return $stmt->execute(); 
    }
}
