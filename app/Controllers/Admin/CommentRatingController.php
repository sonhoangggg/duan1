<?php

class CommentRatingController extends ControllerAdmin{
    public function showComment(){
        $productModel = new ProductModel();
        $listProduct = $productModel->getAllProduct();

        $commentRatingModel = new CommentRatingModel();

        foreach($listProduct as $key => $value){
            $listProduct[$key]->avgRating = $commentRatingModel->avgRating($value->id);
            $listProduct[$key]->countComment = $commentRatingModel->countComment($value->id);
        }

        include 'app/Views/Admin/comment.php';
    }

    public function showCommentDetail(){
        $productModel = new ProductModel();
        $product = $productModel->getProductByID();

        $commentRatingModel = new CommentRatingModel();
        $commentDetail = $commentRatingModel->showCommentDetail();

        include 'app/Views/Admin/comment-detail.php';
    }

    public function commentReply(){
        $commentRatingModel = new CommentRatingModel();
        $commentRatingModel->replyCommentModel();

        header("Location:" . BASE_URL . "?role=admin&act=comment-detail&id=" . $_POST['product-id']);
    }

    public function commentDelete(){
        $commentRatingModel = new CommentRatingModel();
        $commentRatingModel->commentDeleteModel();

        header("Location:" . BASE_URL . "?role=admin&act=comment-detail&id=" . $_POST['productId']);

    }
}