<?php
session_start();
require_once('../../db/config.php');
// Kiem tra gio hang trống
function checkCart($conn)
{
    $uid = $_SESSION['id'];
    $sql1 = "SELECT * FROM cart WHERE user_id='$uid'";
    $res1 = mysqli_query($conn, $sql1);
    if ($res1 == TRUE) {
        $count1 = mysqli_num_rows($res1);
        if ($count1 > 0) {
            return true;
        }
        return false;
    }
    return false;
}

if (isset($_POST['submit'])) {
    // Kết nối database
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    // Kiem tra gio hang trống 
    if (!checkCart($conn)) {
        $_SESSION['noti'] = "
        <script>
            alert('Không có sản phẩm trong giỏ hàng');
        </script>";
        header("Location: " . SITEURL . "carts.php");
        die();
    }
    // Lay du lieu tu form
    $uid = $_SESSION['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $note = isset($_POST['note']) ? $_POST['note'] : '';
    $currentTime = date("Y-m-d H:i:s");
    $total_bill = $_POST['total_bill'];
    $sql2 = "INSERT INTO `order` SET
                                user_id = '$uid',
                                fullname = '$fullname',
                                email = '$email',
                                phone_number = '$phone_number',
                                address = '$address',
                                note = '$note',
                                order_date = '$currentTime',
                                status = '0',
                                total_money = '$total_bill'
                                ";
    $res2 = mysqli_query($conn, $sql2);
    // THem thanh cong hoa don va se tao chi tiet hoa don
    if ($res2 == TRUE) {
        // Lay ra id cua hóa đơn vừa tạo
        $order_id = mysqli_insert_id($conn);
        echo $order_id;
        // Truy van du lieu tu bang gio hang de luu thong tin danh sach san pham vao bang chi tiet don hang
        $sql3 = "SELECT * FROM cart WHERE user_id='$uid'";
        $res3 = mysqli_query($conn, $sql3);
        var_dump($res3);
        if ($res3 == TRUE) {
            while ($rows = mysqli_fetch_assoc($res3)) {
                $product_id = $rows['product_id'];
                $quantity = $rows['quantity'];
                $total_money_product = $rows['total_money'];
                $price = $total_money_product / $quantity;

                // Them thong tin san pham dat dat vao bang chi tiet hoa don
                $sql4 = "INSERT INTO order_details SET
                                order_id = '$order_id',
                                product_id = '$product_id',
                                num = '$quantity',
                                price = '$price',
                                total_money = '$total_money_product'
                                ";
                $res4 = mysqli_query($conn, $sql4);
                if ($res4 != TRUE) {
                    $_SESSION['noti'] = "<script>alert('Tạo chi tiết hóa đơn không thành công!');</script>";
                    header("Location: " . SITEURL . "carts.php");
                    die();
                }
            }
        } else {
            $_SESSION['noti'] = "<script>alert('Lỗi truy vấn giỏ hàng!');</script>";
            header("Location: " . SITEURL . "carts.php");
            die();
        }
        // Thong bao tao hoa don thanh cong
        $_SESSION['model'] = '<a class="model" href="'. SITEURL .'">
                                <div class="model-box">
                                    <div class="content success">
                                        <i class="far fa-check-circle"></i>
                                        <h1 class="noti">Đặt hàng thành công!</h1>
                                    </div>
                                </div>
                            </a>';
        header("Location: " . SITEURL);
    } else {
        $_SESSION['noti'] = "<script>alert('Tạo hóa đơn không thành công!');</script>";
        header("Location: " . SITEURL . "carts.php");
        die();
    }

    mysqli_close($conn);
}
