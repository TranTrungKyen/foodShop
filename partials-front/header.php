<?php
    session_start();
    require_once("./admin/db/db_func.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container header">
            <div class="logo">
                <a href="#" title="Logo">
                    <!-- <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive"> -->
                    <h1 class="name-shop">KFOOD</h1>
                </a>
            </div>

            <div class="menu text-center">
                <ul>
                    <li>
                        <a href="<?= SITEURL; ?>"><i class="fa-solid fa-house"></i>Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?= SITEURL; ?>categories.php"><i class="fa-solid fa-list"></i>Danh mục</a>
                    </li>
                    <li>
                        <a href="<?= SITEURL; ?>foods.php"><i class="fa-solid fa-burger"></i>Thực đơn</a>
                    </li>
                    <li>
                        <a href="<?= SITEURL; ?>carts.php"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
                    </li>
                    <li>
                        <a href="<?= SITEURL; ?>orders.php"><i class="fas fa-money-bill"></i>Đơn hàng</a>
                    </li>
                </ul>
            </div>

            <div class="groups-login">
                <ul>
                    <?php if(empty($_SESSION['role_id']))
                    { ?>
                        <li>
                            <a href="<?= SITEURL; ?>login.php">Đăng nhập</a>
                        </li>
                        <li>
                            <a href="<?= SITEURL; ?>register.php">Đăng ký</a>
                        </li>
                    <?php } else {?>
                        <li>
                            <a href="<?= SITEURL; ?>infoUser.php" class="user-name"><i class="far fa-user"></i><?php echo $_SESSION['fullname']; ?></a>
                            
                        </li>
                        <li>
                            <a href="<?= SITEURL; ?>admin/controllers/authen/logOut.php">Đăng xuất</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
