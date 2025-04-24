<?php
class CategoryController extends ControllerAdmin {
    public function getAllCategory() {
        $categoryModel = new CategoryModel();
        $listCategory = $categoryModel->allCategory();

        include 'app/Views/Admin/categories.php';
    }

    public function addCategory() {
        include 'app/Views/Admin/add-category.php';
    }

    public function addPostCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$this->checkValidate()) {
                header("Location: " . BASE_URL . "?role=admin&act=add-category");
                exit;
            } 

            // Xử lý hình ảnh
            $uploadDir = 'assets/Admin/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = "";

            if (!empty($_FILES['image']['name'])) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $newFileName = uniqid() . '.' . $fileExtension;

                if (in_array($fileType, $allowedTypes)) {
                    $destPath = $uploadDir . $newFileName;
                    if (!move_uploaded_file($fileTmpPath, $destPath)) {
                        $destPath = "";
                    }
                }
            }

            $categoryModel = new CategoryModel();
            $message = $categoryModel->addCategory($destPath);

            if ($message) {
                $_SESSION['message'] = 'Thêm mới thành công';
                header("Location: " . BASE_URL . "?role=admin&act=all-category");
                exit;
            } else {
                $_SESSION['message'] = 'Thêm mới không thành công';
                header("Location: " . BASE_URL . "?role=admin&act=add-category");
                exit;
            }
        }
    }

    public function checkValidate() {
        $name = $_POST['name'];

        if ($name != "") {
            return true;
        } else {
            $_SESSION['error'] = "Bạn nhập thiếu thông tin";
            return false;
        }
    }

    public function deleteCategory() {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = 'Vui lòng chọn Category cần xóa';
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }

        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByID();

        // Xóa ảnh nếu có
        if ($category->image != "" && $category->image != null) {
            unlink($category->image);
        }

        $message = $categoryModel->deleteCategory();

        if ($message) {
            $_SESSION['message'] = 'Xóa thành công';
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        } else {
            $_SESSION['message'] = 'Xóa không thành công';
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }
    }

    public function updateCategory() {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = 'Vui lòng chọn Category cần sửa';
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }

        $categoryModel = new CategoryModel();  
        $category = $categoryModel->getCategoryByID();

        include 'app/Views/Admin/update-category.php';
    }

    public function updatePostCategory() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_GET['id'])) {
                $_SESSION['message'] = 'Vui lòng chọn Category cần sửa';
                header("Location: " . BASE_URL . "?role=admin&act=all-category");
                exit;
            }

            if (!$this->checkValidate()) {
                header("Location: " . BASE_URL . "?role=admin&act=update-category&id=" . $_GET['id']);
                exit;
            } 

            $categoryModel = new CategoryModel();
            $category = $categoryModel->getCategoryByID();

            // Xử lý hình ảnh
            $uploadDir = 'assets/Admin/upload/';
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $destPath = $category->image;

            if (!empty($_FILES['image']['name'])) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $newFileName = uniqid() . '.' . $fileExtension;

                if (in_array($fileType, $allowedTypes)) {
                    $destPath = $uploadDir . $newFileName;
                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        // Xóa ảnh cũ nếu có
                        if (!empty($category->image)) {
                            unlink($category->image);
                        }
                    } else {
                        $destPath = $category->image;
                    }
                }
            }

            $message = $categoryModel->updateCategoryToDB($destPath);

            if ($message) {
                $_SESSION['message'] = 'Chỉnh sửa thành công';
                header("Location: " . BASE_URL . "?role=admin&act=all-category");
                exit;
            } else {
                $_SESSION['message'] = 'Chỉnh sửa không thành công';
                header("Location: " . BASE_URL . "?role=admin&act=update-category&id=" . $_GET['id']);
                exit;
            }
        }
    }

    public function showCategory() {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = 'Vui lòng chọn Category cần xem';
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }

        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryByID();

        include 'app/Views/Admin/show-category.php';
    }
}
