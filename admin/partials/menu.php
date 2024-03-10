<?php 
session_start();
require_once('../../db/db_func.php');
if(empty($_SESSION['role_id'])){
    header("Location: ". SITEURL . "login.php");
}
else {
    if($_SESSION['role_id'] != 1){
        header("Location: ". SITEURL);
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../css/admin.css">
</head>
<body>
    <!-- Menu Section Start -->
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li><a href="<?= SITEURL; ?>admin/index.php">Trang chủ</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/admin">Quản lý admin</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/admin/manage-user.php">Quản lý người dùng</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/category">Quản lý danh mục</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/food">Quản lý sản phẩm</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/order">Quản lý đơn hàng</a></li>
                <li><a href="<?= SITEURL; ?>admin/controllers/authen/logOut.php">Đăng xuất</a></li>
            </ul>

        </div>
    </div>
    <!-- Menu Section End -->