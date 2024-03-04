<?php
session_start();
require_once('../../db/db_func.php');
// Lay du lieu
$uid = $_SESSION['id'];
$pid = $_POST['productId'];
$quantity = intval($_POST['quantity']);
$price = intval($_POST['currentPrice']);
$totalPriceProduct = $price * $quantity;
// // Viet truy van
$sql = "UPDATE cart SET
    quantity = '$quantity',
    total_money = '$totalPriceProduct'
    WHERE user_id = '$uid' AND product_id = '$pid'
";
$res = excute($sql);

http_response_code(200);
exit;
?>
