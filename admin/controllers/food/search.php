<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['btnSearch'])) {
  // Get data input
  $search = $_POST['search'];

  // Viet cau lenh truy van chèn dữ liệu
  $_SESSION['sql'] = "SELECT product.*, category.name as category_name FROM product 
  JOIN category ON product.category_id = category.id WHERE deleted = '0' AND title LIKE '%$search%'";
  
  header("location:" . SITEURL . "admin/layout/food/index.php");
}
