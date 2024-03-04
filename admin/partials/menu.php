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
    <title>Food Order Website - Home page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../css/admin.css">
</head>
<body>
    <!-- Menu Section Start -->
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li><a href="<?= SITEURL; ?>admin/index.php">Home</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/admin">Admin Manager</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/admin/manage-user.php">User Manager</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/category">Category</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/food">Food</a></li>
                <li><a href="<?= SITEURL; ?>admin/layout/order">Order</a></li>
                <li><a href="<?= SITEURL; ?>admin/controllers/authen/logOut.php">Log out</a></li>
            </ul>

        </div>
    </div>
    <!-- Menu Section End -->