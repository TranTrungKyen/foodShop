<?php
session_start();
require_once('../../db/db_func.php');

if (isset($_POST['btnSearch'])) {
  // Get data input
  $search = $_POST['search'];

  // Viet cau lenh truy van chèn dữ liệu
  $_SESSION['sql'] = "SELECT * FROM category WHERE name LIKE '%$search%'";
  
  header("location:" . SITEURL . "admin/layout/category/index.php");
}
