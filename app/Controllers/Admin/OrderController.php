<?php

class OrderController{

    public function showOrder(){
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrder();
        include 'app/Views/Admin/show-order.php';
    }
    public function showOrderDetail(){
        $orderModel = new OrderModel();
        $order_detail = $orderModel->getOrderDetail();
        include 'app/Views/Admin/show-order-detail.php';
    }
}