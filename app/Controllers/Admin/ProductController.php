<?php
class ProductController extends ControllerAdmin
{

    public function showAllProduct()
    {
        $productModel = new ProductModel();
        $listProduct = $productModel->getAllProduct();

        include 'app/Views/Admin/products.php';
    }

    // xem chi tiết sp
    public function showProduct()
    {
        $id = $_GET['id'];
        $productModel = new ProductModel();
        $product = $productModel->getProductByID($id);
        $listProductImage = $productModel->getProductImageById($id);
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByID($product->category_id);
        include 'app/Views/Admin/show-product.php';
    }

    public function deleteProduct() {
        $id = $_GET['id'];
        $productModel = new ProductModel();
    
        // Xóa ảnh chính của sản phẩm
        $product = $productModel->getProductByID($id);
        if ($product && !empty($product->image_main) && file_exists($product->image_main)) {
            unlink($product->image_main);
        }
    
        // Xóa ảnh liên quan trong bảng product_image
        $listImage = $productModel->getProductImageById($id);
        foreach ($listImage as $image) {
            if (!empty($image->image) && file_exists($image->image)) {
                unlink($image->image);
            }
        }
    
        // Xóa sản phẩm khỏi cơ sở dữ liệu
        if ($productModel->delete($id)) {
            $_SESSION['message'] = 'Xóa thành công';
        } else {
            $_SESSION['message'] = 'Xóa không thành công';
        }
    
        header("Location: ?role=admin&act=all-product");
        exit;
    }

    // Thêm sp
    public function addProduct(){
        $categoryModel = new CategoryModel();
        $listCategory = $categoryModel->allCategory();


        include 'app/Views/Admin/add-product.php';
    }

    public function checkValidate(){
        $name = $_POST['name'];
        $category = $_POST['category']; 
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        if($name != "" && $category != "" && $price != "" && $stock != ""){
            return true;
        }else{
            $_SESSION['error'] = "Bạn nhập thiếu thông tin !!!";
            return false;
        }
    }

    public function addPostProduct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$this->checkValidate()) {
                header("Location: ?role=admin&act=add-product");
                exit;
            }
    
            $uploadDir = 'assets/Admin/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = "";
    
            if (!empty($_FILES['image_main']['name'])) {
                $destPath = $this->uploadImage($_FILES['image_main'], $uploadDir, $allowedTypes);
            }
    
            $productModel = new ProductModel();
            $idProduct = $productModel->addProductToDB($destPath);
    
            if (!$idProduct) {
                $_SESSION['message'] = 'Thêm mới không thành công';
                header("Location: ?role=admin&act=add-product");
                exit;
            }
    
            if (isset($_FILES['image'])) {
                foreach ($_FILES['image']['name'] as $key => $name) {
                    if (!empty($name)) {
                        $destPathImage = $this->uploadImage(
                            ['name' => $name, 'tmp_name' => $_FILES['image']['tmp_name'][$key]],
                            $uploadDir,
                            $allowedTypes
                        );
                        $productModel->addGalleryImage($destPathImage, $idProduct);
                    }
                }
            }
    
            $_SESSION['message'] = 'Thêm mới thành công';
            header("Location: ?role=admin&act=all-product");
            exit;
        }
    }
    
        private function uploadImage($file, $uploadDir, $allowedTypes)
    {
        $fileTmpPath = $file['tmp_name'];
        $fileType = mime_content_type($fileTmpPath);
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '.' . $fileExtension;

        if (in_array($fileType, $allowedTypes)) {
            $destPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                return $destPath; // Trả về đường dẫn ảnh nếu upload thành công
            }
        }
        return null; // Trả về null nếu không upload được
    }
    
    public function updateProduct()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['message'] = 'ID sản phẩm không hợp lệ';
            header("Location: ?role=admin&act=all-product");
            exit;
        }
    
        $id = $_GET['id'];
    
        $categoryModel = new CategoryModel();
        $listCategory = $categoryModel->allCategory();
    
        $productModel = new ProductModel();
        $product = $productModel->getProductByID($id);
    
        if (!$product) {
            $_SESSION['message'] = 'Không tìm thấy sản phẩm';
            header("Location: ?role=admin&act=all-product");
            exit;
        }
    
        $listProductImage = $productModel->getProductImageById($id);
    
        include 'app/Views/Admin/update-product.php';
    }

    public function updatePostProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                $_SESSION['message'] = 'Vui lòng chọn sản phẩm cần sửa';
                header("Location: ?role=admin&act=all-product");
                exit;
            }
    
            $id = $_GET['id'];
    
            if (!$this->checkValidate()) {
                header("Location: ?role=admin&act=update-product&id=" . $id);
                exit;
            }
    
            $productModel = new ProductModel();
            $product = $productModel->getProductByID($id);
    
            if (!$product) {
                $_SESSION['message'] = 'Sản phẩm không tồn tại';
                header("Location: ?role=admin&act=all-product");
                exit;
            }
    
            // Xử lý ảnh chính
            $uploadDir = 'assets/Admin/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = $product->image_main;
    
            if (!empty($_FILES['image_main']['name'])) {
                $uploadedImage = $this->uploadImage($_FILES['image_main'], $uploadDir, $allowedTypes);
    
                if ($uploadedImage) {
                    $destPath = $uploadedImage;
                    if (!empty($product->image_main) && file_exists($product->image_main)) {
                        unlink($product->image_main);
                    }
                }
            }
    
            // Cập nhật ảnh chính
            if (!$productModel->updateProductToDB($destPath)) {
                $_SESSION['message'] = 'Chỉnh sửa không thành công';
                header("Location: ?role=admin&act=update-product&id=" . $id);
                exit;
            }
    
            // Xử lý ảnh phụ
            if (!empty($_FILES['image']['name'])) {
                $productModel->deleteImageGarary($id);
    
                foreach ($_FILES['image']['name'] as $key => $name) {
                    if (!empty($name)) {
                        $fileTmpPath = $_FILES['image']['tmp_name'][$key];
                        $fileType = mime_content_type($fileTmpPath);
                        $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        $newFileName = uniqid() . '.' . $fileExtension;
    
                        if (in_array($fileType, $allowedTypes)) {
                            $destPathImage = $uploadDir . $newFileName;
                            if (move_uploaded_file($fileTmpPath, $destPathImage)) {
                                $productModel->addGalleryImage($destPathImage, $id);
                            }
                        }
                    }
                }
            }
    
            $_SESSION['message'] = 'Chỉnh sửa thành công';
            header("Location: ?role=admin&act=all-product");
            exit;
        }
    }
    
}