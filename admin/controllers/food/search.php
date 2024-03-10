<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['btnSearch'])) {
  // Get data input
  $search = $_POST['search'];
  // Security input
  $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);
  $search = mysqli_real_escape_string($conn, $search);

  mysqli_close($conn);

  // Viet cau lenh truy van chèn dữ liệu
  $_SESSION['sql'] = "SELECT product.*, category.name as category_name FROM product 
  JOIN category ON product.category_id = category.id WHERE product.deleted = '0' AND category.deleted = '0' 
  AND (title LIKE '%$search%' OR description LIKE '%$search%')";
  
  header("location:" . SITEURL . "admin/layout/food/index.php");
}
