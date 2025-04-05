<?php
class CategoryModel
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Lấy tất cả danh mục
    public function allCategory()
    {
        $sql = "SELECT * FROM categories";
        $query = $this->db->pdo->query($sql);
        return $query->fetchAll();
    }
    
    public function addCategoryDB($destPath)
    {
        $name = $_POST['name'];
        $image = $destPath;
        $sql = "INSERT INTO categories (name, image) VALUES (:name, :image)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);

        return $stmt->execute();
    }

    public function countProductsByCategory($categoryId)
{
    $sql = "SELECT COUNT(*) FROM products WHERE category_id = :category_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn();
}

    public function deleteCategory($id)
{
    // Kiểm tra xem danh mục có sản phẩm hay không
    $sql = "SELECT COUNT(*) FROM products WHERE category_id = :id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $productCount = $stmt->fetchColumn();

    if ($productCount > 0) {
        // Nếu còn sản phẩm, không cho phép xóa
        return false;
    }

    // Lấy thông tin danh mục để xóa ảnh (nếu có)
    $category = $this->getCategoryByID($id);

    if ($category && !empty($category->image)) {
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($category->image, '/');
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Tiến hành xóa danh mục
    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}


    // Lấy danh mục theo ID
    public function getCategoryByID($id)
    {
    $sql = "SELECT id, name AS category_name, image FROM categories WHERE id = :id"; // Giữ nguyên tên cột
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_OBJ); // Đảm bảo trả về dạng đối tượng
    }
    
    public function updateCategoryToDB($id, $destPath)
    {
        $name = $_POST['name'];
        $category = $this->getCategoryByID($id);

        if (!$category) {
            return false; // Nếu danh mục không tồn tại
        }

        // Nếu có ảnh mới, cập nhật đường dẫn; nếu không, giữ nguyên ảnh cũ
        $image = !empty($destPath) ? $destPath : $category->image;

        // Nếu có ảnh mới, xóa ảnh cũ
        if (!empty($destPath) && !empty($category->image)) {
            if (file_exists($category->image)) {
                unlink($category->image);
            }
        }

        $sql = "UPDATE categories SET name = :name, image = :image WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);

        return $stmt->execute();
    }
}
