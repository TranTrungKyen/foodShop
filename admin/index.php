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
    <!-- Main Content Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Hệ thống thông tin</h1>
            <div class="row mt-16">
                <div class="col c-3 bg-white text-center px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM user WHERE role_id = '1' AND deleted ='0'";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Người quản trị
                </div>
                <div class="col c-o-1 c-3 bg-white text-center px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM user WHERE role_id = '2' AND deleted ='0'";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Người dùng
                </div>
                <div class="col c-o-1 c-3 bg-white text-center px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM category";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Danh mục
                </div>
            </div>
            <div class="row mt-16">
                <div class="col c-3 text-center bg-white px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM product WHERE deleted ='0'";
                    $res = excuteResult($sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Sản phẩm
                </div>
                <div class="col c-o-1 c-3 text-center bg-white px-1 py-2">
                    <?php
                    $sql = "SELECT * FROM `order`";
                    $count = '';
                    $res = excuteResult($sql);
                    if ($res == TRUE) {
                        $count = mysqli_num_rows($res);
                        if ($count < 0) {
                            $count = 0;
                        }
                    } else {
                        $count = 0;
                    }
                    ?>
                    <h1><?= $count; ?></h1>
                    <br />
                    Đơn hàng
                </div>
                <div class="col c-o-1 c-3 text-center bg-white px-1 py-2">
                    <?php
                    $sql = "SELECT SUM(total_money) as total FROM `order` WHERE status = '3'";
                    $count = '';
                    $res = excuteResult($sql);
                    if ($res == TRUE) {
                        $count = mysqli_num_rows($res);
                        if ($count < 0) {
                            $total = 0;
                        } else {
                            $row = mysqli_fetch_assoc($res);
                            $total = $row['total'];
                        }
                    } else {
                        $total = 0;
                    }
                    ?>
                    <h1 class="price"><?= $total; ?></h1>
                    <br />
                    Tổng doanh thu
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

    <script>
        // Format du lieu tu số sang tiền
        function formatMoney(input) {
            // Chuyển đổi chuỗi thành số
            const number = parseInt(input);

            // Kiểm tra xem có phải là số không
            if (isNaN(number)) {
                return "0";
            }

            // Định dạng số tiền thành chuỗi và thêm đơn vị VND vào cuối
            const formattedCurrency = number.toLocaleString('vi-VN') + ' VNĐ';
            // Sử dụng toLocaleString để định dạng số với dấu cách phân tách hàng nghìn tự động

            return formattedCurrency;
        }
        // Format du lieu tu tiền sang số
        function moneyToNumber(input) {
            // Loại bỏ ký tự tiền tệ và dấu cách
            const cleanedInput = input.replace(/[^\d]/g, '');

            // Chuyển đổi chuỗi thành số
            const number = parseInt(cleanedInput);

            // Kiểm tra xem có phải là số không
            if (isNaN(number)) {
                return 0;
            }

            return number;
        }
        var getPriceElements = document.querySelectorAll(".price");
        getPriceElements.forEach((item) => {
            item.textContent = formatMoney(item.textContent);
        })
    </script>
</body>

</html>