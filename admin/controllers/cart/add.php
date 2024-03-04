<?php
session_start();
require_once('../../db/db_func.php');
if (isset($_GET['id'])) {
    if(!isset($_SESSION['id'])){
        header("Location: ". SITEURL."login.php");
    }
    $pid = $_GET['id'];
    $uid = $_SESSION['id'];
    // Dieu huong sau khi them vao cart
    $dir = '';
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        $dir = 2;
    }else if(isset($_GET['search'])){
        $search = $_GET['search'];
        $dir = 4;
    }else{
        $dir = $_GET['dir'];
    }

    // Viet cau lenh truy van
    $sql0 = "SELECT * FROM product WHERE id='$pid'";
    // Thuc thi truy van
    $res0 = excuteResult($sql0);
    // Kiem tra san pham co ton tai
    if ($res0 == TRUE) {
        $count0 = mysqli_num_rows($res0);
        // Neu san pham ton tai
        if ($count0 > 0) {
            // Lay ra du lieu cua san pham
            $row0 = mysqli_fetch_assoc($res0);
            $price = $row0['price'];
            $discount = $row0['discount'];
            $currentMoney = $price - ($price * ($discount / 100));

            // Kiem tra san pham da duoc them vao gio hang chưa
            $sql1 = "SELECT * FROM cart WHERE user_id = '$uid' AND product_id='$pid'";
            // THuc thi
            $res1 = excuteResult($sql1);
            if ($res1 == TRUE) {
                $sql2 = "";
                $count = mysqli_num_rows($res1);
                // neu da duoc them vao gio hang tang so luong va tong tien
                if ($count > 0) {
                    // Lay du lieu
                    $row1 = mysqli_fetch_assoc($res1);
                    $quantity = $row1['quantity'];
                    $total_money = $row1['total_money'];
                    // Tang so luong them 1
                    $quantity++;
                    // Cap nha gia
                    $total_money += $currentMoney;
                    // Viet cau lenh truy van
                    $sql2 = "UPDATE cart SET
                    quantity = '$quantity',
                    total_money = '$total_money'
                    WHERE user_id = '$uid' AND product_id = '$pid'
                    ";
                    
                }
                // Neu chua duoc them vao gio hang thi them du lieu
                else {
                    // Viet cau lenh truy van
                    $sql2 = "INSERT INTO cart SET
                                user_id = '$uid',
                                product_id = '$pid',
                                quantity = '1',
                                total_money = '$currentMoney'
                                ";
                }
                $res2 = excute($sql2);
                if ($res2 == TRUE) {
                    $_SESSION['addCart'] = "alert('Thêm vào giỏ hàng thành công')";
                    switch ($dir) {
                        case 1:
                            header("LOCATION: " . SITEURL);
                            break;
                        case 2:
                            header("LOCATION: " . SITEURL . "category-foods.php?cid=$cid");
                            break;
                        case 3:
                            header("LOCATION: " . SITEURL . "foods.php");
                            break;
                        case 4:
                            header("LOCATION: " . SITEURL . "food-search.php?search=$search");
                            break;
                        default:
                            header("LOCATION: " . SITEURL);
                            break;
                    }
                } else {
                    echo "<h1>Thuc thi that bai</h1>";
                    die();
                }
            }
        } else {
            echo "<h1>San pham khong ton tai</h1>";
            die();
        }
    } else {
        echo "<h1>Truy van that bai</h1>";
    }
}
else{

}
