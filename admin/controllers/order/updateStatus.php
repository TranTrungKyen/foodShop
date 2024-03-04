<?php
session_start();
require_once('../../db/db_func.php');
if (isset($_GET['order_id']) && isset($_GET['status'])) {
    $order_id = $_GET['order_id'];
    $status = $_GET['status'];
    if ($status < 3) {
        $status++;
        // // Viet truy van
        $sql = "UPDATE `order` SET
        status = '$status'
        WHERE id = '$order_id'
        ";
        $res = excute($sql);
        if($res == TRUE){
            $_SESSION['noti'] = "<script>alert('Cập nhật tình trạng đơn hàng thành công')</script>";
        }
    }
    if($status == 3){
        header("Location: " . SITEURL . "orders.php");
    }else{
        header("Location: " . SITEURL . "admin/layout/order/index.php");
    }
}
