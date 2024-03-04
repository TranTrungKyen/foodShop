<?php
    session_start();
    require_once('../../db/config.php');
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $_SESSION['sql'] = "SELECT * FROM `order` WHERE status = '$status'";

        header("Location: ". SITEURL."admin/layout/order/index.php");
    }
    else{
        $_SESSION['sql'] = "SELECT * FROM `order`";

        header("Location: ". SITEURL."admin/layout/order/index.php");
    }
    
?>