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

  $role_id = isset($_GET['setRole']) ? $_GET['setRole'] : 1;

  // Viet cau lenh truy van chèn dữ liệu
  $_SESSION['sql'] = "SELECT * FROM user WHERE role_id = '$role_id' AND deleted = '0' AND fullname LIKE '%$search%'";
  switch ($role_id) {
    case 1:
      header("location:" . SITEURL . "admin/layout/admin/index.php");
      break;
    case 2:
      header("location:" . SITEURL . "admin/layout/admin/manage-user.php");
      break;
    default:
      header("location:" . SITEURL);
      break;
  }
}
