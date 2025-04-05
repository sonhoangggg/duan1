<?php
class HomeController extends ControllerAdmin
{
    public function dashboard()
    {
        // Lấy doanh thu và số đơn hàng
        $orderModel = new OrderModel();
        $revenue = $orderModel->doanhThu();
        $totalOrders = $orderModel->tongDonHang();
        include 'app/Views/Admin/index.php';
    }
}
