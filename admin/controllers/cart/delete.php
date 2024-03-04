<?php
session_start();
require_once('../../db/db_func.php');
if (isset($_GET['cart_id'])) {
    $cartId = $_GET['cart_id'];

    $sql = "DELETE FROM cart WHERE id = '$cartId'";

    $res = excute($sql);
    if($res == TRUE){
        header("LOCATION: " . SITEURL . "carts.php");
    }
    else{
        echo "xóa thất bại";
    }
}
