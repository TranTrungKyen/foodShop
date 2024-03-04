<?php
session_start();
require_once('./db/db_func.php');
if (empty($_SESSION['role_id'])) {
    header("Location: " . SITEURL . "login.php");
} else {
    if ($_SESSION['role_id'] != 1) {
        header("Location: " . SITEURL);
    }
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
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
    <!-- Main Content Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>DASHBORAD</h1>
            <div class="row mt-16">
                <div class="col c-3 bg-white text-center px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM user WHERE role_id = '1' AND deleted ='0'";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Admins
                </div>
                <div class="col c-o-1 c-3 bg-white text-center px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM user WHERE role_id = '2' AND deleted ='0'";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Users
                </div>
                <div class="col c-o-1 c-3 bg-white text-center px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM category";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Categories
                </div>
            </div>
            <div class="row mt-16">
                <div class="col c-o-2 c-3 text-center bg-white px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM product WHERE deleted ='0'";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Foods
                </div>
                <div class="col c-o-1 c-3 text-center bg-white px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM `order`";
                    $count = '';
                    $res = excuteResult($sql);
                    if($res == TRUE){
                        $count = mysqli_num_rows($res);
                        if($count < 0){
                            $count = 0;
                        }
                    }else{
                        $count = 0;
                    }
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Orders
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content End -->

    <!-- Footer Section Start -->
    <div class="footer">
        <div class="wrapper">
            <p class="text-center">2024 All rights reserved, Food House. Developed By - <a href="#">Tran Trung Kien</a></p>
        </div>
    </div>
    <!-- Footer Section End -->
</body>

</html>