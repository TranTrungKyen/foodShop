<?php
session_start();
require_once("./admin/db/db_func.php")
?>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Your orders</title>
    <!-- MDB icon -->
    <!-- <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" /> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="./css/bootstrap-shopping-carts.min.css" />
    <!-- Custom css -->
    <link rel="stylesheet" href="./css/cart.css">
    <?php
    if (isset($_SESSION['noti'])) {
        echo $_SESSION['noti'];
        unset($_SESSION['noti']);
    }
    ?>
</head>

<body>
    <?php
    function formatDate($date){
        return date('d/m/Y', strtotime($date));
    }
    if (isset($_SESSION['id'])) {
        $uid = $_SESSION['id'];
        // Viet cau lenh truy van 
        $sql = "SELECT * FROM `order` WHERE user_id = '$uid'";
        // Thuc thi truy van
        $res = excuteResult($sql);
        // Dem so ban ghi
        $count = mysqli_num_rows($res);
    } else {
        header("Location: " . SITEURL . "login.php");
    }
    ?>
    <section class="d-flex" style="background-color: #cafafe;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <h1 class="fw-bold mb-0 text-black">Đơn hàng của bạn</h1>
                                            <h6 class="mb-0 text-muted"><?= $count ?> đơn hàng</h6>
                                        </div>
                                        <div class="header-orders">
                                            <!-- Item order -->
                                            <hr>

                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-md-1 col-lg-1 col-xl-1">
                                                    <h6>STT</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1">
                                                    <h6>Mã đơn</h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6>Ngày đặt</h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6>Tình trạng</h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6>Tổng tiền</h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6>Ghi chú</h6>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <h6>Chi tiết đơn</h6>
                                                </div>
                                            </div>
                                            <!-- End Item cart -->
                                        </div>
                                        <div class="list-cart">
                                            <?php
                                            function convertStatusToString($status)
                                            {
                                                switch ($status) {
                                                    case 0:
                                                        $status = "Processing";
                                                        break;
                                                    case 1:
                                                        $status = "Processed";
                                                        break;
                                                    case 2:
                                                        $status = "Delivering";
                                                        break;
                                                    case 3:
                                                        $status = "Completed";
                                                        break;
                                                    default:
                                                        $status = "Null";
                                                        break;
                                                }
                                                return $status;
                                            }
                                            // So ban ghi > 0 thi hien thi du lieu
                                            if ($count > 0) {
                                                // Khoi tao so thu tu
                                                $sn = 1;
                                                while ($rows = mysqli_fetch_assoc($res)) {
                                                    // Lay ra cac truong du lieu
                                                    $order_id = $rows['id'];
                                                    $fullname = $rows['fullname'];
                                                    $phone_number = $rows['phone_number'];
                                                    $address = $rows['address'];
                                                    $note = $rows['note'];
                                                    $order_date = formatDate($rows['order_date']);
                                                    $status = $rows['status'];
                                                    $total_money = $rows['total_money']; ?>
                                                    <div class="box-item-cart" key="<?= $order_id; ?>">
                                                        <!-- Item order -->
                                                        <hr class="my-4">

                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-md-1 col-lg-1 col-xl-1">
                                                                <?= $sn++; ?>
                                                            </div>
                                                            <div class="col-md-1 col-lg-1 col-xl-1">
                                                                <?= $order_id; ?>
                                                            </div>
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <?= $order_date; ?>
                                                            </div>
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <?= convertStatusToString($status); ?>
                                                            </div>
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <h6 class="mb-0 price total_product_money"><?= $total_money; ?></h6>
                                                            </div>
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <?= $note; ?>
                                                            </div>
                                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                                <a href="<?= SITEURL; ?>order_details.php?order_id=<?= $order_id; ?>&status=<?= $status; ?>">Chi tiết</a>
                                                            </div>
                                                        </div>
                                                        <!-- End Item cart -->
                                                    </div>

                                            <?php }
                                            } else {
                                                echo "<h1 class='justify-content-between'>Không có dữ liệu</h1>";
                                            }
                                            ?>
                                        </div>
                                        <hr class="my-4">

                                        <div class="pt-1">
                                            <h6 class="mb-0"><a href="<?= SITEURL; ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Trang chủ</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="./js/mdb.min.js"></script>
    <!-- Custom scripts -->
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