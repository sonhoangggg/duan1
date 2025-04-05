<?php

class OrderController{

    public function showOrder(){
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrder();
        include 'app/Views/Admin/show-order.php';
    }

    
}