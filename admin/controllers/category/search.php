<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['btnSearch'])) {
  // Get data input
  $search = $_POST['search'];
  $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);
  // Get data input
  $search = mysqli_real_escape_string($conn, $search);

  mysqli_close($conn);

  // Viet cau lenh truy van chèn dữ liệu
  $_SESSION['sql'] = "SELECT * FROM category WHERE name LIKE '%$search%' AND deleted = '0'";
  
  header("location:" . SITEURL . "admin/layout/category/index.php");
}
